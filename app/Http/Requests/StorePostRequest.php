<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;

class StorePostRequest extends FormRequest
{
    public static array $extensions = [
        'jpg', 'jpeg', 'png', 'gif', 'webp',
        'mp3', 'wav', 'mp4',
        "doc", "docx", "pdf", "csv", "xls", "xlsx",
        "zip"
    ];

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'body' => ['nullable', 'string'],
            'attachments' => 'array|max:50',
            'attachments.*' => [
                'file',
                File::types(self::$extensions)->max(500 * 1024 * 1024)
            ],
            'user_id' => ['numeric']
        ];
    }

    protected function prepareForValidation()
    {
        // Add your custom key to the request data
        $this->merge([
            'user_id' => auth()->user()->id,
            'body' => $this->input('body') ?: ''
        ]);
    }

    public function messages()
    {
        return [
            'attachments.*' => 'Invalid file'
        ];
    }
}