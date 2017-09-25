<?php namespace Vonzimmerman\DisplayCase\Components;

use Cms\Classes\ComponentBase;
use Vonzimmerman\DisplayCase\Models\Tags as Tags;

class FeaturedPage extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'FeaturedPage Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [
            'featuredTag' => [
                'description'       => 'Tag to use for featured items.',
                'title'             => 'Featured Tag',
                'default'           => 'featured',
                'type'              => 'string',
            ]
        ];
    }

    public function onRun(){
        $tags = Tags::orderBy('name');
        $this->page['tags'] = $tags;
    }

    public function onLoadFeatured(){

    }
}



