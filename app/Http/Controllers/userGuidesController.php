<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class userGuidesController extends Controller
{

    public function downloadPdfFile(): BinaryFileResponse
    {
        return response()->download(public_path('file/userGuides.pdf'));
    }
}
