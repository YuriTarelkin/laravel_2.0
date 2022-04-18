<?php

declare(strict_types=1);

namespace App\Http\Requests\news;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
			'category_id' => ['required', 'integer'],
            'scource_id'  => ['nullable' , 'integer'],
			'title'       => ['required', 'string', 'min:3', 'max:30'],
			'status'      => ['required', 'string', 'min:5', 'max:7'],
			'author'      => ['required', 'string'],
			'image'       => ['nullable', 'image', 'mimes:png,jpg,jpeg,heic'],
			'description' => ['nullable', 'string']
        ];
    }
}
