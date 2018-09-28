<?php

namespace App\Http\Requests\Comment;

use Illuminate\Foundation\Http\FormRequest;

class StoreCommentFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'post_id'   => 'required|exists:posts,id',
            'title'     => 'required|string|min:3|max:100',
            'body'      => 'required|string|min:3|max:10000',
        ];
    }

    public function messages()
    {
        return [
            'post_id.required'  => 'É necessário selecionar um post',
            'title.required'    => 'Digite o título do comentário',
            'title.min'         => 'O título do comentário deve conter mais que 3 caracteres',
            'body.required'     => 'Digite o seu comentário',
            'body.min'          => 'O seu comentário deve conter mais que 3 caracteres',
        ];
    }
}
