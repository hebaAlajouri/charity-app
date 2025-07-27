<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
      'title',
    'title_en',
    'category',
    'category_en',
    'description',
    'description_en',
    'file_path',
    'published_at',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];
       public function getLocalizedTitleAttribute()
    {
        $locale = app()->getLocale();
        if ($locale === 'en' && !empty($this->title_en)) {
            return $this->title_en;
        }
        return $this->title;
    }

    public function getLocalizedCategoryAttribute()
    {
        $locale = app()->getLocale();
        if ($locale === 'en' && !empty($this->category_en)) {
            return $this->category_en;
        }
        return $this->category;
    }
}
