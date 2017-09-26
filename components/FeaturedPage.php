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
        $this->page['id'] = 0;
    }

    public function onRequestNext(){
        $nextId = post('id');
        $items = $this->requestItems($nextId, $this->property('displayCount'));
        $this->page['id']    = end($items)[0]['id'];
        $this->page['items'] = $items;
        
    }

    private function requestItems($id, $count){

        $items = Item::with(['tags', 'screenshot', 'banner', 'thumbnail'])->where('id', '>', $id)->whereHas('tags', 
            $this->matchTag)->limit($count)->get();

        return $items;

    }

    private function matchTag($query){
        $query->where('name', '=', $this->property('featuredTag'));
    }

}



