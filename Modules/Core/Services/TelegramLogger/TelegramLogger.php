<?php
namespace Modules\Core\Services\TelegramLogger;

use Modules\Core\Services\TelegramLogger\TelegramHandler;
use Monolog\Logger;

/**
 * Class TelegramLogger
 * @package App\Logging
 */
class TelegramLogger
{
    /**
     * Create a custom Monolog instance.
     *
     * @param  array  $config
     * @return \Monolog\Logger
     */
    public function __invoke(array $config)
    {
        return new Logger(
            config('app.name'),
            [
                new TelegramHandler($config['level'])
            ]
        );
    }
}