<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function rules()
    {
        return [
            'content' => 'required',
            'category_id' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'content.required' => 'カテゴリを入力してください',
            'role.required' => '役職を入力してください',
        ];
    }
}
