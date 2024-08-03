<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreImporetedDataRequest;
use App\Imports\OrderImport;
use App\Services\ImportService;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;

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
        dd('Validation passed');

        /*foreach ($request->file('files') as $file) {
            Excel::import(new OrderImport, $file);
        }*/
    }
}
