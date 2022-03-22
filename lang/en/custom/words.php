<?php

// Conventions :
//  - Only words / short sentences that can be added in external text
//  - Do not apply punctuation or uppercase (Except for Names etc...)
//  - Do not apply plural to tags

return [
    'company.name' => 'SAS-BEAUMEL-PIERRE',
    'click' => 'click',
    'accept' => 'accept',

    'home' => 'home',
    'about-us' => 'about-us',
    'contact-us' => 'contact-us',
    'eula' => 'EULA',
    'about-developers' => 'about-developers',

    'login' => 'login',
    'dashboard' => 'dashboard',
    'profile' => 'profile',
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
    'ticket' => 'ticket|tickets',

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
                'fullname' => [
                    'label' => 'fullname',
                    'placeholder' => 'John Doe',
                ],
                'username' => [
                    'label' => 'username',
                    'placeholder' => 'root',
                ],
                'available' => [
                    'label' => 'available',
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
                'tel' => [
                    'label' => 'phone number',
                    'placeholder' => '+1 202-456-1111',
                ],
                'place' => [
                    'label' => 'place',
                    'placeholder' => 'red barn',
                ],
                'license-plate' => [
                    'label' => 'license plate',
                    'placeholder' => 'AK-124-FD',
                ],
                'path' => [
                    'label' => 'path',
                    'placeholder' => 'directory/document.pdf',
                ],
                'file' => [
                    'label' => 'file'
                ],
                'image-path' => [
                    'label' => 'image path',
                    'placeholder' => 'directory/image.png',
                ],
                'payment-mode' => [
                    'label' => 'payment mode',
                    'placeholder' => 'cash',
                ],
                'ip' => [
                    'label' => 'ip',
                    'placeholder' => '0.0.0.0',
                ],
                'from' => [
                    'label' => 'from',
                    'placeholder' => 'joe@doe.com'
                ],
                'content' => [
                    'label' => 'content',
                    'placeholder' => 'hello ...'
                ],
                'transport' => [
                    'label' => 'transport',
                    'placeholder' => 'truck'
                ],
                'vat' => [
                    'label' => 'vat',
                    'placeholder' => '10.8'
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
                    'placeholder' => 'Hello ...',
                ],
            ],

            'number' => [
                'id' => [
                    'label' => 'identifier',
                    'placeholder' => '4',
                ],
                'postal-code' => [
                    'label' => 'postal code',
                    'placeholder' => '90 002',
                ],
                'price' => [
                    'label' => 'price',
                    'placeholder' => '35',
                ],
                'total' => [
                    'label' => 'total',
                    'placeholder' => '27',
                ],
                'quantity' => [
                    'label' => 'quantity',
                    'placeholder' => '9',
                ],
            ],

            'date' => [
                'default' => [
                    'label' => 'date',
                ],
                'revision' => [
                    'label' => 'revision date',
                ],
                'payment' => [
                    'label' => 'payment date',
                ],
                'verified' => [
                    'label' => ':item verified at'
                ],
                'created' => [
                    'label' => ':item created at'
                ],
                'updated' => [
                    'label' => ':item updated at'
                ],
            ],

            'boolean' => [
                'available' => [
                    'label' => 'available',
                    'placeholder' => 'false',
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
