<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orphan extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'guardian_phone',
        'address',
        'age',
        'status',
    ];

    protected $casts = [
        'age' => 'integer',
    ];
    public function application()
{
    return $this->hasOne(OrphanApplication::class, 'orphan_name', 'name');
}

}
