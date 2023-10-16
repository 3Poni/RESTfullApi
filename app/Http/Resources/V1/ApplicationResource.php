<?php

namespace App\Http\Resources\V1;

use App\Models\Bank;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

class ApplicationResource extends JsonResource
{
    public static $wrap = 'application';
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'dealer_name' => $this->dealer_name,
            'dealer_manager' => $this->dealer_manager,
            'credit_sum' => number_format($this->credit_sum, 2, ',', ' ') . ' руб.',
            'credit_term' => $this->credit_term . ' months',
            'credit_rate' => $this->credit_rate . ' %',
            'credit_description' => $this->credit_description,
            'credit_status' => $this->credit_status,
            'created_at' => Carbon::parse($this->updated_at)->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::parse($this->updated_at)->format('Y-m-d H:i:s'),
//            'bank' =>  new BankResource(Bank::findOrFail($this->bank_id)),
            'bank' =>  new BankResource($this->bank),
            //            'bank' => $this->with('bank'),
        ];
    }
}
