<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FooterFormRequest extends FormRequest
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
            'name' => 'required|string|min:5|max:190',
            'class' => '',
            'items' => ''
        ];
    }
}
