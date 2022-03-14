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
        'nothing.here' => 'Rien a voir ici.',
        'dashboard' => [
            'admin' => 'Administrateur du site'
        ],
        'form' => [
            'camera' => 'Cette action n\'a pas de connecter la caméra sur le site.',
            'client' => 'Cette action n\'a pas de créer un compte.',
            'provider' => 'Cette action n\'a pas crée un compte.',
            'partner' => 'Cette action n\'a pas crée de compte.',
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
