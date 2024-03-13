<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostJobCreateRequest extends FormRequest
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
            'title' => 'required|max:150',
            'description' => 'required',
            'skills' => 'required|array|min:1',
            'years' => 'required|integer|min:0|max:80',
            'months' => 'required|integer|min:0|max:11',
            'job_type_id' => 'required|exists:job_types,id',
            'location_id' => 'required|exists:locations,id',
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'Title',
            'description' => 'Description',
            'years' => 'Years',
            'months' => 'Months',
            'skills' => 'Skills',
            'job_type_id' => 'Job Type',
            'location_id' => 'Location',
        ];
    }
}
