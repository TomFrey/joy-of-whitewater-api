API mit Laravel


## Applikation starten
- Mamp starten unter:  Projekte/JoyOfWhitewater/joy-of-whitewater-api/public


## Routes
- http://localhost:8888/api/v1/events
- http://localhost:8888/api/v1/events/1 (Kurs mit id 1)


- statusId = 4 

http://localhost:8888/api/v1/events?statusId[eq]=4
- statusId != 4

http://localhost:8888/api/v1/events?statusId[ne]=4

- name = Kajak Level 5

http://localhost:8888/api/v1/events?name[eq]=Kajak%20Level%205

- POST (Neuen Kurs erstellen)
- http://localhost:8888/api/v1/events

- http://localhost:8888/api/v1/states
- http://localhost:8888/api/v1/states?name[eq]=green




## Modell erstellen:
php artisan make:model NAME --all

## Fake Daten erstellen:
php artisan migrate:fresh --seed

## Neue Resource erstellen:
php artisan make:resource VERSION/NAME-DER-RESOURCE


