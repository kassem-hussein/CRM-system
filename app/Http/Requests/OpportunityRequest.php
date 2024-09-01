<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OpportunityRequest extends FormRequest
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
            "name"=>"required|string",
            "lead_id"=>"required|exists:leads,id",
            "stage"=>"required|string|in:new,open,contact,qualified,won,lost",
            "close_date"=>"date|required",
            "excpected_revenue"=>"numeric|required",
            "product_id"=>"required|exists:products,id",
            "quantity"=>"required|integer"
        ];
    }
}
