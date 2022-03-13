<?php

// Conventions :
//  - Only messages that compose a full sentence
//  - Apply punctuation and uppercase

return [
    'success' => [
        'crud' => [
            'created' => ':item added successfully.',
            'updated' => ':item updated successfully.',
            'deleted' => ':item deleted successfully.',
        ]
    ],
    'error' => [
        'crud' => [
            'created' => ':item creation failed.',
            'updated' => ':item update failed.',
            'deleted' => ':item delete failed.',
        ]
    ],
    'informative' => [
        'copyright' => '© 2022 - All right reserved',
        'nothing.here' => 'Nothing to show here.',
        'invoice' => [
            'client' => 'Click here to show all clients invoices.',
            'provider' => 'Click here to show all providers invoices.',
        ],
        'form' => [
            'camera' => 'This action does not connect camera on website.',
            'client' => 'This action does not create an account.',
            'provider' => 'This action does not create an account.',
            'partner' => 'This action does not create an account.',
        ],
        'greetings' => [
            'morning' => 'Good morning :name.',
            'afternoon' => 'Good afternoon :name.',
            'evening' => 'Good evening :name.',
        ],
        'cookies' => [
            'core' => 'Our website is using cookies only for user experience.'
        ],

    ],



];
