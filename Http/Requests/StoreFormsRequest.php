<?php

namespace HexGad\Forms\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFormsRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['required'],
            'description' => ['sometimes'],
            'submit_button_text' => ['required'],
            'submit_action' => ['sometimes'],
            'redirection_url' => ['sometimes'],
            'submit_message' => ['sometimes'],
            'properties' => ['array']
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
