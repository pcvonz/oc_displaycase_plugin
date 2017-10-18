<?php namespace Vonzimmerman\DisplayCase\Components;

use Cms\Classes\ComponentBase;
use Vonzimmerman\DisplayCase\Models\Item as Item;

class LandingPage extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'LandingPage Component',
            'description' => 'This component injects portfolio items into your page'
        ];
    }

    public function defineProperties()
    {
        return [
            'category' => [
                'title' => 'Order Items',
                'description' => 'Order items by',
                'type' => 'String',
                'default' => 'insert tag',
                'placeholder' => 'Select paramter to order by',
            ],
            'limit' => [
                'title' => 'Limit',
                'description' => 'Pick how many items to load',
                'type' => 'string',
                'default' => '5',
                'placeholder' => 'Select how many items to display',
                'validationPattern' => '^[0-9]+$',
                'validationMessage' => 'The Limit Items property can contain only numeric symbols'
            ],
        ];
    }

    // Grabs profile information based on tags from the url
    public function queryDb()
    {
        return Item::with(['tags', 'screenshot', 'banner', 'thumbnail'])->where('published', 1)
            ->wherehas('tags', function ($q) {
                $q->where('name', $this->param('profile'));
            })
            ->orderBy('sort_order', 'asc')
            ->get();
    }
    public function onRun()
    {
        $items = $this->queryDb();
        $this->page['items'] = $items;
    }
}
