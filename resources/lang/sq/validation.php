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

    'accepted'             => 'Fusha duhet të pranohet.',
    'active_url'           => 'Fusha nuk është URL e vlefshme.',
    'after'                => 'Fusha duhet të jetë një datë pas :date.',
    'after_or_equal'       => 'Fusha duhet të jetë një datë pas ose e barabartë me :date.',
    'alpha'                => 'Fusha mund të përmbajë vetëm shkronja.',
    'alpha_dash'           => 'Fusha mund të përmbajë vetëm shkronja, numra, dhe viza lidhëse.',
    'alpha_num'            => 'Fusha mund të përmbajë vetëm shkronja dhe numra.',
    'array'                => 'Fusha duhet të jetë një bashkësi (array).',
    'before'               => 'Fusha duhet të jetë një datë përpara :date.',
    'before_or_equal'      => 'Fusha duhet të jetë një datë përpara ose e barabartë me :date.',
    'between'              => [
        'numeric' => 'Fusha duhet të jetë midis :min dhe :max.',
        'file'    => 'Fusha duhet të jetë midis :min and :max kilobajt.',
        'string'  => 'Fusha duhet të jetë midis :min and :max karaktereve.',
        'array'   => 'Fusha duhet të ketë :min deri në :max elemente.',
    ],
    'boolean'              => 'Fusha duhet të jetë e vërtetë ose e gabuar.',
    'confirmed'            => 'Konfirmimi i fushës nuk përputhet.',
    'date'                 => 'Fusha nuk është datë e vlefshme.',
    'date_format'          => 'Fusha nuk përputhet me formatin :format.',
    'different'            => 'Fusha dhe :other duhet të jenë të ndryshme.',
    'digits'               => 'Fusha duhet të jetë me :digits shifra.',
    'digits_between'       => 'Fusha duhet të jetë midis :min dhe :max shifrave.',
    'dimensions'           => 'Fusha ka përmasa jo të vlefshme të imazhit.',
    'distinct'             => 'Fusha ka një vlerë dublikate.',
    'email'                => 'Fusha duhet të jetë një adresë e-mail e vlefshme.',
    'exists'               => 'Fusha nuk është e vlefshme.',
    'file'                 => 'Fusha duhet të jetë një skedar.',
    'filled'               => 'Fusha duhet të ketë një vlerë.',
    'image'                => 'Fusha duhet të jetë një imazh.',
    'in'                   => 'Fusha e zgjedhur nuk është e vlefshme.',
    'in_array'             => 'Fusha nuk ekziston në :other.',
    'integer'              => 'Fusha duhet të jetë numër i plotë.',
    'ip'                   => 'Fusha duhet të jetë adresë e vlefshme IP.',
    'ipv4'                 => 'Fusha duhet të jetë adresë e vlefshme IPv4.',
    'ipv6'                 => 'Fusha duhet të jetë adresë e vlefshme IPv6.',
    'json'                 => 'Fusha duhet të jetë një JSON i vlefshëm.',
    'max'                  => [
        'numeric' => 'Fusha nuk mund të jetë më e madhe se :max.',
        'file'    => 'Fusha nuk mund të jetë më e madhe se :max kilobajt.',
        'string'  => 'Fusha nuk mund të ketë më shumë se :max karaktere.',
        'array'   => 'Fusha nuk mund të ketë më shumë se :max elementë.',
    ],
    'mimes'                => 'Fusha duhet të jetë skedar i tipit: :values.',
    'mimetypes'            => 'Fusha duhet të jetë skedar i tipit: :values.',
    'min'                  => [
        'numeric' => 'Fusha duhet të jetë të paktën :min.',
        'file'    => 'Fusha duhet të jetë të paktën :min kilobajt.',
        'string'  => 'Fusha duhet të ketë të paktën :min karaktere.',
        'array'   => 'Fusha duhet të ketë të paktën :min elemente.',
    ],
    'not_in'               => 'Fusha e zgjedhur nuk është e vlefshme.',
    'numeric'              => 'Fusha duhet të jetë numër.',
    'present'              => 'Fusha duhet të jetë e pranishme.',
    'regex'                => 'Formati i fushës nuk është i vlefshëm.',
    'required'             => 'Fusha është e detyruar.',
    'required_if'          => 'Fusha është e detyruar kur :other është :value.',
    'required_unless'      => 'Fusha është e detyruar nëse :other nuk është në :values.',
    'required_with'        => 'Fusha është e detyruar kur :values është e pranishme.',
    'required_with_all'    => 'Fusha është e detyruar kur :values janë të pranishme.',
    'required_without'     => 'Fusha është e detyruar kur :values nuk është e pranishme.',
    'required_without_all' => 'Fusha është e detyruar kur asnjë nga :values nuk është e pranishme.',
    'same'                 => 'Fushat dhe :other duhet të përputhen.',
    'size'                 => [
        'numeric' => 'Fusha duhet të jetë :size.',
        'file'    => 'Fusha duhet të jetë :size kilobajt.',
        'string'  => 'Fusha duhet të ketë :size karaktere.',
        'array'   => 'Fusha duhet të përmbajë :size elemente.',
    ],
    'string'               => 'Fusha duhet të jetë një tekst.',
    'timezone'             => 'Fusha duhet të jetë një zonë e vlefshme.',
    'unique'               => 'Vlera e dhënë ekziston në sistem.',
    'uploaded'             => 'Fusha nuk u ngarkua me sukses.',
    'url'                  => 'Formati i fushës nuk është i vlefshëm.',

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
            'rule-name' => 'mesazh-i-personalizuar',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

    //Login
    'email_required' => 'Ju lutem plotësoni e-mailin.',
    'password_required' => 'Ju lutem plotësoni fjalëkalimin.',

    //Custom field validation messages
    'applicant_name_required' => 'Ju lutem plotësoni emrin e aplikantit.',
    'business_code_required' => 'Ju lutem plotësoni fushën me NIPT-in ose kodin e fermerit.',

    //Loan data validation
    'interest_rate_required' => 'Ju lutem plotësoni normën aktuale të interesit.',
    'repayment_period_required' => 'Ju lutem plotësoni periudhën e shlyerjes për vit.',
    'yearly_payments_required' => 'Ju lutem plotësoni pagesat për vit.',
    'first_payment_date_required' => 'Ju lutem plotësoni datën e pagesës së parë.',
    'interest_min_value' => 'Norma aktuale e interesit vjetor duhet të jetë më e madhe se :value.',
    'interest_max_value' => 'Norma aktuale e interesit vjetor nuk mund të jetë më e madhe se :value.',
    'loan_amount_required' => 'Ju lutem plotësoni të paktën një shumë huaje.',
    'sum_of_loan' => 'Totali i shumave të huasë duhet të jetë i barabartë me totalin e vlerave te financuara nga banka.',

    //Business data validation
    'technology_required' => 'Ju lutem zgjidhni një teknologji.',
    'field_required' => 'Ju lutem plotësoni fushën.',
    'one_subculture_required' => 'Ju lutem zgjidhni të paktën një nënprodukt.',

    //Investment plan validation
    'non_negative_field' => 'Vlera e fushës nuk mund të jetë negative.',

    //Admin users validation
    'wrong_format' => 'Ju lutem jepni të dhënat e fushës në një format të vlefshëm.',

    //Taxes validation
    'percentage_tax_min_value' => 'Përqindja e tatimit duhet të jetë më e madhe se :value.',
    'percentage_tax_max_value' => 'Përqindja e tatimit duhet të jetë më e vogël se :value.',
];
