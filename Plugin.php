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
            'homepage'    => ''
        ];
    }
    public function registerComponents()
    {
        return [
            'Vonzimmerman\DisplayCase\Components\FeaturedPage' => 'featuredPage',
            'Vonzimmerman\DisplayCase\Components\ItemGrid'     => 'itemGrid',
            'Vonzimmerman\DisplayCase\Components\ItemPage'     => 'itemPage',
            'Vonzimmerman\DisplayCase\Components\Profile'     => 'Profile'
        ];
    }

    public function registerFormWidgets()
    {
        return [
            'Vonzimmerman\DisplayCase\FormWidgets\RichTextToc' => 'richtexttoc'
        ];
    }
    public function registerSettings()
    {
    }
}
