<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use thiagoalessio\TesseractOCR\TesseractOCR;
use Spatie\PdfToText\Pdf;

class OCRController extends Controller
{
    public function index()
    {
        return view('ocr');
    }

    public function process(Request $request)
    {
        $request->validate([
            'searchText' => 'required|string',
            'file' => 'required|file|mimes:jpeg,png,jpg,gif,svg,pdf|max:2048',
        ]);

        $searchText = $request->input('searchText');
        $file = $request->file('file');
        $filePath = $file->store('uploads', 'public');

        $extractedText = '';

        if ($file->getClientOriginalExtension() === 'pdf') {
            $pdfPath = storage_path('app/public/' . $filePath);
            $pdftotextPath = config('pdftotext.path');
            $extractedText = (new Pdf($pdftotextPath))->setPdf($pdfPath)->text();
        } else {
            $imagePath = storage_path('app/public/' . $filePath);
            $ocr = new TesseractOCR($imagePath);
            $extractedText = $ocr->run();
        }

        $found = stripos($extractedText, $searchText) !== false;

        return view('ocr', compact('found'));
    }
}

