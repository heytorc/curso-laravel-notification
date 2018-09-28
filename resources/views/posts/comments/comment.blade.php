@if (auth()->check())

	@if(session('success'))
		<div class="alert alert-success">
			{{ session('success') }}
		</div>
	@endif

	@if ($errors->any())
		<div class="alert alert-danger">
			<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
			</ul>
		</div>
	@endif

	<form action="{{ route('comment.store') }}" method="POST" role="form">
		@csrf
		<input type="hidden" name="post_id" value="{{ $post->id }}">

		<div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
			<label for="">Título:</label>
			<input type="text" name="title" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" value="{{ old('title') }}" id="" placeholder="Digite o título">

			@if ($errors->has('title'))
			    <span class="invalid-feedback" role="alert" style="display: block">
			        <strong>{{ $errors->first('title') }}</strong>
			    </span>
		    @endif
		</div>

		<div class="form-group{{ $errors->has('body') ? ' has-danger' : '' }}">
			<textarea name="body" class="form-control{{ $errors->has('body') ? ' is-invalid' : '' }}" placeholder="Digite seu comentário">{{ old('title') }}</textarea>
			@if ($errors->has('title'))
			    <span class="invalid-feedback" role="alert" style="display: block">
			        <strong>{{ $errors->first('title') }}</strong>
			    </span>
		    @endif
		</div>

		<div class="form-group">
			<button type="submit" class="btn btn-primary">Enviar</button>
		</div>

	</form>
@else
	<hr>
	<h4>Você precisa estar logado para comentar! :) <a href="{{ route('login') }}" title="">Clique aqui para entrar!</a></h4>
@endif

<h3>Comentários ({{ $post->comments->count() }})</h3>

@forelse ($post->comments as $comment)
	<div class="card">
		<div class="card-body">
			<strong>{{ $comment->user->name }}</strong> comentou:
			<br>
			{{ $comment->title }} -	{{ $comment->body }}
		</div>
	</div>
	<br>
@empty
@endforelse