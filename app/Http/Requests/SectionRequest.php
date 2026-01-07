<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SectionRequest extends FormRequest
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
                'exam_id' => 'required|exists:exams,id',

                'title' => 'required|string|max:255',

               
                'duration' => 'nullable|integer|min:1|max:1000',

                
                'negative_marks' => 'required|numeric|min:0|max:100',
            ];
        }

       
        public function messages(): array
        {
            return [
                
                'title.required'   => 'Section title is required.',
                'title.max'        => 'Section title may not exceed 255 characters.',

                'duration.integer' => 'Duration must be in minutes.',
                'duration.min'     => 'Duration must be at least 1 minute.',

                'negative_marks.required' => 'Negative marks is required.',
                'negative_marks.numeric' => 'Negative marks must be a number.',
                'negative_marks.min'     => 'Negative marks cannot be negative.',
            ];
        }
}
