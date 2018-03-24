<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentsRequest extends FormRequest
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
            'author' => 'required',
            'content' => 'required',
            'article_id' => 'required'
        ];
    }

    public function messages() {
        return [
            'author.required'	=> 'Wpisz autora komentarza',
            'content.required' => 'Napisz treść komentarza',
            'article_id.required' => 'jaki artykuł'
        ];
    }
}
