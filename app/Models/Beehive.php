<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beehive extends Model
{
    use HasFactory;

    protected $fillable = ['nazev', 'cislo', 'pocet_nastavku', 'stanoviste', 'poznamky'];

    public function records()
    {
        return $this->hasMany(Record::class);
    }
}
