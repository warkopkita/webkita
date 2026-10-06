<?php

namespace App\Logging;

use Monolog\Handler\NullHandler;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Psr\Log\LoggerInterface;

class SentryLoggerFactory
{
    /**
     * Create a custom Monolog instance for Sentry integration.
     */
    public function __invoke(array $config): LoggerInterface
    {
        $dsn = env('SENTRY_LARAVEL_DSN');
        $logger = new Logger('sentry');

        if (!empty($dsn)) {
            // In production with Sentry package or webhook
            $logger->pushHandler(new StreamHandler(storage_path('logs/sentry.log'), Logger::ERROR));
        } else {
            // Silent fallback when DSN is not set in development
            $logger->pushHandler(new NullHandler());
        }

        return $logger;
    }
}
