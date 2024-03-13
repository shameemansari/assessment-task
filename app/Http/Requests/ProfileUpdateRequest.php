<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
{
    protected $user;

    public function __construct()
    {
        $this->user = auth()->user();
    }
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
            'role' => 'required|in:employer,seeker',
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'username' => 'required|max:50|unique:users,username,' . $this->user?->id,
            'email' => 'required|email|max:255|unique:users,email,' . $this->user?->id,
            'company' => 'required_if:role,employer|string|max:150',
            'experience' => 'required_if:role,seeker|numeric|min:0|max:80',
            'title' => 'required_if:role,seeker|string|max:255',
            'skills' => 'required_if:role,seeker|array|min:1',
            'resume' => 'nullable|mimes:pdf|max:5012',
            'location_id' => 'required_if:role,seeker|exists:locations,id',
            'job_type_id' => 'required_if:role,seeker|exists:job_types,id',
        ];
    }

    public function attributes()
    {
        return [
            'role' => 'Role',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'username' => 'Username',
            'email' => 'Email',
            'company' => 'Company Name',
            'experience' => 'Experience',
            'title' => 'Title',
            'skills' => 'Skills',
            'resume' => 'Resume',
            'location_id' => 'Location',
            'job_type_id' => 'Job Type',
        ];
    }
}
