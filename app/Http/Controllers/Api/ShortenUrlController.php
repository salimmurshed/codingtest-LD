<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\ShortenedUrl;
use Illuminate\Support\Str;

class ShortenUrlController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        // return response()->json($userId);
        $urls = ShortenedUrl::all();
        return response()->json($urls);
    }
    public function getUrl()
    {
        $userId = Auth::id();
        // return response()->json($userId);
        $urls = ShortenedUrl::where('user_id', $userId)->get();
        return response()->json($urls);
    }

    public function shortenUrl(Request $request)
    {
        $userId = Auth::id();
        $request->validate([
            'original_url' => 'required|url'
        ]);

        $short_code = Str::random(6);

        $url = ShortenedUrl::create([
            'user_id' => $userId,
            'original_url' => $request->original_url,
            'short_code' => $short_code
        ]);

        return response()->json($url);
    }
}
