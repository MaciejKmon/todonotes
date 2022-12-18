<?php declare(strict_types = 1);

/**
 * ! DO NOT MOVE OR RENAME THIS FILE
 *
 * PACKAGE CONFIG - Laravel/Lumen
 *
 * Laravel/Lumen default queue configuration values.
 */

return

[
    /**
     * Default Queue Connection Name
     *
     * Lumen's queue API supports an assortment of back-ends via a single
     * API, giving you convenient access to each back-end using the same
     * syntax for every one. Here you may define a default connection.
     */
    'default' => env('QUEUE_CONNECTION', 'redis'),

    /**
     * Queue Connections
     *
     * Here you may configure the connection information for each server that
     * is used by your application. A default configuration has been added
     * for each back-end shipped with Lumen. You are free to add more.
     */
    'connections' => [
        // Accepted Driver Values: [sync, database, beanstalkd, sqs, redis, null]
        'sync' => ['driver' => 'sync'],

        'database' => [
            'driver' => 'database',
            'table' => env('QUEUE_TABLE', '_infra_queues_jobs'),
            'queue' => config('app.name') . ':default',
            'retry_after' => 90,
        ],

        'beanstalkd' => [
            'driver' => 'beanstalkd',
            'host' => 'localhost',
            'queue' => config('app.name') . ':default',
            'retry_after' => 90,
        ],

        'sqs' => [
            'driver' => 'sqs',
            'key' => env('SQS_KEY', 'your-public-key'),
            'secret' => env('SQS_SECRET', 'your-secret-key'),
            'prefix' => env('SQS_PREFIX', 'https://sqs.us-east-1.amazonaws.com/your-account-id'),
            'queue' => env('SQS_QUEUE', 'your-queue-name'),
            'region' => env('SQS_REGION', 'us-east-1'),
        ],

        'redis' => [
            'driver' => 'redis',
            'connection' => env('QUEUE_REDIS_CONNECTION', 'default'),
            'queue' => config('app.name') . ':default',
            'retry_after' => 90,
            'block_for' => 5,
        ],
    ],

    /**
     * Failed Queue Jobs
     *
     * These options configure the behavior of failed queue job logging so you
     * can control which database and table are used to store the jobs that
     * have failed. You may change them to any database / table you wish.
     */
    'failed' => [
        'database' => env('DB_CONNECTION', 'pgsql'),
        'table' => env('QUEUE_FAILED_TABLE', '_infra_queues_failed_jobs'),
    ],
];