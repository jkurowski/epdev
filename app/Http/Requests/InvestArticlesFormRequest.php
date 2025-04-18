<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvestArticlesFormRequest extends FormRequest
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
            'investment_id' => 'integer',
            'active' => 'boolean',
            'title' => 'required|string|min:2|max:190',
            'content_entry' => 'nullable|string|min:5',
            'content' => 'required|string|min:5',
            'date' => 'required',
            'gallery_id' => 'nullable|integer',
            'subtitle' => 'nullable|string',
            'meta_title' => '',
            'meta_description' => '',
            'meta_robots' => ''
        ];
    }
}
