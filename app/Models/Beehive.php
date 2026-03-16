<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Beehive extends Model
{
    protected $fillable = [
        'location_id',
        'nazev',
        'cislo',
        'pocet_nastavku',
        'poznamky'
    ];

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function records()
    {
        return $this->hasMany(Record::class);
    }
}
