<!-- app/views/posts/index.blade.php -->

<!DOCTYPE html>
<html>
<head>
	<title>Posts CRUD</title>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
	<div class="navbar-header">
		<a class="navbar-brand" href="{{ URL::to('posts') }}">Post Alert</a>
	</div>
	<ul class="nav navbar-nav">
		<li><a href="{{ URL::to('posts') }}">View All Posts</a></li>
		<li><a href="{{ URL::to('posts/create') }}">Create a Post</a>
	</ul>
</nav>

<h1>All the Posts</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<td>ID</td>
			<td>Title</td>
			<td>Content</td>
			<td>Created</td>
		</tr>
	</thead>
	<tbody>
	@foreach($posts as $key => $value)
		<tr>
			<td>{{ $value->id}}</td>
			<td>{{ $value->title }}</td>
			<td>{{ $value->content }}</td>

			<!-- we will also add show, edit, and delete buttons -->
			<td>

				<!-- delete the post (uses the destroy method DESTROY /posts/{id} -->
			{{ Form::open(array('url' => 'posts/' . $value->id, 'class' => 'pull-right')) }}
					{{ Form::hidden('_method', 'DELETE') }}
					{{ Form::submit('Delete this Post', array('class' => 'btn btn-warning')) }}
				{{ Form::close() }}

				<a class="btn btn-small btn-success" href="{{ URL::to('posts/' . $value->id) }}">Show this Post</a>

				<!-- edit this post (uses the edit method found at GET /posts/{id}/edit -->
				<a class="btn btn-small btn-info" href="{{ URL::to('posts/' . $value->id . '/edit') }}">Edit this Post</a>

			</td>
		</tr>
	@endforeach
	</tbody>
</table>

</div>
</body>
</html>
