<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function switch($locale): RedirectResponse
    {
        $availableLocales = ['ar', 'en'];

        if (!in_array($locale, $availableLocales)) {
            $locale = config('app.fallback_locale'); // fallback if unsupported locale
        }

        Session::put('locale', $locale);
        App::setLocale($locale);

        return redirect()->back();
    }
      public function switchLang(Request $request, $lang)
    {
        // Validate language
        $supportedLanguages = ['ar', 'en'];
        
        if (in_array($lang, $supportedLanguages)) {
            // Store language in session
            Session::put('locale', $lang);
            
            // Store text direction
            $direction = $lang === 'ar' ? 'rtl' : 'ltr';
            Session::put('text_direction', $direction);
            
            // Flash success message
            $message = $lang === 'ar' 
                ? 'تم تغيير اللغة بنجاح' 
                : 'Language changed successfully';
                
            Session::flash('success', $message);
        }
        
        return redirect()->back();
    }
    
    /**
     * Get current language direction
     */
    public function getDirection()
    {
        return Session::get('text_direction', 'rtl');
    }

}
