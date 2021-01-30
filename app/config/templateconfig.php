<?php

return [
    'template' => [
        'wrapper_start'     => TEMPLATE_PATH . 'wrapperstart.php',
        'header'            => TEMPLATE_PATH . 'header.php',
        'nav'               => TEMPLATE_PATH . 'nav.php',
        ':view'             => ':action_view',
        'wrapper_end'       => TEMPLATE_PATH . 'wrapperend.php'
    ],
    'header_resources' => [
        'css' => [
            'normalize'         => CSS . 'normalize.css',
            'bootstrap'         => 'https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css',
            'fawsome'           => CSS . 'fawsome.min.css',
            'gicons'            => CSS . 'googleicons.css',
            'main'              => CSS . 'main' . $_SESSION['lang'] . '.css'
        ],
        'js' => [
            'modernizr'         => JS . 'vendor/modernizr-2.8.3.min.js'
        ]
    ],
    'footer_resources' => [
        'jquery'                => 'https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js',
        'bootstrap'             => 'https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js',
        'helper'                => JS . 'helper.js',
        'datatables'            => JS . 'datatables' . $_SESSION['lang'] . '.js',
        'main'                  => JS . 'main.js'
    ]
];