<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function show($filename)
    {
        $path = 'storage/admins/videos/' . $filename;
        return response()->file($path);
    }
}
