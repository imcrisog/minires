<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

class DownloaderController extends Controller
{
    public function __invoke(string $part, string $filename)
    {
        $path = "$part/$filename";
        $full_path = Storage::path($path);

        return response()->download($full_path);
    }
}
