<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => [
                'required',
                'max:255',
                'min:3',
            ],
            'title' => [
                'required',
                'max:255',
                'min:3',
            ],
            'description' => 'required',
            'create_at' => 'required',
            'slug' => 'required',
            'user_id' => 'nullable|exists:users,id',
            'types_id' => 'nullable|exists:types,id'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Il campo nome è obbligatorio',
            'title.required' => 'Il campo titolo è obbligatorio',
            'description.required' => 'Il campo descrizione è obbligatorio',
            'create_at.required' => 'Il campo data di creazione è obbligatorio',
            'type_id.exists' => 'The field :attribute must exist.'
        ];
    }
}