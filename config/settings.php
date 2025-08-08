<?php

return [

    /*
     * Each settings class used in your application must be registered, you can
     * put them (manually) here.
     */
    'settings' => [
        App\Settings\GeneralSettings::class,
    ],

    /*
     * The path where the settings classes will be created.
     */
    'path' => app_path('Settings'),

    /*
     * In these directories settings migrations will be stored.
     */
    'migrations_paths' => [
        database_path('settings'),
    ],

    /*
     * When no repository is specified for a settings class the following repository
     * will be used for loading and saving settings.
     */
    'default_repository' => 'database',

    /*
     * The repositories that can be used to load and save settings.
     */
    'repositories' => [
        'database' => [
            'type' => Spatie\LaravelSettings\SettingsRepositories\DatabaseSettingsRepository::class,
            'model' => null,
            'table' => null,
            'connection' => 'mysql',
        ],
    ],

    /*
     * The tool that will be used to encrypt and decrypt settings.
     */
    'encryptor' => Spatie\LaravelSettings\Encryptors\Encryptor::class,

    /*
     * The caster that will be used to cast settings to their specific types.
     */
    'caster' => Spatie\LaravelSettings\SettingsCaster::class,
];
