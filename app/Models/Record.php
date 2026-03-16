<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    protected $fillable = [
        'beehive_id',
        'datum',
        'typ_akce',
        'popis'
    ];

    protected $casts = [
        'datum' => 'date'
    ];

    public function beehive()
    {
        return $this->belongsTo(Beehive::class);
    }
}
