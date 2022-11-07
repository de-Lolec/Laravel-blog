<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogCommentCreateRequest extends FormRequest
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
            'body' => 'required|string|max:1000|min:5',
        ];
    }

    // Переводим ошибки, то что сверху, ошибки можно посмотреть дефолтные в файле config
    public function messages()
    {
        return [
            'body.min' => 'Минимальная длина статьи [:min] символов',
        ];
    }
}
