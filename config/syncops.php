<?php

return [

    /*
    |--------------------------------------------------------------------------
    | SyncOps Remote Server Connections
    |--------------------------------------------------------------------------
    |
    | This configuration defines the remote servers that the SyncOps plugin
    | can connect to. These connections are used by SyncOps plugin to
    | execute commands and synchronize data, streamlining your
    | deployment and DevOps workflows for Winter CMS.
    |
    */

    'connections' => [
        'production' => [
            // Set SSH credentials
            'host'      => env('SYNCOPS_PRODUCTION_HOST', ''), // host IP address
            'port'      => env('SYNCOPS_PRODUCTION_PORT', 22),
            'user'      => env('SYNCOPS_PRODUCTION_USER', ''), // SSH user
//            'pass'      => env('SYNCOPS_PRODUCTION_PASS', ''), // SSH pass
            'key_path'  => env('SYNCOPS_PRODUCTION_KEY', ''), // private key file path

            // Set project path and working branch names
            'path'        => rtrim(env('SYNCOPS_PRODUCTION_PATH'), '/'),
            'branch_prod' => env('SYNCOPS_PRODUCTION_BRANCH_PROD', 'prod'),
            'branch_main' => env('SYNCOPS_PRODUCTION_BRANCH_MAIN', 'main'),

            // Permissions are required if there are multiple users with different access rights on the server
            'permissions' => [
                'root_user'   => env('REMOTE_PRODUCTION_ROOT_USER'),
                'web_user'    => env('REMOTE_PRODUCTION_WEB_USER'),
                'web_folders' => 'storage,themes',
            ],

            // Extra data is required for the NumenCode\SyncOps plugin
            'backup'    => [
//                'path'        => rtrim(env('REMOTE_PRODUCTION_PATH'), '/'),
//                'branch'      => env('REMOTE_PRODUCTION_BRANCH', 'prod'),
//                'branch_main' => env('REMOTE_PRODUCTION_BRANCH_MAIN', 'main'),



                // Remote database credentials are only required for the db:pull command
                'database'    => [
                    'name'     => env('REMOTE_DB_DATABASE'),
                    'username' => env('REMOTE_DB_USERNAME'),
                    'password' => env('REMOTE_DB_PASSWORD'),

                    // Only tables specified in this array will be viable for the db:pull command.
                    // If no tables are specified, all tables are taken into account.
                    'tables'   => [
                        // Custom
//                        'custom_plugin_table_example',
                        // NumenCode
//                        'numencode_blogextension_files',
//                        'numencode_blogextension_pictures',
//                        'numencode_widgets_features_groups',
//                        'numencode_widgets_features_items',
//                        'numencode_widgets_highlights_groups',
//                        'numencode_widgets_highlights_items',
//                        'numencode_widgets_promotions_groups',
//                        'numencode_widgets_promotions_items',
                        // Winter
//                        'winter_blog_categories',
//                        'winter_blog_posts',
//                        'winter_blog_posts_categories',
//                        'winter_sitemap_definitions',
//                        'winter_translate_attributes',
//                        'winter_translate_indexes',
//                        'winter_translate_locales',
//                        'winter_translate_messages',
                        // System
                        'system_files',
                        'system_mail_layouts',
                        'system_mail_partials',
                        'system_mail_templates',
                    ],
                ],
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Remote Server Groups
    |--------------------------------------------------------------------------
    |
    | Here you may list connections under a single group name, which allows
    | you to easily access all of the servers at once using a short name
    | that is extremely easy to remember, such as "web" or "database".
    |
    */

    'groups' => [
        'web' => ['production'],
    ],

];
