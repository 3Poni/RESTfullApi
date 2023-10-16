<?php

namespace App\Http\Requests\V1;

use App\Models\Bank;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateApplicationRequest extends FormRequest
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
        $method = $this->method();
        if($method == 'PUT') {
            return [
                'dealer_name' => 'required',
                'dealer_manager' => 'required',
                'credit_sum' => 'required|integer',
                'credit_term' => 'required|integer',
                'credit_rate' => 'required|integer',
                'credit_description' => 'required',
                'credit_status' => ['required', Rule::in(['новая', 'одобрена', 'в процессе', 'отклонена'])],
                'bank_id' => ['required','integer', Rule::in(Bank::all()->pluck('id')->toArray())]
            ];
        }else{
            return [
                'dealer_name' => 'sometimes|required',
                'dealer_manager' => 'sometimes|required',
                'credit_sum' => 'sometimes|required|integer',
                'credit_term' => 'sometimes|required|integer',
                'credit_rate' => 'sometimes|required|integer',
                'credit_description' => 'sometimes|required',
                'credit_status' => ['sometimes','required', Rule::in(['новая', 'одобрена', 'в процессе', 'отклонена'])],
                'bank_id' => ['sometimes', 'required','integer', Rule::in(Bank::all()->pluck('id')->toArray())]
            ];
        }

    }
}
