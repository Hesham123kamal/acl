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
            'admins' => 'c,r,u,d',
            'users' => 'c,r,u,d',
            'products' => 'c,r,u,d',
        ],
        'admin' => [
            'roles' => 'c,r,u',
            'admins' => 'c,r,',
            'users' => 'c,r,u,d',
            'products' => 'c,r,u',
        ],
        'user' => [
            'roles' => 'r',
            'admins' => 'r',
            'users' => 'r',
            'products' => 'r',
        ],
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
