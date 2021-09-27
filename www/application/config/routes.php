<?php

return [
// MainController
    '' => [
        'controller' => 'main',
        'action' => 'index',
    ],

    '{post:\d+}' => [
        'controller' => 'main',
        'action' => 'index',
    ],

    'about' => [
        'controller' => 'main',
        'action' => 'about',
    ],

    'contact' => [
        'controller' => 'main',
        'action' => 'contact',
    ],
    /*
    'account/login' => [
        'controller' => 'account',
        'action' => 'login',
    ],

    'account/register' => [
        'controller' => 'account',
        'action' => 'register',
    ],
*/
    'post/{id:\d+}' => [
        'controller' => 'main',
        'action' => 'post',
    ],

    // AdminController

    'admin/login' => [
        'controller' => 'admin',
        'action' => 'login',
    ],

    'admin/logout' => [
        'controller' => 'admin',
        'action' => 'logout',
    ],

    'admin/posts' => [
        'controller' => 'admin',
        'action' => 'posts',
    ],

    'admin/add' => [
        'controller' => 'admin',
        'action' => 'add',
    ],

    'admin/edit/{id:\d+}' => [
        'controller' => 'admin',
        'action' => 'edit',
    ],

    'admin/delete/{id:\d+}' => [
        'controller' => 'admin',
        'action' => 'delete',
    ],
];