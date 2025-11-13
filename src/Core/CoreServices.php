<?php

namespace atc\BhWP\Core;

use atc\BhWP\Utils\TitleFilter;
use atc\BhWP\Core\FieldGroupLoader;
use atc\BhWP\Core\TemplateRouter;
use atc\BhWP\Core\Shortcodes\ShortcodeManager;
use atc\BhWP\Core\Assets\AssetManager;

class CoreServices
{
    /**
     * Boot all core utility services that need initialization.
     */
    public static function boot(): void
    {
        //error_log( '=== CoreServices::boot() ===' );
        $services = apply_filters( 'bhwp_core_services', [
            TitleFilter::class,
            //FieldGroupLoader::class,
            TemplateRouter::class,
            ShortcodeManager::class,
            AssetManager::class,
        ]);

        foreach ( $services as $class ) {
            //error_log( 'About to attempt to load and boot class: ' . $class );
            if ( is_string( $class ) && method_exists( $class, 'boot' ) ) {
                $class::boot();
            } else {
                //if ( !is_string( $class ) ) { error_log( 'class: ' . $class . ' -- NOT a string!'); }
                //if ( !method_exists( $class, 'boot' ) ) { error_log( 'class: ' . $class . ' boot method not found!'); }
                //if ( !class_exists( $class) ) { error_log( 'class: ' . $class . ' -- DOES NOT EXIST!'); }
            }
        }
    }
}
