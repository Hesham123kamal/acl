<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => false,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        'super_admin' => [
            'roles' => 'c,r,u,d',
            'users' => 'c,r,u,d',
            'settings' => 'c,r,u,d',
        ],
        'admin' => [
            'roles' => 'c,r,u',
            'users' => 'c,r,u,d',
            'settings' => 'c,r,u',
        ],
        'user' => [
            'roles' => 'r',
            'users' => 'r',
            'settings' => 'r',
        ],
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
