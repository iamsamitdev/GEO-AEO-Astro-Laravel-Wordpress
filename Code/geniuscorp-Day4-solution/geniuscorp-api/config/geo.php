<?php

return [
    'rebuild_enabled' => (bool) env('REBUILD_ENABLED', false),
    'rebuild_driver'  => env('REBUILD_DRIVER', 'webhook'),   // webhook | github
    'webhook_url'     => env('REBUILD_WEBHOOK_URL'),
    'webhook_secret'  => env('REBUILD_WEBHOOK_SECRET'),
    'github_repo'     => env('REBUILD_GITHUB_REPO'),          // owner/repo
    'github_token'    => env('REBUILD_GITHUB_TOKEN'),         // fine-grained PAT: contents:write
];
