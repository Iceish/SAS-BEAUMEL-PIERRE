<?php

// Conventions :
//  - Only words / short sentences that can be added in external text
//  - Do not apply punctuation or uppercase (Except for Names etc...)
//  - Do not apply plural to tags

return [
    'company.name' => 'SAS-BEAUMEL-PIERRE',

    'home' => 'home',
    'about-us' => 'about-us',
    'contact-us' => 'contact-us',
    'eula' => 'EULA',

    'login' => 'login',
    'dashboard' => 'dashboard',
    'camera' => 'camera|cameras',
    'client' => 'client|clients',
    'provider' => 'provider|providers',
    'partner' => 'partner|partners',
    'vehicle' => 'vehicle|vehicles',
    'invoice' => 'invoice|invoices',
    'product' => 'product|products',
    'user' => 'user|users',
    'role' => 'role|roles',
    'setting' => 'setting|settings',

    'data' => [

        'null' => 'not specified',

        'crud' => [
            'create' => 'create',
            'creating' => 'creating :item',

            'edit' => 'edit',
            'editing' => 'editing :item',

            'delete' => 'delete',
            'deleting' => 'deleting :item',

            'search' => 'search',
            'searching' => 'searching :item',

            'action' => 'action|actions',
        ],

        'input' => [

            'text' => [
                'name' => [
                    'label' => 'name',
                    'placeholder' => 'John Doe',
                ],
                'username' => [
                    'label' => 'username',
                    'placeholder' => 'root',
                ],
                'subject' => [
                    'label' => 'subject',
                    'placeholder' => 'issue',
                ],
                'address' => [
                    'label' => 'address',
                    'placeholder' => 'Hollywood Boulevard, Vine St',
                ],
                'city' => [
                    'label' => 'city',
                    'placeholder' => 'Los Angeles',
                ],
                'place' => [
                    'label' => 'place',
                    'placeholder' => 'red barn',
                ],
                'ip' => [
                    'label' => 'ip',
                    'placeholder' => '0.0.0.0',
                ],
            ],

            'password' => [
                'default' => [
                    'label' => 'password',
                    'placeholder' => 'to-do',
                ],
            ],

            'email' => [
                'default' => [
                    'label' => 'email',
                    'placeholder' => 'john.doe@example.com',
                ],
            ],

            'textarea' => [
                'message' => [
                    'label' => 'message',
                    'placeholder' => 'john.doe@example.com',
                ],
            ],

            'number' => [
                'postal-code' => [
                    'label' => 'postal code',
                    'placeholder' => '90 002',
                ],
            ],

            'submit' => [
              'default' => [
                  'label' => 'submit'
              ],
            ],
        ],
    ]

];
