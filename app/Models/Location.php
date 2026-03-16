<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = [
        'nazev',
        'lokace',
        'poznamky'
    ];

    public function beehives()
    {
        return $this->hasMany(Beehive::class);
    }
}
