<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/admin/messages' => [[['_route' => 'admin_messages', '_controller' => 'App\\Controller\\AdminController::messages'], null, null, null, false, false, null]],
        '/admin/projects' => [[['_route' => 'admin_projects', '_controller' => 'App\\Controller\\AdminController::projects'], null, null, null, false, false, null]],
        '/admin/projects/add' => [[['_route' => 'admin_project_add', '_controller' => 'App\\Controller\\AdminController::addProject'], null, null, null, false, false, null]],
        '/api/contact' => [[['_route' => 'api_contact', '_controller' => 'App\\Controller\\Api\\ContactController::contact'], null, ['POST' => 0], null, false, false, null]],
        '/api/portfolio' => [[['_route' => 'api_portfolio', '_controller' => 'App\\Controller\\Api\\PortfolioController::getPortfolio'], null, ['GET' => 0], null, false, false, null]],
        '/api/services' => [[['_route' => 'api_services', '_controller' => 'App\\Controller\\Api\\ServiceApiController::index'], null, ['GET' => 0], null, false, false, null]],
        '/admin/realisations' => [[['_route' => 'admin_realisations', '_controller' => 'App\\Controller\\RealisationController::index'], null, ['GET' => 0], null, true, false, null]],
        '/admin/realisations/add' => [[['_route' => 'admin_realisation_add', '_controller' => 'App\\Controller\\RealisationController::add'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/admin/services' => [[['_route' => 'admin_services', '_controller' => 'App\\Controller\\ServiceController::index'], null, null, null, false, false, null]],
        '/admin/login' => [[['_route' => 'admin_login', '_controller' => 'App\\Controller\\SecurityController::login'], null, null, null, false, false, null]],
        '/admin/logout' => [[['_route' => 'admin_logout', '_controller' => 'App\\Controller\\SecurityController::logout'], null, null, null, false, false, null]],
        '/admin/dashboard' => [[['_route' => 'admin_dashboard', '_controller' => 'App\\Controller\\AdminController::dashboard'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/a(?'
                    .'|dmin/(?'
                        .'|messages/delete/([^/]++)(*:44)'
                        .'|projects/(?'
                            .'|edit/([^/]++)(*:76)'
                            .'|delete/([^/]++)(*:98)'
                        .')'
                        .'|realisations/delete/([^/]++)(*:134)'
                    .')'
                    .'|pi/realisations/([^/]++)(*:167)'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        44 => [[['_route' => 'admin_message_delete', '_controller' => 'App\\Controller\\AdminController::deleteMessage'], ['id'], ['POST' => 0], null, false, true, null]],
        76 => [[['_route' => 'admin_project_edit', '_controller' => 'App\\Controller\\AdminController::editProject'], ['id'], null, null, false, true, null]],
        98 => [[['_route' => 'admin_project_delete', '_controller' => 'App\\Controller\\AdminController::deleteProject'], ['id'], ['POST' => 0], null, false, true, null]],
        134 => [[['_route' => 'admin_realisation_delete', '_controller' => 'App\\Controller\\RealisationController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        167 => [
            [['_route' => 'api_realisations_by_type', '_controller' => 'App\\Controller\\Api\\RealisationApiController::getByType'], ['type'], ['GET' => 0], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
