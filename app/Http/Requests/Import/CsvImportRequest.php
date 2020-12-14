<?php

namespace App\Http;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CsvImportRequest extends FormRequest
{
    public const FILE_TYPE_CSV = "csv_file";

    public function authorize(): bool
    {
        return Auth::user() !== null;
    }

    public function rules(): array
    {
        return [
            self::FILE_TYPE_CSV => "required|file"
        ];
    }
}
