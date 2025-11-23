<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function switch(Request $request, $locale)
    {
        // Validate locale
        $availableLocales = ['en', 'ms', 'id', 'zh'];
        
        if (in_array($locale, $availableLocales)) {
            session()->put('locale', $locale);
        }

        return redirect()->back();
    }
}
