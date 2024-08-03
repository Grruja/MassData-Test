<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreImporetedDataRequest;
use App\Services\ImportService;
use Illuminate\View\View;

class ImportController extends Controller
{
    public function index(): View
    {
        $importService = new ImportService();
        $importTypes = $importService->getAvailableImportTypes();

        return view('data-import', compact('importTypes'));
    }

    public function storeImportedData(StoreImporetedDataRequest $request)
    {
        dd('passed');
    }
}
