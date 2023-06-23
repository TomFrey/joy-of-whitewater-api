<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreEventRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $user = $this->user();
        return $user != null && $user->tokenCan('create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'stateId' => ['required'],
            'name' => ['required'],
            'beschreibung' => ['nullable'],
            'treffpunkt' => ['nullable'],
            'preisKurs' => ['required'],
            'preisMaterial' => ['required'],
            'vonDatum' => ['required'],
            'bisDatum' => ['required'],
            'ort' => ['nullable'],
            'land' => ['nullable'],
            'fluss' => ['nullable'],
            'kursStufe' => ['required', Rule::in(['Level1', 'Level2', 'Level3', 'Level4', 'Level5', 'alle', 'Level3-Level4', 'Level4-Level5'])],
            'sportArt' => ['required', Rule::in(['Kajak', 'Kanadier', 'Packraft', 'alle'])],
            'typ' => ['required', Rule::in(['Paddelreise', 'Kanukurs', 'Eskimotieren', 'Packraft Kurs'])],
            'guide' => ['nullable'],
            'wirdAngezeigt' => ['required', 'boolean'],
            'paddelreiseGruppe' => ['nullable'],
            'anzahlPausentage' => ['nullable'],
            'anmeldeSchluss' => ['nullable']
        ];
    }

    protected function prepareForValidation(){
        $this->merge([
            'state_id' => $this->stateId,
            'preis_kurs' => $this->preisKurs,
            'preis_material' => $this->preisMaterial,
            'von_datum' => $this->vonDatum,
            'bis_datum' => $this->bisDatum,
            'kurs_stufe' => $this->kursStufe,
            'sport_art' => $this->sportArt,
            'wird_angezeigt' => $this->wirdAngezeigt,
            'paddelreise_gruppe' => $this->paddelreiseGruppe,
            'anzahl_pausentage' => $this->anzahlPausentage,
            'anmelde_schluss' => $this->anmeldeSchluss
        ]);
    }
}
