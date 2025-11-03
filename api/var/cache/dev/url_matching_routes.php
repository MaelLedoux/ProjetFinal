<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/_wdt/styles' => [[['_route' => '_wdt_stylesheet', '_controller' => 'web_profiler.controller.profiler::toolbarStylesheetAction'], null, null, null, false, false, null]],
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/xdebug' => [[['_route' => '_profiler_xdebug', '_controller' => 'web_profiler.controller.profiler::xdebugAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
        '/admin/messages' => [[['_route' => 'admin_messages', '_controller' => 'App\\Controller\\AdminController::messages'], null, null, null, false, false, null]],
        '/admin/projects' => [[['_route' => 'admin_projects', '_controller' => 'App\\Controller\\AdminController::projects'], null, null, null, false, false, null]],
        '/admin/projects/add' => [[['_route' => 'admin_project_add', '_controller' => 'App\\Controller\\AdminController::addProject'], null, null, null, false, false, null]],
        '/api/contact' => [[['_route' => 'api_contact', '_controller' => 'App\\Controller\\Api\\ContactController::contact'], null, ['POST' => 0], null, false, false, null]],
        '/api/portfolio' => [[['_route' => 'api_portfolio', '_controller' => 'App\\Controller\\Api\\PortfolioController::getPortfolio'], null, ['GET' => 0], null, false, false, null]],
        '/api/services' => [[['_route' => 'api_services', '_controller' => 'App\\Controller\\Api\\ServiceApiController::index'], null, ['GET' => 0], null, false, false, null]],
        '/admin/realisations' => [[['_route' => 'admin_realisations', '_controller' => 'App\\Controller\\RealisationController::index'], null, ['GET' => 0], null, true, false, null]],
        '/admin/realisations/add' => [[['_route' => 'admin_realisation_add', '_controller' => 'App\\Controller\\RealisationController::add'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/admin/services' => [[['_route' => 'admin_services', '_controller' => 'App\\Controller\\ServiceController::index'], null, ['GET' => 0], null, true, false, null]],
        '/admin/users' => [[['_route' => 'admin_users', '_controller' => 'App\\Controller\\UserAdminController::index'], null, null, null, true, false, null]],
        '/admin/users/new' => [[['_route' => 'admin_user_new', '_controller' => 'App\\Controller\\UserAdminController::new'], null, null, null, false, false, null]],
        '/admin/login' => [[['_route' => 'admin_login', '_controller' => 'App\\Controller\\SecurityController::login'], null, null, null, false, false, null]],
        '/admin/logout' => [[['_route' => 'admin_logout', '_controller' => 'App\\Controller\\SecurityController::logout'], null, null, null, false, false, null]],
        '/admin/dashboard' => [[['_route' => 'admin_dashboard', '_controller' => 'App\\Controller\\AdminController::dashboard'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:38)'
                    .'|wdt/([^/]++)(*:57)'
                    .'|profiler/(?'
                        .'|font/([^/\\.]++)\\.woff2(*:98)'
                        .'|([^/]++)(?'
                            .'|/(?'
                                .'|search/results(*:134)'
                                .'|router(*:148)'
                                .'|exception(?'
                                    .'|(*:168)'
                                    .'|\\.css(*:181)'
                                .')'
                            .')'
                            .'|(*:191)'
                        .')'
                    .')'
                .')'
                .'|/a(?'
                    .'|dmin/(?'
                        .'|messages/delete/([^/]++)(*:239)'
                        .'|projects/(?'
                            .'|edit/([^/]++)(*:272)'
                            .'|delete/([^/]++)(*:295)'
                        .')'
                        .'|realisations/delete/([^/]++)(*:332)'
                        .'|users/(?'
                            .'|edit/([^/]++)(*:362)'
                            .'|delete/([^/]++)(*:385)'
                        .')'
                    .')'
                    .'|pi/realisations/([^/]++)(*:419)'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        38 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        57 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        98 => [[['_route' => '_profiler_font', '_controller' => 'web_profiler.controller.profiler::fontAction'], ['fontName'], null, null, false, false, null]],
        134 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        148 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        168 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        181 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        191 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        239 => [[['_route' => 'admin_message_delete', '_controller' => 'App\\Controller\\AdminController::deleteMessage'], ['id'], ['POST' => 0], null, false, true, null]],
        272 => [[['_route' => 'admin_project_edit', '_controller' => 'App\\Controller\\AdminController::editProject'], ['id'], null, null, false, true, null]],
        295 => [[['_route' => 'admin_project_delete', '_controller' => 'App\\Controller\\AdminController::deleteProject'], ['id'], ['POST' => 0], null, false, true, null]],
        332 => [[['_route' => 'admin_realisation_delete', '_controller' => 'App\\Controller\\RealisationController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        362 => [[['_route' => 'admin_user_edit', '_controller' => 'App\\Controller\\UserAdminController::edit'], ['id'], null, null, false, true, null]],
        385 => [[['_route' => 'admin_user_delete', '_controller' => 'App\\Controller\\UserAdminController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        419 => [
            [['_route' => 'api_realisations_by_type', '_controller' => 'App\\Controller\\Api\\RealisationApiController::getByType'], ['type'], ['GET' => 0], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
