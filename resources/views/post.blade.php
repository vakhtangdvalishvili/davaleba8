<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif
<header>fill all tags</header>
	<form action="{{ route('storepost') }}" method="POST" enctype="multipart/form-data">
		@csrf
        <input type="text" name="title" placeholder="enter title" class="form-control @if($errors->has('title')) is-invalid @endif" value="{{old('title')}}">
	    <textarea name="description" placeholder="enter description"></textarea>
	    <textarea name="short_description" placeholder="enter short description" class="form-control @if($errors->has('short_description')) is-invalid @endif" value="{{old('short_description')}}"></textarea>
	    <input type="file" name="image">
	    <input type="date" name="add_date">
	    <select name="category_id">
		@foreach(App\Category::get() as $cat)
			<option value="{{ $cat->id }}"> {{ $cat->title }} </option>
		@endforeach
	</select>
	<input type="text" name="tags[]" placeholder="tags">
	<input type="text" name="tags[]" placeholder="tags">
	<input type="text" name="tags[]" placeholder="tags">
	<button>save</button>
	</form>


</body>
</html>
