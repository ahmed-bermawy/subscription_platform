<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
        //'title', 'description', 'notify', 'website_id'
        return [
            'title' => 'required',
            'description' => 'required|min:20',
            'notify' => 'required|boolean',
            'website_id' => 'required|exists:websites,id',
        ];
    }
}
