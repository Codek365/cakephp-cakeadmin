<?php
/**
 * CakeManager (http://cakemanager.org)
 * Copyright (c) http://cakemanager.org
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) http://cakemanager.org
 * @link          http://cakemanager.org CakeManager Project
 * @since         1.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Routing\Router;

Router::prefix('admin', function ($routes) {

    $routes->connect(
        '/', [
            'plugin' => 'CakeAdmin',
            'controller' => 'Users',
            'action' => 'login'
        ]
    );

    $routes->fallbacks('InflectedRoute');
});

Router::plugin('CakeAdmin', ['path' => '/'], function ($routes) {

    $routes->prefix('admin', function ($routes) {

        $routes->connect(
            '/login', ['controller' => 'Users', 'action' => 'login']
        );

        $routes->connect(
            '/logout', ['controller' => 'Users', 'action' => 'logout']
        );

        $routes->connect(
            '/posttypes/:type/:action/*', ['controller' => 'PostTypes'], ['pass' => ['type']]
        );

        $routes->connect(
            '/', ['controller' => 'Users', 'action' => 'login']
        );

        $routes->connect(
            '/users/:action/*', ['controller' => 'Users']
        );

        $routes->connect(
            '/dashboard', ['controller' => 'Dashboard']
        );

        $routes->connect(
            '/notifications/**', ['controller' => 'Notifications']
        );

        $routes->connect(
            '/settings/**', ['controller' => 'Settings']
        );

        $routes->fallbacks('InflectedRoute');

    });

});
