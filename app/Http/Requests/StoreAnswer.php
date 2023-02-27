<?php

namespace App\Http\Requests;

use App\Rules\UniqueLastAnswer;
use Illuminate\Foundation\Http\FormRequest;

class StoreAnswer extends FormRequest
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
            'name' => ['required','string'],
            'number'=> ['required','regex:/^01[0-2,5]\d{8}$/',new UniqueLastAnswer],
            'address'=> ['required','string'],
            'answer'=> ['required','string']
        ];
    }
}
