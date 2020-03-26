<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Define the languages you want exported messages for
    |--------------------------------------------------------------------------
    */

    'locales' => ['sq', 'en'],

    /*
    |--------------------------------------------------------------------------
    | Define the target to save the exported messages to
    |--------------------------------------------------------------------------
    |
    | Directory for storing the static files generated when using file storage.
    |
    */

    'storage_path' => public_path('vendor/js-localization/'),

    /*
    |--------------------------------------------------------------------------
    | Define the messages to export
    |--------------------------------------------------------------------------
    |
    | An array containing the keys of the messages you wish to make accessible
    | for the Javascript code.
    | Remember that the number of messages sent to the browser influences the
    | time the website needs to load. So you are encouraged to limit these
    | messages to the minimum you really need.
    |
    | Supports nesting:
    |   [ 'mynamespace' => ['test1', 'test2'] ]
    | for instance will be internally resolved to:
    |   ['mynamespace.test1', 'mynamespace.test2']
    |
    */

    'messages' => [
        'messages.processing',
        'messages.search',
        'messages.view_rows',
        'messages.showing_rows',
        'messages.showing_0_rows',
        'messages.filter_message',
        'messages.working',
        'messages.no_data_found',
        'messages.no_data_in_table',
        'messages.first',
        'messages.previous',
        'messages.next',
        'messages.last',
        'messages.order_asc',
        'messages.order_desc',
        'messages.are_you_sure',
        'messages.delete_message',
        'messages.cancel',
        'cultures.greenhouse_first_period_products',
        'cultures.greenhouse_second_period_products',
    ],

    /*
    |--------------------------------------------------------------------------
    | Set the keys of config properties you want to use in javascript.
    | Caution: Do not expose any configuration values that should be kept privately!
    |--------------------------------------------------------------------------
    */
    'config' => [
        /*'app.debug'  // example*/
    ],

    /*
    |--------------------------------------------------------------------------
    | Disables the config cache if set to true, so you don't have to
    | run `php artisan js-localization:refresh` each time you change configuration files.
    | Attention: Should not be used in production mode due to decreased performance.
    |--------------------------------------------------------------------------
    */
    'disable_config_cache' => false,

    /*
    |--------------------------------------------------------------------------
    | Whether or not to split up the exported messages.js file into separate
    | lang-{locale}.js files.
    |--------------------------------------------------------------------------
    */
    'split_export_files' => false,
];
