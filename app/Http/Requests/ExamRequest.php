<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExamRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

   
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255|unique:exams,title',
            'description' => 'nullable|string|max:1000',
        ];
    }

  
    public function messages(): array
    {
        return [
            'title.required' => 'Exam title is required.',
            'title.unique'   => 'This exam title already exists.',
            'title.max'      => 'Exam title may not exceed 255 characters.',
            'description.max'=> 'Description may not exceed 1000 characters.',
        ];
    }
}
