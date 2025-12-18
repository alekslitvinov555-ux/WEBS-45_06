<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $productId = $this->route('product')?->id;
        $currentYear = (int) date('Y');

        return [
            'make'        => 'required|string|max:255',
            'model'       => 'required|string|max:255',
            'year'        => 'required|integer|min:1900|max:'.$currentYear,
            'price'       => 'required|integer|min:0',
            'category_id' => ['required','exists:categories,id'],
            'engine'      => 'nullable|string|max:255',
            'mileage'     => 'nullable|integer|min:0',
            'description' => 'nullable|string',
            'image'       => [
                $this->isMethod('post') ? 'required' : 'nullable',
                'image',
                'max:4096', // ~4MB
            ],
        ];
    }
}
