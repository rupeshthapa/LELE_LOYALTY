<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FeatureRequest extends FormRequest
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
            'title' => 'required',
            'description' => 'required',
            'class' => 'required|string|in:rotate-class,shake-class,scale-class,shakehorizontal-class',
            'image_class' => 'required|string|in:rotate,shake,scale',
            'image' => 'required|mimes:png,jpg,jpeg,gif,avif,webp',
        ];
    }
}
