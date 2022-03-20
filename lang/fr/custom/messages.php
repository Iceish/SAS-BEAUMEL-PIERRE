<?php

// Conventions :
//  - Only messages that compose a full sentence
//  - Apply punctuation and uppercase

return [
    'success' => [
        'crud' => [
            'created' => ':item crée avec succès.',
            'updated' => ':item modifié avec succès.',
            'deleted' => ':item supprimé avec succès.',
        ]
    ],
    'error' => [
        'crud' => [
            'created' => ':item creation échoué.',
            'updated' => ':item modification échoué.',
            'deleted' => ':item supprétion échoué.',
        ]
    ],
    'informative' => [
        'copyright' => '© 2022 - Tout droits réservés',
        'nothing.here' => 'Rien à voir ici.',
        'dashboard' => [
            'admin' => 'Administrateur du site'
        ],
        'form' => [
            'camera' => 'Cette action ne connecte pas la caméra sur le site.',
            'client' => 'Cette action ne créer pas de compte.',
            'provider' => 'Cette action ne créer pas de compte.',
            'partner' => 'Cette action ne créer pas de compte.',
        ],
        'greetings' => [
            'morning' => 'Bonjour :name.',
            'afternoon' => 'Bonjour :name.',
            'evening' => 'Bonsoir :name.',
        ],
        'cookies' => [
            'core' => 'Notre site utilise des cookies seulement pour votre confort.'
        ],

    ],

];
