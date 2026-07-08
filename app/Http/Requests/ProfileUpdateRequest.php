<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['sometimes', 'required', 'string', 'max:255'],
            'email' => [
                'sometimes',
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                Rule::unique(User::class)->ignore($this->user()->id),
            ],
            'attendance_api_url' => ['nullable', 'url', 'max:255'],
            'api_token'         => ['nullable', 'string', 'max:80'],
            'sync_token'        => ['nullable', 'string', 'max:80'],
            'month_start_date'  => ['nullable', 'integer', 'min:1', 'max:31'],
            'match_threshold'   => ['nullable', 'numeric', 'min:0.5', 'max:1.0'],
            'show_mask_warning' => ['nullable', 'boolean'],
            'camera_resolution' => ['nullable', 'string', 'in:low,medium,high'],
            'enable_blink_liveness' => ['nullable', 'boolean'],
            'require_scanner_auth' => ['nullable', 'boolean'],
            'kiosk_pin'         => ['nullable', 'string', 'max:6'],
        ];
    }
}
