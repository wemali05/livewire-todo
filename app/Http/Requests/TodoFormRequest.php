<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TodoFormRequest extends FormRequest
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
            'todo_id' => 'nullable',
            'title' => 'required',
            'desc' => 'nullable',
            'status' => 'required',
        ];
		}
		
		public function messages()
    {
        return [
            'title.required' => 'Title is required.',
            'status.required' => 'Status not selected',
        ];
    }
}
