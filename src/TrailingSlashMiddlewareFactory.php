<?php
declare(strict_types=1);

namespace Ctw\Middleware\TrailingSlashMiddleware;

use Psr\Container\ContainerInterface;

class TrailingSlashMiddlewareFactory
{
    public function __invoke(ContainerInterface $container): TrailingSlashMiddleware
    {
        $config = [];
        if ($container->has('config')) {
            $config = $container->get('config');
            assert(is_array($config));
            $config = $config[TrailingSlashMiddleware::class];
        }

        $middleware = new TrailingSlashMiddleware();

        if ((is_countable($config) ? count($config) : 0) > 0) {
            $middleware->setConfig($config);
        }

        return $middleware;
    }
}
