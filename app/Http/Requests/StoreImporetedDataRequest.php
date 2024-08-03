<?php

namespace App\Http\Requests;

use App\Services\ImportService;
use Illuminate\Foundation\Http\FormRequest;

class StoreImporetedDataRequest extends FormRequest
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
        $importService = new ImportService();
        $importTypes = $importService->getAvailableImportTypes();

        return [
            'import_type' => 'required|in:'.implode(',', array_keys($importTypes)),
            'files' => 'required|array|file|mimes:xlsx,csv'
        ];
    }
}
