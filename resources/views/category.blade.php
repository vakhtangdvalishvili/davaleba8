<!DOCTYPE html>
<html>
<head>
	<title>add category</title>
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
	<form method="POST" action="storecategory">
		@csrf
		<input type="text" name="title" class="form-control @if($errors->has('title')) is-invalid @endif" value="{{old('title')}}">
		<button>add</button>
	</form>
</body>
</html>
