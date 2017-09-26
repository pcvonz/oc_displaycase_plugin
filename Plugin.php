<?php namespace Vonzimmerman\DisplayCase;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
        return [
            'Vonzimmerman\DisplayCase\Components\ItemGrid' => 'itemGrid'
        ];
    }

    public function registerSettings()
    {
    }
}
