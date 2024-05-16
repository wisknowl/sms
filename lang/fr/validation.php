<?php

return [

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

    'accepted' => 'Le champ :attribute doit être accepté.',
    'accepted_if' => 'Le champ :attribute doit être accepté lorsque :other est :value.',
    'active_url' => 'Le champ :attribute doit être une URL valide.',
    'after' => 'Le champ :attribute doit être une date postérieure à :date.',
    'after_or_equal' => 'Le champ :attribute doit être une date postérieure ou égale à :date.',
    'alpha' => 'Le champ :attribute ne doit contenir que des lettres.',
    'alpha_dash' => 'Le champ :attribute ne doit contenir que des lettres, des chiffres, des tirets et des traits de soulignement.',
    'alpha_num' => 'Le champ :attribute ne doit contenir que des lettres et des chiffres.',
    'array' => 'Le champ :attribute doit être un tableau.',
    'ascii' => 'Le champ :attribute ne doit contenir que des caractères alphanumériques et des symboles à un octet.',
    'before' => 'Le champ :attribute doit être une date antérieure à :date.',
    'before_or_equal' => 'Le champ :attribute doit être une date antérieure ou égale à :date.',
    'between' => [
        'array' => 'Le champ :attribute doit contenir entre :min et :max éléments.',
        'file' => 'Le champ :attribute doit être compris entre :min et :max kilobytes.',
        'numeric' => 'Le champ :attribute doit être compris entre :min et :max.',
        'string' => 'Le champ :attribute doit contenir entre :min et :max caractères.',
    ],


    'boolean' => 'Le champ :attribute doit être vrai ou faux.',
    'can' => 'Le champ :attribute contient une valeur non autorisée.',
    'confirmed' => 'La confirmation du champ :attribute ne correspond pas.',
    'current_password' => 'Le mot de passe est incorrect.',
    'date' => 'Le champ :attribute doit être une date valide.',
    'date_equals' => 'Le champ :attribute doit être une date égale à :date.',
    'date_format' => 'Le champ :attribute doit correspondre au format :format.',
    'decimal' => 'Le champ :attribute doit avoir :decimal décimales.',
    'declined' => 'Le champ :attribute doit être refusé.',
    'declined_if' => 'Le champ :attribute doit être refusé lorsque :other est :value.',
    'different' => 'Les champs :attribute et :other doivent être différents.',
    'digits' => 'Le champ :attribute doit être :digits digits.',
    'digits_between' => 'Le champ :attribute doit être compris entre :min et :max chiffres.',
    'dimensions' => 'Le champ :attribute a des dimensions d\'image non valides.',
    'distinct' => 'Le champ :attribute a une valeur en double.',
    'doesnt_end_with' => 'Le champ :attribute ne doit pas se terminer par l\'un des éléments suivants : :values.',
    'doesnt_start_with' => 'Le champ :attribute ne doit pas commencer par l\'un des éléments suivants : :values.',
    'email' => 'Le champ :attribute doit être une adresse email valide.',
    'ends_with' => 'Le champ :attribute doit se terminer par l\'un des éléments suivants : :values.',
    'enum' => 'L\'attribut sélectionné n\'est pas valide.',
    'exists' => 'L\'attribut :attribut sélectionné n\'est pas valide.',
    'file' => 'Le champ :attribute doit être un fichier.',
    'filled' => 'Le champ :attribute doit avoir une valeur.',
    'gt' => [
        'array' => 'Le champ :attribute doit contenir plus de :value éléments.',
        'file' => 'Le champ :attribute doit être supérieur à :value kilobytes.',
        'numeric' => 'Le champ :attribute doit être supérieur à :value.',
        'string' => 'Le champ :attribute doit être supérieur à :value caractères.',
    ],


    'gte' => [
            'array' => 'Le champ :attribute doit contenir des éléments :value ou plus.',
            'file' => 'Le champ :attribute doit être supérieur ou égal à :value kilobytes.',
            'numeric' => 'Le champ :attribute doit être supérieur ou égal à :value.',
            'string' => 'Le champ :attribute doit être supérieur ou égal aux caractères :value.',
        ],
        'image' => 'Le champ :attribute doit être une image.',
        'in' => 'L\'attribut :attribut sélectionné n\'est pas valide.',
        'in_array' => 'Le champ :attribute doit exister dans :other.',
        'integer' => 'Le champ :attribute doit être un entier.',
        'ip' => 'Le champ :attribute doit être une adresse IP valide.',
        'ipv4' => 'Le champ :attribute doit être une adresse IPv4 valide.',
        'ipv6' => 'Le champ :attribute doit être une adresse IPv6 valide.',
        'json' => 'Le champ :attribute doit être une chaîne JSON valide.',
        'lowercase' => 'Le champ :attribute doit être en minuscule.',
        'lt' => [
            'array' => 'Le champ :attribute doit contenir moins d\'éléments :value.',
            'file' => 'Le champ :attribute doit être inférieur à :value kilobytes.',
            'numeric' => 'Le champ :attribute doit être inférieur à :value.',
            'string' => 'Le champ :attribute doit être inférieur à :value caractères.',
        ],
        'lte' => [
            'array' => 'Le champ :attribute ne doit pas contenir plus de :value éléments.',
            'file' => 'Le champ :attribute doit être inférieur ou égal à :value kilobytes.',
            'numeric' => 'Le champ :attribute doit être inférieur ou égal à :value.',
            'string' => 'Le champ :attribute doit être inférieur ou égal aux caractères :value.',
        ],
        'mac_address' => 'Le champ :attribute doit être une adresse MAC valide.',
        'max' => [
            'array' => 'Le champ :attribute ne doit pas contenir plus de :max éléments.',
            'file' => 'Le champ :attribute ne doit pas être supérieur à :max kilobytes.',
            'numeric' => 'Le champ :attribute ne doit pas être supérieur à :max.',
            'string' => 'Le champ :attribute ne doit pas contenir plus de :max caractères.',
        ],
        'max_digits' => 'Le champ :attribute ne doit pas contenir plus de :max chiffres.',
        'mimes' => 'Le champ :attribute doit être un fichier de type : :values.',
        'mimetypes' => 'Le champ :attribute doit être un fichier de type : :values.',
        'min' => [
            'array' => 'Le champ :attribute doit contenir au moins :min éléments.',
            'file' => 'Le champ :attribute doit faire au moins :min kilobytes.',
            'numeric' => 'Le champ :attribute doit être au moins :min.',
            'string' => 'Le champ :attribute doit contenir au moins :min caractères.',
        ],

    'min_digits' => 'Le champ :attribute doit contenir au moins :min chiffres.',
    'missing' => 'Le champ :attribute doit être manquant.',
    'missing_if' => 'Le champ :attribute doit être manquant lorsque :other est :value.',
    'missing_unless' => 'Le champ :attribute doit être manquant sauf si :other est :value.',
    'missing_with' => 'Le champ :attribute doit être manquant lorsque :values  est présent.',
    'missing_with_all' => 'Le champ :attribute doit être manquant lorsque les :values sont présentes.',
    'multiple_of' => 'Le champ :attribute doit être un multiple de :value.',
    'not_in' => 'L\'attribut :attribut sélectionné n\'est pas valide.',
    'not_regex' => 'Le format du champ :attribute n\'est pas valide.',
    'numeric' => 'Le champ :attribute doit être un nombre.',
    'password' => [
    'letters' => 'Le champ :attribute doit contenir au moins une lettre.',
    'mixed' => 'Le champ :attribute doit contenir au moins une lettre majuscule et une lettre minuscule.',
    'numbers' => 'Le champ :attribute doit contenir au moins un chiffre.',
    'symbols' => 'Le champ :attribute doit contenir au moins un symbole.',
    'uncompromised' => 'L\':attribute donné est apparu dans une fuite de données. Veuillez choisir un autre :attribut.',
    ],
    'present' => 'Le champ :attribute doit être présent.',
    'present_if' => 'Le champ :attribute doit être présent lorsque :other est :value.',
    'present_unless' => 'Le champ :attribute doit être présent sauf si :other est :value.',
    'present_with' => 'Le champ :attribute doit être présent lorsque :values est présent.',
    'present_with_all' => 'Le champ :attribute doit être présent lorsque les :values sont présentes.',
    'prohibited' => 'Le champ :attribute est interdit.',
    'prohibited_if' => 'Le champ :attribute est interdit lorsque :other vaut :value.',
    'prohibited_unless' => 'Le champ :attribute est interdit sauf si :other est dans :values.',
    'prohibits' => 'Le champ :attribute interdit à :other d\'être présent.',
    'regex' => 'Le format du champ :attribute n\'est pas valide.',
    'required' => 'Le champ :attribute est obligatoire',
    'required_array_keys' => 'Le champ :attribute doit contenir des entrées pour : :values.',
    'required_if' => 'Le champ :attribute est obligatoire lorsque :other est :value.',
    'required_if_accepted' => 'Le champ :attribute est obligatoire lorsque :other est accepté.',
    'required_unless' => 'Le champ :attribute est obligatoire sauf si :other est dans :values.',
    'required_with' => 'Le champ :attribute est obligatoire lorsque :values est présent.',
    'required_with_all' => 'Le champ :attribute est obligatoire lorsque les :values sont présentes.',
    'required_without' => 'Le champ :attribute est obligatoire lorsque :values n\'est pas présent.',
    'required_without_all' => 'Le champ :attribute est obligatoire lorsqu\'aucune des :values n\'est présente.',
    'same' => 'Le champ :attribute doit correspondre à :other.',
    'size' => [
    'array' => 'Le champ :attribute doit contenir des éléments :size.',
    'file' => 'Le champ :attribute doit être :size kilobytes.',
    'numeric' => 'Le champ :attribute doit être :size.',
    'string' => 'Le champ :attribute doit contenir des caractères :size.',
    ],
    'starts_with' => 'Le champ :attribute doit commencer par l\'un des éléments suivants : :values.',
    'string' => 'Le champ :attribute doit être une chaîne.',
    'timezone' => 'Le champ :attribute doit être un fuseau horaire valide.',
    'unique' => 'L\':attribute a déjà été pris.',
    'uploaded' => 'Le :attribute n\'a pas pu être téléchargé.',
    'uppercase' => 'Le champ :attribute doit être en majuscule.',
    'url' => 'Le champ :attribute doit être une URL valide.',
    'ulid' => 'Le champ :attribute doit être un ULID valide.',
    'uuid' => 'Le champ :attribute doit être un UUID valide.',
        /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
