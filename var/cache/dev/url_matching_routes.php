<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/xdebug' => [[['_route' => '_profiler_xdebug', '_controller' => 'web_profiler.controller.profiler::xdebugAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
        '/admin' => [
            [['_route' => 'app_admin', '_controller' => 'App\\Controller\\Admin\\DashboardController::index'], null, null, null, false, false, null],
            [['_route' => 'dashboard', '_controller' => 'App\\Controller\\Admin\\DashboardController::index'], null, null, null, false, false, null],
        ],
        '/service-informatique' => [[['_route' => 'app_contact_service_informatique', '_controller' => 'App\\Controller\\ContactServiceInformatiqueController::index'], null, null, null, false, false, null]],
        '/dossiers/nouveau' => [[['_route' => 'app_nouveau', '_controller' => 'App\\Controller\\DossiersController::new'], null, null, null, false, false, null]],
        '/profil' => [[['_route' => 'app_gestion_profil', '_controller' => 'App\\Controller\\GestionProfilController::index'], null, null, null, false, false, null]],
        '/' => [[['_route' => 'app_index', '_controller' => 'App\\Controller\\IndexController::index'], null, null, null, false, false, null]],
        '/notification' => [[['_route' => 'app_notification_index', '_controller' => 'App\\Controller\\NotificationController::index'], null, ['GET' => 0], null, true, false, null]],
        '/notification/new' => [[['_route' => 'app_notification_new', '_controller' => 'App\\Controller\\NotificationController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/register' => [[['_route' => 'app_register', '_controller' => 'App\\Controller\\RegistrationController::register'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/verify/email' => [[['_route' => 'app_verify_email', '_controller' => 'App\\Controller\\RegistrationController::verifyUserEmail'], null, null, null, false, false, null]],
        '/reset-password' => [[['_route' => 'app_forgot_password_request', '_controller' => 'App\\Controller\\ResetPasswordController::request'], null, null, null, false, false, null]],
        '/reset-password/check-email' => [[['_route' => 'app_check_email', '_controller' => 'App\\Controller\\ResetPasswordController::checkEmail'], null, null, null, false, false, null]],
        '/searchClient' => [[['_route' => 'search_clients', '_controller' => 'App\\Controller\\SearchController::searchClients'], null, null, null, false, false, null]],
        '/searchVille' => [[['_route' => 'search_ville', '_controller' => 'App\\Controller\\SearchController::searchVille'], null, null, null, false, false, null]],
        '/searchC0' => [[['_route' => 'search_c0', '_controller' => 'App\\Controller\\SearchController::searchC0'], null, null, null, false, false, null]],
        '/searchDpt' => [[['_route' => 'search_Dpt', '_controller' => 'App\\Controller\\SearchController::searchDpt'], null, null, null, false, false, null]],
        '/findOnlythree' => [[['_route' => 'findOnlythree', '_controller' => 'App\\Controller\\SearchController::findOnlythree'], null, null, null, false, false, null]],
        '/searchClientSf' => [[['_route' => 'search_clients_sf', '_controller' => 'App\\Controller\\SearchController::searchClientsSf'], null, null, null, false, false, null]],
        '/searchVilleSf' => [[['_route' => 'search_ville_sf', '_controller' => 'App\\Controller\\SearchController::searchVilleSf'], null, null, null, false, false, null]],
        '/searchC0Sf' => [[['_route' => 'search_c0_sf', '_controller' => 'App\\Controller\\SearchController::searchC0Sf'], null, null, null, false, false, null]],
        '/find20ResultSf' => [[['_route' => 'find_Result_sf', '_controller' => 'App\\Controller\\SearchController::find20ResultSF'], null, null, null, false, false, null]],
        '/login' => [[['_route' => 'app_login', '_controller' => 'App\\Controller\\SecurityController::login'], null, null, null, false, false, null]],
        '/logout' => [[['_route' => 'app_logout', '_controller' => 'App\\Controller\\SecurityController::logout'], null, null, null, false, false, null]],
        '/vrp' => [[['_route' => 'app_vrp', '_controller' => 'App\\Controller\\VrpController::index'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:38)'
                    .'|components/([^/]++)(?:/([^/]++))?(*:78)'
                    .'|wdt/([^/]++)(*:97)'
                    .'|profiler/(?'
                        .'|font/([^/\\.]++)\\.woff2(*:138)'
                        .'|([^/]++)(?'
                            .'|/(?'
                                .'|search/results(*:175)'
                                .'|router(*:189)'
                                .'|exception(?'
                                    .'|(*:209)'
                                    .'|\\.css(*:222)'
                                .')'
                            .')'
                            .'|(*:232)'
                        .')'
                    .')'
                .')'
                .'|/dossiers/(?'
                    .'|([^/]++)(?'
                        .'|/(?'
                            .'|edit(*:275)'
                            .'|locked(*:289)'
                        .')'
                        .'|(*:298)'
                    .')'
                    .'|archive/([^/]++)(*:323)'
                    .'|delete(?'
                        .'|/([^/]++)(*:349)'
                        .'|Commentaire/([^/]++)(*:377)'
                    .')'
                    .'|findAll(?'
                        .'|TraiteDossiers(?'
                            .'|(*:413)'
                            .'|Vrp(*:424)'
                        .')'
                        .'|Dossiers(?'
                            .'|(*:444)'
                            .'|Vrp(*:455)'
                        .')'
                        .'|EnCoursDeTraitement(?'
                            .'|(*:486)'
                            .'|Vrp(*:497)'
                        .')'
                        .'|NonTraite(?'
                            .'|(*:518)'
                            .'|Vrp(*:529)'
                        .')'
                    .')'
                    .'|unlock\\-dossiers/([^/]++)(*:564)'
                    .'|modifyCommentaire/([^/]++)(*:598)'
                    .'|submit\\-comment/([^/]++)(*:630)'
                .')'
                .'|/notification/(?'
                    .'|([^/]++)(?'
                        .'|/edit(*:672)'
                        .'|(*:680)'
                    .')'
                    .'|deleteByUser(*:701)'
                .')'
                .'|/reset\\-password/reset(?:/([^/]++))?(*:746)'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        38 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        78 => [[['_route' => 'ux_live_component', '_live_action' => 'get'], ['_live_component', '_live_action'], null, null, false, true, null]],
        97 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        138 => [[['_route' => '_profiler_font', '_controller' => 'web_profiler.controller.profiler::fontAction'], ['fontName'], null, null, false, false, null]],
        175 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        189 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        209 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        222 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        232 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        275 => [[['_route' => 'app_dossiers_edit', '_controller' => 'App\\Controller\\DossiersController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        289 => [[['_route' => 'app_dossiers_locked_bru', '_controller' => 'App\\Controller\\DossiersController::dossierLocked'], ['id'], ['GET' => 0], null, false, false, null]],
        298 => [[['_route' => 'app_dossiers_archive', '_controller' => 'App\\Controller\\DossiersController::archive'], ['id'], ['POST' => 0], null, false, true, null]],
        323 => [[['_route' => 'app_dossiers_rendre_archive', '_controller' => 'App\\Controller\\DossiersController::rendreAuVrp'], ['id'], null, null, false, true, null]],
        349 => [[['_route' => 'app_dossiers_delete', '_controller' => 'App\\Controller\\DossiersController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        377 => [[['_route' => 'app_delete_commentaire_dossiers', '_controller' => 'App\\Controller\\DossiersController::deleteCommentaire'], ['id'], ['GET' => 0], null, false, true, null]],
        413 => [[['_route' => 'find_all_traite_dossiers', '_controller' => 'App\\Controller\\DossiersController::findAllTraiteDossiers'], [], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        424 => [[['_route' => 'find_all_traite_dossiers_vrp', '_controller' => 'App\\Controller\\DossiersController::findAllTraiteDossiersVrp'], [], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        444 => [[['_route' => 'find_all_dossiers', '_controller' => 'App\\Controller\\DossiersController::findAllDossiers'], [], ['GET' => 0], null, false, false, null]],
        455 => [[['_route' => 'find_all_dossiers_vrp', '_controller' => 'App\\Controller\\DossiersController::findAllDossiersVrp'], [], ['GET' => 0], null, false, false, null]],
        486 => [[['_route' => 'find_en_cours_de_traitement', '_controller' => 'App\\Controller\\DossiersController::findAllEnCoursDeTraitement'], [], ['GET' => 0], null, false, false, null]],
        497 => [[['_route' => 'find_en_cours_de_traitement_vrp', '_controller' => 'App\\Controller\\DossiersController::findAllEnCoursDeTraitementVrp'], [], ['GET' => 0], null, false, false, null]],
        518 => [[['_route' => 'find_non_traite', '_controller' => 'App\\Controller\\DossiersController::findAllNonTraite'], [], ['GET' => 0], null, false, false, null]],
        529 => [[['_route' => 'find_non_traite_vrp', '_controller' => 'App\\Controller\\DossiersController::findAllNonTraiteVrp'], [], ['GET' => 0], null, false, false, null]],
        564 => [[['_route' => 'app_unlock_dossiers', '_controller' => 'App\\Controller\\DossiersController::unlockDossiersBeforeBackHomePage'], ['id'], ['GET' => 0], null, false, true, null]],
        598 => [[['_route' => 'app_modify_commentaire_dossiers', '_controller' => 'App\\Controller\\DossiersController::modifyCommentaire'], ['id'], null, null, false, true, null]],
        630 => [[['_route' => 'app_submit_comment_dossiers', '_controller' => 'App\\Controller\\DossiersController::submitCommentaire'], ['id'], null, null, false, true, null]],
        672 => [[['_route' => 'app_notification_edit', '_controller' => 'App\\Controller\\NotificationController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        680 => [[['_route' => 'app_notification_delete', '_controller' => 'App\\Controller\\NotificationController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        701 => [[['_route' => 'app_notification_delete_by_user', '_controller' => 'App\\Controller\\NotificationController::deleteNotificationsByUser'], [], null, null, false, false, null]],
        746 => [
            [['_route' => 'app_reset_password', 'token' => null, '_controller' => 'App\\Controller\\ResetPasswordController::reset'], ['token'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
