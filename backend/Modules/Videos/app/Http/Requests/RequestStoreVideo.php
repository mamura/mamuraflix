<?php

namespace Modules\Videos\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestStoreVideo extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'title'         => 'required',
            'description'   => 'required',
            'url'           => 'required'
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
}
