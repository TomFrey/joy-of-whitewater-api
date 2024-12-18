<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateEventRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $user = $this->user();
        return $user != null && $user->tokenCan('update');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $method = $this->method();
        if ($method == 'PUT'){
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
                'wirdAngezeigt' => ['required'],
                'paddelreiseGruppe' => ['nullable'],
                'anzahlPausentage' => ['nullable'],
                'anmeldeSchluss' => ['nullable']
            ];
        } 
        // ist ein PATCH Request
        else {
            return [
                'stateId' => ['sometimes', 'required'],
                'name' => ['sometimes', 'required'],
                'beschreibung' => ['sometimes', 'nullable'],
                'treffpunkt' => ['sometimes', 'nullable'],
                'preisKurs' => ['sometimes', 'required'],
                'preisMaterial' => ['sometimes', 'required'],
                'vonDatum' => ['sometimes', 'required'],
                'bisDatum' => ['sometimes', 'required'],
                'ort' => ['sometimes', 'nullable'],
                'land' => ['sometimes', 'nullable'],
                'fluss' => ['sometimes', 'nullable'],
                'kursStufe' => ['sometimes', 'required', Rule::in(['Level1', 'Level2', 'Level3', 'Level4', 'Level5', 'alle', 'Level3-Level4', 'Level4-Level5'])],
                'sportArt' => ['sometimes', 'required', Rule::in(['Kajak', 'Kanadier', 'Packraft', 'alle'])],
                'typ' => ['sometimes', 'required', Rule::in(['Paddelreise', 'Kanukurs', 'Eskimotieren', 'Packraft Kurs'])],
                'guide' => ['sometimes', 'nullable'],
                'wirdAngezeigt' => ['sometimes', 'required'],
                'paddelreiseGruppe' => ['sometimes', 'nullable'],
                'anzahlPausentage' => ['sometimes', 'nullable'],
                'anmeldeSchluss' => ['sometimes', 'nullable']
            ];
        }

    }

    protected function prepareForValidation(){

        if ($this->stateId)
        {
            $this->merge([
                'state_id' => $this->stateId
            ]);
        }

        if ($this->preisKurs)
        {
            $this->merge([
                'preis_kurs' => $this->preisKurs
            ]);
        }

        if ($this->preisMaterial)
        {
            $this->merge([
                'preis_material' => $this->preisMaterial
            ]);
        }

        if ($this->vonDatum)
        {
            $this->merge([
                'von_datum' => $this->vonDatum
            ]);
        }

        if ($this->bisDatum)
        {
            $this->merge([
                'bis_datum' => $this->bisDatum
            ]);
        }

        if ($this->kursStufe)
        {
            $this->merge([
                'kurs_stufe' => $this->kursStufe
            ]);
        }

        if ($this->sportArt)
        {
            $this->merge([
                'sport_art' => $this->sportArt
            ]);
        }

        if ($this->paddelreiseGruppe)
        {
            $this->merge([
                'paddelreise_gruppe' => $this->paddelreiseGruppe
            ]);
        }

        if ($this->anzahlPausentage)
        {
            $this->merge([
                'anzahl_pausentage' => $this->anzahlPausentage
            ]);
        }

        if ($this->anmeldeSchluss)
        {
            $this->merge([
                'anmelde_schluss' => $this->anmeldeSchluss
            ]);
        }

        if ($this->wirdAngezeigt)
        {
            $this->merge([
                'wird_angezeigt' => $this->wirdAngezeigt
            ]);
        }
    }
}
