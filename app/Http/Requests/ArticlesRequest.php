<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticlesRequest extends FormRequest
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
            'title' => 'required',
            'body' => 'required',
            'category_id' => 'required'

        ];
    }

    public function messages() {
        return [
            'title.required'	=> 'Wpisz tytuł artykułu',
            'body.required' => 'Napisz treść artykułu',
            'category_id.required' => 'wybierz kategorie'
        ];
    }
}
