<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\Input;
use App\Post;
use File;
use App\Tags;
use Auth;

class AdminController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function Index()
    {
    	return view('post');
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'title' => 'required|min:3',
            'description' => 'required',
            'short_description' => 'required|max:25',
            'add_date' => 'required',
            'image' => 'required'


        ]);
        if(Input::file("image")){
            $dp=public_path('images');
            $filename=uniqid().".jpg";
            $image=Input::file("image")->move($dp, $filename);
        }

    	$post_id = Post::create([
            'user_id'=> Auth::user()->id,
            'category_id'=> $request->input('category_id'),
            'title'=> $request->input('title'),
            'description'=> $request->input('description'),
            'short_description'=> $request->input('short_description'),
            'image'=> $filename,
            'add_date'=> $request->input('add_date')
        ])['id'];

        $tags = $request->input('tags');
		foreach ($tags as $t) {
			Tags::create([
                'news_id'=>$post_id,
                'name'=>$t
            ]);
		}
    }

    public function Category()
    {
        return view('category');
    }


    public function store_category(Request $request)
    {
        $request -> validate([
            'title' => 'required|min:2|max:15'
        ]);
        return Category::create([
            'title'=>$request->input('title')
        ]);
    }
}
