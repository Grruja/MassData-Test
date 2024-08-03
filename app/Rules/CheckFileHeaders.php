<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Maatwebsite\Excel\HeadingRowImport;

class CheckFileHeaders implements ValidationRule
{
    protected array $expectedHeaders;

    public function __construct(mixed $importType)
    {
        $this->$importType = $importType;
        $this->expectedHeaders = config('import.'.$importType.'.files.ds_sheet.headers_to_db') ?? [];
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (empty($this->expectedHeaders)) $fail();
        $expectedHeadersArray = array_values($this->expectedHeaders);

        $filePath = $value->getRealPath();
        $headers = (new HeadingRowImport())->toArray($filePath)[0][0];

        if (count($expectedHeadersArray) < count($headers)) {
            array_splice($headers, count($expectedHeadersArray));
        }

        if ($expectedHeadersArray !== $headers) {
            $fail("Required headers: ".implode(', ', array_keys($this->expectedHeaders)));
        }
    }
}
