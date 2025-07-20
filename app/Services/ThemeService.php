<?php

namespace App\Services;

use App\Models\ThemeSetting;
use Illuminate\Support\Facades\Cache;

class ThemeService
{
    public function get($key, $default = null)
    {
        return ThemeSetting::get($key, $default);
    }

    public function set($key, $value)
    {
        return ThemeSetting::set($key, $value);
    }

    public function getCssVariables()
    {
        return Cache::remember('theme_css_variables', 3600, function () {
            return ThemeSetting::getColorVariables();
        });
    }

    public function generateInlineCss()
    {
        $variables = $this->getCssVariables();
        
        if (empty($variables)) {
            return '';
        }

        $css = '<style>:root {';
        foreach ($variables as $key => $value) {
            $css .= "{$key}: {$value};";
        }
        $css .= '}</style>';

        return $css;
    }

    public function getAllSettings()
    {
        return ThemeSetting::all()->keyBy('key');
    }

    public function getSettingsByCategory($category)
    {
        return ThemeSetting::getAllByCategory($category);
    }
}