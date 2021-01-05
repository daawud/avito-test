<?php

namespace App\Http\Requests;

use Pearl\RequestValidate\RequestAbstract;

class BookingCreateRequest extends RequestAbstract
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
            'room_id' => 'required|integer|exists:rooms,id',
            'date_start' => 'required|date_format:Y-m-d|after_or_equal:tomorrow',
            'date_end' => 'required|date_format:Y-m-d|after_or_equal:date_start',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            //
        ];
    }
}
