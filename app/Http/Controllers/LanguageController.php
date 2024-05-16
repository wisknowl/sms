<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Session;

class LanguageController extends Controller
{
    public function switch($locale)
    {
        // dd($locale);
        if (!in_array($locale, ['en', 'fr'])) {
            abort(404);
        }
        Session::put('app_locale', $locale);
        $ok = Session::get('app_locale');
        // dump($ok);
        // session(['app_locale' => $locale]);
        App::setLocale($ok);
        return redirect()->back();
    }
}
