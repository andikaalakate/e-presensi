<?php

return [
    'name' => 'E-Presensi',
    'manifest' => [
        'name' => env('APP_NAME', 'E-Presensi'),
        'short_name' => 'E-Presensi',
        'publisher' => 'GADAK Developer',
        'scope' => '.',
        'start_url' => '/',
        'background_color' => '#fff',
        'theme_color' => '#fff',
        'display' => 'standalone',
        'orientation'=> 'portrait',
        'status_bar'=> 'blue',
        'icons' => [
            '72x72' => [
                'path' => '/assets/icons/favicon-32x32.png',
                'purpose' => 'any'
            ],
            '96x96' => [
                'path' => '/assets/icons/favicon-32x32.png',
                'purpose' => 'any'
            ],
            '128x128' => [
                'path' => '/assets/icons/android-chrome-192x192.png',
                'purpose' => 'any'
            ],
            '144x144' => [
                'path' => '/assets/icons/android-chrome-192x192.png',
                'purpose' => 'any'
            ],
            '152x152' => [
                'path' => '/assets/icons/android-chrome-192x192.png',
                'purpose' => 'any'
            ],
            '192x192' => [
                'path' => '/assets/icons/android-chrome-192x192.png',
                'purpose' => 'any'
            ],
            '384x384' => [
                'path' => '/assets/icons/android-chrome-512x512.png',
                'purpose' => 'any'
            ],
            '512x512' => [
                'path' => '/assets/icons/android-chrome-512x512.png',
                'purpose' => 'any'
            ],
        ],
        'splash' => [
            '640x1136' => 'assets/splash_screens/iPhone_8__iPhone_7__iPhone_6s__iPhone_6__4.7__iPhone_SE_portrait.png',
            '750x1334' => 'assets/splash_screens/iPhone_8_Plus__iPhone_7_Plus__iPhone_6s_Plus__iPhone_6_Plus_portrait.png',
            '828x1792' => 'assets/splash_screens/iPhone_8_Plus__iPhone_7_Plus__iPhone_6s_Plus__iPhone_6_Plus_portrait.png',
            '1125x2436' => 'assets/splash_screens/iPhone_8_Plus__iPhone_7_Plus__iPhone_6s_Plus__iPhone_6_Plus_portrait.png',
            '1242x2208' => 'assets/splash_screens/iPhone_8_Plus__iPhone_7_Plus__iPhone_6s_Plus__iPhone_6_Plus_portrait.png',
            '1242x2688' => 'assets/splash_screens/iPhone_8_Plus__iPhone_7_Plus__iPhone_6s_Plus__iPhone_6_Plus_portrait.png',
            '1536x2048' => 'assets/splash_screens/iPhone_8_Plus__iPhone_7_Plus__iPhone_6s_Plus__iPhone_6_Plus_portrait.png',
            '1668x2224' => 'assets/splash_screens/iPhone_8_Plus__iPhone_7_Plus__iPhone_6s_Plus__iPhone_6_Plus_portrait.png',
            '1668x2388' => 'assets/splash_screens/iPhone_8_Plus__iPhone_7_Plus__iPhone_6s_Plus__iPhone_6_Plus_portrait.png',
            '2048x2732' => 'assets/splash_screens/iPhone_8_Plus__iPhone_7_Plus__iPhone_6s_Plus__iPhone_6_Plus_portrait.png',
        ],
        'shortcuts' => [
            [
                'name' => 'Shortcut Link 1',
                'description' => 'Shortcut Link 1 Description',
                'url' => '/shortcutlink1',
                'icons' => [
                    "src" => "/assets/icons/favicon-32x32.png",
                    "purpose" => "any"
                ]
            ],
            [
                'name' => 'Shortcut Link 2',
                'description' => 'Shortcut Link 2 Description',
                'url' => '/shortcutlink2'
            ]
        ],
        'custom' => []
    ]
];
