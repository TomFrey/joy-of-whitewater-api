<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'stateId' => $this->state_id,
            'name' => $this->name,
            'beschreibung' => $this->beschreibung,
            'treffpunkt' => $this->treffpunkt,
            'preisKurs' => $this->preis_kurs,
            'preisMaterial' => $this->preis_material,
            'vonDatum' => $this->von_datum,
            'bisDatum' => $this->bis_datum,
            'ort' => $this->ort,
            'land' => $this->land,
            'fluss' => $this->fluss,
            'kursStufe' => $this->kurs_stufe,
            'sportArt' => $this->sport_art,
            'typ' => $this->typ,
            'guide' => $this->guide,
            'wirdAngezeigt' => $this->wird_angezeigt,
            'paddelreiseGruppe' => $this->paddelreise_gruppe,
            'anzahlPausentage' => $this->anzahl_pausentage,
            'anmeldeSchluss' => $this->anmelde_schluss
        ];
    }
}
