<?php namespace Vonzimmerman\DisplayCase\Components;

use Cms\Classes\ComponentBase;
use Vonzimmerman\DisplayCase\Models\Item as Item;

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
            ],

            'displayCount' => [
                'description'       => 'Number of visible Featured Items',
                'title'             => 'Visible Items',
                'default'           => 1,
                'type'              => 'string',
                'validationPattern' => '^[0-9]+$',
            ]
        ];
    }

    public function onRun(){
        $this->requestItems();

        $this->addCss('/plugins/vonzimmerman/displaycase/assets/style.css');

        $this->addJs('/plugins/vonzimmerman/displaycase/assets/slick/slick.js');
        $this->addCss('/plugins/vonzimmerman/displaycase/assets/slick/slick.css');
        $this->addCss('/plugins/vonzimmerman/displaycase/assets/slick/slick-theme.css');

        $this->addJs('/plugins/vonzimmerman/displaycase/assets/featuredpage.js');
    }

    private function requestItems(){

        $items = Item::with(['tags', 'screenshot', 'banner', 'thumbnail'])->whereHas('tags', 
            $this->matchTag)->get();

        $this->page['items'] = $items;

    }

    private function matchTag($query){
        $query->where('name', '=', $this->property('featuredTag'));
    }

}



