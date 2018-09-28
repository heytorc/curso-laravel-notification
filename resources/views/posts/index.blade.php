@extends('layouts.app')

@section('content')

<div class="container">

	<h1>Listagem de Posts</h1>

	@forelse ($posts as $post)
		<a href="{{ route('posts.show', $post->id) }}">
			{{ $post->title }} - Comentários ({{ $post->comments->count() }})
		</a>
		<hr/>
	@empty
	@endforelse

	{!! $posts->links(); !!}

</div>

@endsection