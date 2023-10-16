<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreApplicationRequest extends FormRequest
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
            'dealer_name' => 'required',
            'dealer_manager' => 'required',
            'credit_sum' => 'required|integer',
            'credit_term' => 'required|integer',
            'credit_rate' => 'required|integer',
            'credit_description' => 'required',
            'credit_status' => ['required', Rule::in(['новая', 'одобрена', 'в процессе', 'отклонена'])]
        ];
    }
}
