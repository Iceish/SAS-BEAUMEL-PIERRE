<?php

// Conventions :
//  - Only words / short sentences that can be added in external text
//  - Do not apply punctuation or uppercase (Except for Names etc...)
//  - Do not apply plural to tags

return [
    'company.name' => 'SAS-BEAUMEL-PIERRE',
    'click' => 'cliquez',
    'accept' => 'accepter',
    'print' => 'imprimer',

    'home' => 'acceuil',
    'about-us' => 'a propos de nous',
    'contact-us' => 'contactez nous',
    'eula' => 'CGU',
    'about-developers' => 'a propos des développeurs',

    'login' => 'se connecter',
    'dashboard' => 'tableau de bord',
    'profile' => 'profile',
    'camera' => 'caméra|caméras',
    'client' => 'client|clients',
    'provider' => 'fournisseur|fournisseurs',
    'partner' => 'partenaire|partenaires',
    'vehicle' => 'véhicule|véhicules',
    'invoice' => 'facture|factures',
    'product' => 'produit|produits',
    'user' => 'utilisateur|utilisateurs',
    'role' => 'rôle|rôles',
    'setting' => 'paramètre|paramètres',
    'ticket' => 'ticket|tickets',

    'data' => [

        'null' => 'non spécifié',

        'crud' => [
            'create' => 'créer',
            'creating' => 'création de :item',

            'edit' => 'modifier',
            'editing' => 'modification de :item',

            'delete' => 'supprimer',
            'deleting' => 'suppretion de :item',

            'search' => 'rechercher',
            'searching' => 'recherche de :item',

            'action' => 'action|actions',
        ],

        'input' => [

            'text' => [
                'fullname' => [
                    'label' => 'nom complet',
                    'placeholder' => 'John Doe',
                ],
                'username' => [
                    'label' => 'nom d\'utilisateur',
                    'placeholder' => 'administrateur',
                ],
                'available' => [
                    'label' => 'disponible',
                ],
                'subject' => [
                    'label' => 'sujet',
                    'placeholder' => 'sujet',
                ],
                'address' => [
                    'label' => 'adresse',
                    'placeholder' => 'Rue de la Paix',
                ],
                'city' => [
                    'label' => 'ville',
                    'placeholder' => 'Paris',
                ],
                'tel' => [
                    'label' => 'téléphone',
                    'placeholder' => '07-05-65-86-89',
                ],
                'place' => [
                    'label' => 'place',
                    'placeholder' => 'red barn',
                ],
                'license-plate' => [
                    'label' => 'plaque d\'immatriculation',
                    'placeholder' => 'AK-124-FD',
                ],
                'path' => [
                    'label' => 'chemin',
                    'placeholder' => 'dossier/document.pdf',
                ],
                'file' => [
                    'label' => 'fichier',
                ],
                'image-path' => [
                    'label' => 'chemin de l\' image',
                    'placeholder' => 'dossier/image.png',
                ],
                'payment-mode' => [
                    'label' => 'mode de payement',
                    'placeholder' => 'espèces',
                ],
                'ip' => [
                    'label' => 'ip',
                    'placeholder' => '0.0.0.0',
                ],
                'from' => [
                    'label' => 'De',
                    'placeholder' => 'joe@doe.com'
                ],
                'content' => [
                    'label' => 'content',
                    'placeholder' => 'Bonjour ...'
                ],
                'transport' => [
                    'label' => 'transport',
                    'placeholder' => 'camion'
                ],
                'vat' => [
                    'label' => 'tva',
                    'placeholder' => '10.8'
                ],
            ],

            'password' => [
                'default' => [
                    'label' => 'mot de passe',
                    'placeholder' => 'P8q5Fc7eD',
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
                    'placeholder' => 'bonjour ...',
                ],
            ],

            'number' => [
                'id' => [
                    'label' => 'identifiant',
                    'placeholder' => '4',
                ],
                'postal-code' => [
                    'label' => 'code postal',
                    'placeholder' => '75002',
                ],
                'price' => [
                    'label' => 'prix',
                    'placeholder' => '35',
                ],
                'total' => [
                    'label' => 'total',
                    'placeholder' => '27',
                ],
                'quantity' => [
                    'label' => 'quantité',
                    'placeholder' => '9',
                ],
            ],

            'date' => [
                'default' => [
                    'label' => 'date',
                ],
                'revision' => [
                    'label' => 'date de modification',
                ],
                'payment' => [
                    'label' => 'date de paiement',
                ],
                'verified' => [
                    'label' => ':item vérifié le'
                ],
                'created' => [
                    'label' => ':item créé le'
                ],
                'updated' => [
                    'label' => ':item actualisé le'
                ],
            ],

            'boolean' => [
                'available' => [
                    'label' => 'disponible',
                    'placeholder' => 'false',
                ],
            ],

            'submit' => [
              'default' => [
                  'label' => 'soumettre'
              ],
            ],
        ],
    ]

];
