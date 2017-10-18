<?php namespace Vonzimmerman\DisplayCase;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{

    public function pluginDetails()
    {
        return [
            'name'        => 'vonzimmerman.displaycase::lang.plugin.name',
            'description' => 'vonzimmerman.displaycase::lang.plugin.description',
            'author'      => 'Robert Vonzimmerman, Paul Vonzimmerman',
            'icon'        => 'icon-pencil',
            'homepage'    => 'https://github.com/pcvonz/oc_displaycase_plugin',
            'description' => 'Manage everything you\'d want for a portfolio website.'

        ];
    }
    public function registerComponents()
    {
        return [
            'Vonzimmerman\DisplayCase\Components\ItemPage'     => 'itemPage',
            'Vonzimmerman\DisplayCase\Components\Profile'     => 'Profile',
            'Vonzimmerman\DisplayCase\Components\LandingPage'     => 'landingPage',
            'Vonzimmerman\DisplayCase\Components\SocialNav'     => 'socialNav'
        ];
    }

    public function registerSettings()
    {
    }
}
