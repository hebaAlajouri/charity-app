<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sponsorship extends Model
{
    use HasFactory;

    protected $fillable = [
        'sponsor_id',
        'orphan_id',
        'sponsorship_type',
        'start_date',
        'sponsored_for',
        'number_of_orphans',
        'status',
    ];
     public function sponsor()
    {
        return $this->belongsTo(\App\Models\User::class, 'sponsor_id');
    }

    public function orphan()
    {
        return $this->belongsTo(\App\Models\Orphan::class);
    }
}
