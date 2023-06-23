<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'state_id',
        'name',
        'beschreibung',
        'treffpunkt',
        'preis_kurs',
        'preis_material',
        'von_datum',
        'bis_datum',
        'ort',
        'land',
        'fluss',
        'kurs_stufe',
        'sport_art',
        'typ',
        'guide',
        'wird_angezeigt',
        'paddelreise_gruppe',
        'anzahl_pausentage',
        'anmelde_schluss'
    ];

    public function states(){
        return $this->hasOne(State::class);
    }
}
