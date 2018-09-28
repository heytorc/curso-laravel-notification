<?php

namespace App\Http\Controllers\Posts;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Comment\StoreCommentFormRequest;
use App\Notifications\PostCommented;

class CommentController extends Controller
{
    public function store(StoreCommentFormRequest $request)
    {
    	$formData 	= $request->except('_token');

    	$comment 	= $request->user()->comments()->create($formData);

    	$author		= $comment->post->user;
    	$author->notify(new PostCommented($comment));

    	return redirect()
    				->route('posts.show', $comment->post_id)
    				->withSuccess('Comentario realizado com sucesso!');
    }
}
