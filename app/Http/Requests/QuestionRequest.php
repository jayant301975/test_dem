<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionRequest extends FormRequest
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
            

            'question'   => 'required|string|min:5',

            'type'       => 'required|in:1,2,3', 
           
            'marks'      => 'required|numeric|min:0',

            
          //  'options' => 'required_if:type,1,2|array|min:2',
           // 'options.*.text' => 'required_if:options|string|max:255',

           //  'correct_option' => 'required_if:type,1,2|integer',
            ];
    }

    public function messages(): array
    {
        return [
           'question.required' => 'Question text is required.',

            'type.required'     => 'Please select question type.',
            'type.in'           => 'Invalid question type selected.',

            'marks.required'    => 'Marks field is required.',
            'marks.numeric'     => 'Marks must be a number.',

            // 'options.required_if' => 'Please add at least two options.',
           // 'options.min.required_if'         => 'Minimum two options are required.',
            // 'options.*.text.required_if' => 'Option text cannot be empty.',

            // 'correct_option.required_if' => 'Please select the correct answer.',
        ];
    }
}
