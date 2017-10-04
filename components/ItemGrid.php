<?php namespace Vonzimmerman\DisplayCase\Components;

use Cms\Classes\ComponentBase;
use Vonzimmerman\DisplayCase\Models\Item as Item;

class ItemGrid extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'ItemGrid Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [
            'category' => [
                'title' => 'Order Items',
                'description' => 'Order items by',
                'type' => 'dropdown',
                'default' => 'Title',
                'placeholder' => 'Select paramter to order by',
            ],
            'direction' => [
                'title' => 'Pick direction',
                'description' => 'Order items by',
                'type' => 'dropdown',
                'default' => 'asc',
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
    public function getCategoryOptions() 
    {
        return [
            'title' =>'Title', 
            'tags' => 'Tags',
            'sort_order' => 'Sort Order'
        ];
    }
    public function getDirectionOptions() 
    {
        return [
            'asc' =>'Ascending', 
            'desc' => 'Descending'
        ];
    }
    public function queryDb($skip)
    {
        return Item::with(['tags', 'screenshot', 'banner', 'thumbnail'])->where('published', 1)
            ->has('tags')
            ->orderBy($this->property('category'), $this->property('direction'))
            ->offset($skip)
            ->limit($this->property('limit'))
            ->get();
    }
    public function onUpdatePartial() 
    {
        $items = $this->queryDb(post('skip'));
        $pageId = $this->param('page_id');
        $this->page['page_id'] = $pageId+1;
        $this->page['items'] = $items;
        return [
            '.itemContainer' => $this->renderPartial('@_items.htm')
        ];
    }
    public function onRun()
    {
        // Router param
        $this->addJs('/plugins/vonzimmerman/displaycase/assets/bower_components/jscroll/jquery.jscroll.js');
        $this->addJs('/plugins/vonzimmerman/displaycase/assets/javscript/ItemGrid.js');
        $this->addCss('/plugins/vonzimmerman/displaycase/assets/css/ItemGrid.css');
        $items = $this->queryDb(0);
        $pageId = $this->param('page_id');
        $this->page['page_id'] = $pageId+1;
        $this->page['initialOffset'] = $this->property('limit');
        $this->page['items'] = $items;
    }
}
