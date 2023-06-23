<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\State;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $state_id = $this->faker->numberBetween(1, 4);
        $name = $this->faker->randomElement(['Kajak Level 1 Kurs',
                                            'Kanadier Level 2 Kurs',
                                            'Kajak Level 5', 
                                            'Packraft Level3-4 Kurs',
                                            'Kanadier (Open Canoe) Level 3 Kurs']);
        $beschreibung = $this->faker->sentence();
        $preis_kurs = $this->faker->numberBetween(170, 600);
        $preis_material = $this->faker->numberBetween(50, 170);
        $von_datum = $this->faker->dateTimeThisYear('+5 months');
        $bis_datum = Carbon::parse($von_datum)->addDays(2);
        $kurs_stufe = $this->faker->randomElement(['Level 1', 'Level 2', 'Level 3', 'Level 4']);
        $sport_art = $this->faker->randomElement(['Kajak', 'Kanadier', 'Packraft', 'alle']);
        $typ = $this->faker->randomElement(['Paddelreise', 'Kanukurs', 'Eskimotieren', 'Packraft Kurs']);

        return [
            'state_id' => $state_id,
            'name' => $name,
            'beschreibung' => $beschreibung,
            'treffpunkt' => 'Wir treffen uns 10:20 in Versam Station (oranges Haus).',
            'preis_kurs' => $preis_kurs,
            'preis_material' => $preis_material,
            'von_datum' => $von_datum,
            'bis_datum' => $bis_datum,
            'ort' => 'Versam',
            'land' => 'Schweiz',
            'fluss' => 'Vorderrhein',
            'kurs_stufe' => $kurs_stufe,
            'sport_art' => $sport_art,
            'typ' => $typ,
            'guide' => 'Joe Frey',
            'wird_angezeigt' => 1,
            'paddelreise_gruppe' => NUll,
            'anzahl_pausentage' => NULL,
            'anmelde_schluss' => NULL
        ];
    }
}
