<?php

namespace atc\BhWP\Admin;

use atc\BhWP\Core\BhWP;
use atc\BhWP\Core\ViewLoader;

class SettingsPageController
{
    public function addHooks(): void
    {
        //error_log( '=== SettingsPageController::addHooks() ===' );
        // Register the settings page using the new registry system
        add_action('bhwp_admin_pages_init', [$this, 'registerSettingsPage']);
        
        // Register settings on admin_init (unchanged)
        add_action('admin_init', [$this, 'registerSettings']);
    }

    /*public function addSettingsPage(): void
    {
        //error_log( '=== SettingsPageController::addSettingsPage() ===' );
        add_options_page(
            'BhWP v2 Plugin Settings', // page_title
            'BhWP v2 Settings', // menu_title
            'manage_options', // capability
            'whx4-settings', // menu_slug
            [ $this, 'renderSettingsPage' ] // callback
        );
    }*/
    
    /**
     * Register the BhWP settings page with the AdminPageRegistry
     */
    public function registerSettingsPage(AdminPageRegistry $registry): void
    {
        $registry->registerPage('whx4-settings', [
            'type' => 'options',
            'page_title' => 'BhWP v2 Plugin Settings',
            'menu_title' => 'BhWP v2 Settings',
            'capability' => 'manage_options',
            'menu_slug' => 'whx4-settings',
            'controller' => [$this, 'renderSettingsPage'],
        ]);
    }

    public function registerSettings(): void
    {
        //error_log( '=== SettingsPageController::registerSettings() ===' );
        register_setting('bhwp_plugin_settings_group', 'bhwp_plugin_settings');

        add_settings_section(
            'bhwp_main_settings',
            'Module and Post Type Settings',
            null,
            'bhwp_plugin_settings'
        );
    }

    public function renderSettingsPage(): void
    {
        //error_log( '=== SettingsPageController::renderSettingsPage() ===' );
        ViewLoader::render('settings-page', [
            'availableModules' => BhWP::ctx()->getAvailableModules(),
            'activeModules'    => BhWP::ctx()->getSettingsManager()->getActiveModuleSlugs(),
            'enabledPostTypes' => BhWP::ctx()->getSettingsManager()->getEnabledPostTypeSlugsByModule(),
        ]);
    }

    // WIP 08/19/25
    /*public function sanitizeOptions(array $input): array
    {
        $saved    = $this->getOption();
        $allowed  = array_keys($this->plugin->getAvailableModules());

        $active = array_values(array_intersect(
            $input['active_modules'] ?? [],
            $allowed
        ));

        $saved['active_modules'] = $active;

        // Keep whatever else you store (enabled_post_types, etc.)
        // Merge other fields with appropriate sanitization...

        return $saved;
    }*/
}
