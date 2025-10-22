<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;

    protected $fillable = ['beehive_id', 'datum', 'typ_akce', 'popis'];

    public function beehive()
    {
        return $this->belongsTo(Beehive::class);
    }
}

