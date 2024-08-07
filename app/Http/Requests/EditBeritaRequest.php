<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditBeritaRequest extends FormRequest
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
            'title' => ['required'],
            'status' => ['required', 'in:published,private'],
            'foto' => ['nullable', 'file', 'mimes:jpg,jpeg,png', 'max:2048'],
            'content' => ['required'],
            'id_kategori' => ['required', 'exists:kategori_blogs,id'],
        ];
    }
}
