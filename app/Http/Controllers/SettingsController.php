<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Settings;

class SettingsController extends Controller
{
    public function setQuote(Request $request)
    {
        $text = $request->text;
        Settings::where('field', 'quote')->update([
            'text' => $text
        ]);

        
    }

    public function setAbout(Request $request)
    {
        $text = $request->text;
        Settings::where('field', 'about')->update([
            'text' => $text
        ]);
    }
}
