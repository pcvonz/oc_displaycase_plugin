<?php namespace Vonzimmerman\DisplayCase\Components;

use Cms\Classes\ComponentBase;
use Vonzimmerman\DisplayCase\Models\Item as Item;
use Vonzimmerman\DisplayCase\Models\Tags as Tag;

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
            'tag' => [
                'title' => 'Display projects based on tag',
                'description' => 'Profile description',
                'default' => 'select tag',
                'type' => 'dropdown',
                'placeholder' => 'Select profile to display',
                'options' => $this->getTags()
            ]
        ];
    }
    public function getTags() {
        $tagKeys = [];
        $tags = Tag::get();
        foreach ($tags as $t) {
            $tagKeys[$t['name']] = $t['name'];
        }
        return $tagKeys;
    }
    // Grabs profile information based on tags from the url
    public function queryDb()
    {
        return Item::with(['tags', 'screenshot', 'banner', 'thumbnail'])->where('published', 1)
            ->wherehas('tags', function ($q) {
                $q->where('name', $this->property('tag'));
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
