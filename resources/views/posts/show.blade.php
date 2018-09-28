@extends('layouts.app')

@section('content')

<div class="container">

	<h1>{{ $post->title }}</h1>

	<p>{{ $post->body }}</p>

	@include('posts.comments.comment')

</div>

@endsection