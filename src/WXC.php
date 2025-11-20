<?php

namespace WXC\Core;

use LogicException;
use WXC\Core\Contracts\PluginContext;

final class WXC
{
    private static ?PluginContext $ctx = null;

    public static function setContext(PluginContext $ctx): void
    {
        self::$ctx = $ctx;
    }

    public static function ctx(): PluginContext
    {
        if (self::$ctx === null) {
            throw new LogicException('PluginContext not set. Call WXC::setContext() during plugin boot.');
        }
        return self::$ctx;
    }

    private function __construct() {}
}
