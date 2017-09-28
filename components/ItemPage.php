<?php namespace Vonzimmerman\DisplayCase\Components;

use Cms\Classes\ComponentBase;
use Vonzimmerman\DisplayCase\Models\Item as Item;

class ItemPage extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'ItemPage Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [
            'project' => [
                'title' => 'Project Slug',
                'description' => 'Retrieve project by slug',
                'type' => 'string',
                'default' => '{{ :project_name }}',
                'placeholder' => 'select project',
            ]
        
        ];
    }
    public function queryDb($pageName)
    {
        return Item::with(['tags', 'screenshot', 'banner', 'thumbnail'])
            ->where('published', 1)
            ->where('slug', $pageName)
            ->first();
    }
    public function item ()
    {
        return $this->queryDb($this->property('project'));
    }
}
