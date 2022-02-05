<?php

/*
|--------------------------------------------------------------------------
| Validation Language Lines
|--------------------------------------------------------------------------
|
| The following language lines contain the default error messages used by
| the validator class. Some of these rules have multiple versions such
| as the size rules. Feel free to tweak each of these messages here.
|
*/

return [
    'accepted'             => ':Attribute moet geaccepteerd zijn.',
    'accepted_if'          => ':Attribute moet worden geaccepteerd als :other :value is.',
    'active_url'           => ':Attribute is geen geldige URL.',
    'after'                => ':Attribute moet een datum na :date zijn.',
    'after_or_equal'       => ':Attribute moet een datum na of gelijk aan :date zijn.',
    'alpha'                => ':Attribute mag alleen letters bevatten.',
    'alpha_dash'           => ':Attribute mag alleen letters, nummers, underscores (_) en streepjes (-) bevatten.',
    'alpha_num'            => ':Attribute mag alleen letters en nummers bevatten.',
    'array'                => ':Attribute moet geselecteerde elementen bevatten.',
    'attached'             => ':Attribute is reeds gekoppeld.',
    'before'               => ':Attribute moet een datum voor :date zijn.',
    'before_or_equal'      => ':Attribute moet een datum voor of gelijk aan :date zijn.',
    'between'              => [
        'array'   => ':Attribute moet tussen :min en :max items bevatten.',
        'file'    => ':Attribute moet tussen :min en :max kilobytes zijn.',
        'numeric' => ':Attribute moet tussen :min en :max zijn.',
        'string'  => ':Attribute moet tussen :min en :max karakters zijn.',
    ],
    'boolean'              => ':Attribute moet ja of nee zijn.',
    'confirmed'            => ':Attribute bevestiging komt niet overeen.',
    'current_password'     => 'Huidig wachtwoord is onjuist.',
    'date'                 => ':Attribute moet een datum bevatten.',
    'date_equals'          => ':Attribute moet een datum gelijk aan :date zijn.',
    'date_format'          => ':Attribute moet een geldig datum formaat bevatten.',
    'different'            => ':Attribute en :other moeten verschillend zijn.',
    'digits'               => ':Attribute moet bestaan uit :digits cijfers.',
    'digits_between'       => ':Attribute moet bestaan uit minimaal :min en maximaal :max cijfers.',
    'dimensions'           => ':Attribute heeft geen geldige afmetingen voor afbeeldingen.',
    'distinct'             => ':Attribute heeft een dubbele waarde.',
    'email'                => ':Attribute is geen geldig e-mailadres.',
    'ends_with'            => ':Attribute moet met één van de volgende waarden eindigen: :values.',
    'exists'               => ':Attribute bestaat niet.',
    'file'                 => ':Attribute moet een bestand zijn.',
    'filled'               => ':Attribute is verplicht.',
    'gt'                   => [
        'array'   => 'De :attribute moet meer dan :value waardes bevatten.',
        'file'    => 'De :attribute moet groter zijn dan :value kilobytes.',
        'numeric' => 'De :attribute moet groter zijn dan :value.',
        'string'  => 'De :attribute moet meer dan :value tekens bevatten.',
    ],
    'gte'                  => [
        'array'   => 'De :attribute moet :value waardes of meer bevatten.',
        'file'    => 'De :attribute moet groter of gelijk zijn aan :value kilobytes.',
        'numeric' => 'De :attribute moet groter of gelijk zijn aan :value.',
        'string'  => 'De :attribute moet minimaal :value tekens bevatten.',
    ],
    'image'                => ':Attribute moet een afbeelding zijn.',
    'in'                   => ':Attribute is ongeldig.',
    'in_array'             => ':Attribute bestaat niet in :other.',
    'integer'              => ':Attribute moet een getal zijn.',
    'ip'                   => ':Attribute moet een geldig IP-adres zijn.',
    'ipv4'                 => ':Attribute moet een geldig IPv4-adres zijn.',
    'ipv6'                 => ':Attribute moet een geldig IPv6-adres zijn.',
    'json'                 => ':Attribute moet een geldige JSON-string zijn.',
    'lt'                   => [
        'array'   => 'De :attribute moet minder dan :value waardes bevatten.',
        'file'    => 'De :attribute moet kleiner zijn dan :value kilobytes.',
        'numeric' => 'De :attribute moet kleiner zijn dan :value.',
        'string'  => 'De :attribute moet minder dan :value tekens bevatten.',
    ],
    'lte'                  => [
        'array'   => 'De :attribute moet :value waardes of minder bevatten.',
        'file'    => 'De :attribute moet kleiner of gelijk zijn aan :value kilobytes.',
        'numeric' => 'De :attribute moet kleiner of gelijk zijn aan :value.',
        'string'  => 'De :attribute moet maximaal :value tekens bevatten.',
    ],
    'max'                  => [
        'array'   => ':Attribute mag niet meer dan :max items bevatten.',
        'file'    => ':Attribute mag niet meer dan :max kilobytes zijn.',
        'numeric' => ':Attribute mag niet hoger dan :max zijn.',
        'string'  => ':Attribute mag niet uit meer dan :max tekens bestaan.',
    ],
    'mimes'                => ':Attribute moet een bestand zijn van het bestandstype :values.',
    'mimetypes'            => ':Attribute moet een bestand zijn van het bestandstype :values.',
    'min'                  => [
        'array'   => ':Attribute moet minimaal :min items bevatten.',
        'file'    => ':Attribute moet minimaal :min kilobytes zijn.',
        'numeric' => ':Attribute moet minimaal :min zijn.',
        'string'  => ':Attribute moet minimaal :min tekens zijn.',
    ],
    'multiple_of'          => ':Attribute moet een veelvoud van :value zijn.',
    'not_in'               => 'Het formaat van :attribute is ongeldig.',
    'not_regex'            => 'De :attribute formaat is ongeldig.',
    'numeric'              => ':Attribute moet een nummer zijn.',
    'password'             => 'Wachtwoord is onjuist.',
    'present'              => ':Attribute moet bestaan.',
    'prohibited'           => ':Attribute veld is verboden.',
    'prohibited_if'        => ':Attribute veld is verboden indien :other gelijk is aan :value.',
    'prohibited_unless'    => ':Attribute veld is verboden tenzij :other gelijk is aan :values.',
    'prohibits'            => 'The :attribute field prohibits :other from being present.',
    'regex'                => ':Attribute formaat is ongeldig.',
    'relatable'            => ':Attribute mag niet gekoppeld worden aan deze bron.',
    'required'             => ':Attribute is verplicht.',
    'required_if'          => ':Attribute is verplicht indien :other gelijk is aan :value.',
    'required_unless'      => ':Attribute is verplicht tenzij :other gelijk is aan :values.',
    'required_with'        => ':Attribute is verplicht i.c.m. :values',
    'required_with_all'    => ':Attribute is verplicht i.c.m. :values',
    'required_without'     => ':Attribute is verplicht als :values niet ingevuld is.',
    'required_without_all' => ':Attribute is verplicht als :values niet ingevuld zijn.',
    'same'                 => ':Attribute en :other moeten overeenkomen.',
    'size'                 => [
        'array'   => ':Attribute moet :size items bevatten.',
        'file'    => ':Attribute moet :size kilobyte zijn.',
        'numeric' => ':Attribute moet :size zijn.',
        'string'  => ':Attribute moet :size tekens zijn.',
    ],
    'starts_with'          => ':Attribute moet starten met een van de volgende: :values.',
    'string'               => ':Attribute moet een tekst zijn.',
    'timezone'             => ':Attribute moet een geldige tijdzone zijn.',
    'unique'               => ':Attribute is al in gebruik.',
    'uploaded'             => 'Het uploaden van :attribute is mislukt.',
    'url'                  => ':Attribute moet een geldig URL zijn.',
    'uuid'                 => ':Attribute moet een geldig UUID zijn.',

    'custom'               => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    'attributes'               => [
        'scout_group' => 'Scoutinggroep',
        'scarf_usage_type_id' => 'Gebruiksreden',
        'introduced_on' => 'Geïntroduceerd op',
        'used_until' => 'Gebruikt tot',
    ],

    'color_or_pattern' => 'Het kleuren schema moet een kleur of een patroon zijn.',
    'name.common' => 'Het land moet een geldig land zijn.',
    'use_type' => 'Gebruiksreden',
];
