<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    } 

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|min:5|max:150',
            'technologies' => 'array',
            'technologies.*' => 'exists:technologies,id',
            'description' => 'nullable',
            'author' => 'nullable',
            'thumb' => 'nullable|image',
            'type_id' => 'nullable|exists:types,id',
            'link_repository' => 'nullable|url',
            'link_preview' => 'nullable|url',


        ];
    }
}
