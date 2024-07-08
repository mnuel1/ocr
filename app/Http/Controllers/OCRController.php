<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use thiagoalessio\TesseractOCR\TesseractOCR;

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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $searchText = $request->input('searchText');
        $imagePath = $request->file('image')->store('uploads', 'public');

        $ocr = new TesseractOCR(storage_path('app/public/' . $imagePath));
        $extractedText = $ocr->run();

        $found = stripos($extractedText, $searchText) !== false;

        return view('ocr', compact('found'));
    }
}
