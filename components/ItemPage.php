<?php namespace Vonzimmerman\DisplayCase\Components;

use Cms\Classes\ComponentBase;
use Vonzimmerman\DisplayCase\Models\Item as Item;
use Vonzimmerman\DisplayCase\Models\Section as section;

class ItemPage extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'ItemPage Component',
            'description' => 'Injects specific item pages assets into a page (based on url pattern)'
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
    public function onRun()
    {
        $this->addJs('/plugins/vonzimmerman/displaycase/assets/javscript/itemPage.js');
        $this->page['landing_page'] = $this->param('landing_page');
        $this->page['tag'] = $this->param('tag');
        $this->page['sort_criteria'] = $this->param('sort_criteria');
    }
    public function queryDb($pageName)
    {
        return Item::with(['tags', 'screenshot', 'banner', 'thumbnail', 'section'])
            ->where('published', 1)
            ->orderBy('sort_order', 'asc')
            ->where('slug', $pageName)
            ->first();
    }
    public function getPrevAndNextItems()
    {
        $items = Item::with(['tags', 'screenshot', 'banner', 'thumbnail', 'section'])
            ->where('published', 1)
            ->wherehas('tags', function ($q) {
                $q->where('name', $this->param('tag'));
            })
            ->orderBy($this->param('sort_criteria'), 'asc')
            ->get();
        $project_index = 0;
        $prevAndNext = [];
        foreach($items as $index => $item) {
            if($item->slug == $this->property('project')) {
                $project_index = $index;
                if($project_index > 0) {
                    $prevAndNext['prev'] = $items[$project_index-1];
                } else {
                    $prevAndNext['prev'] = false;
                }
                if($project_index+1 < count($items)) {
                    $prevAndNext['next'] = $items[$project_index+1];
                } else {
                    $prevAndNext['next'] = false;
                }
                return $prevAndNext;
            }
        }
    }
    public function item ()
    {
        return $this->queryDb($this->property('project'));
    }
    public function section()
     {
         $item = Item::with(['section'])
             ->where('slug', $this->property('project'))
             ->where('published', 1)
             ->first();
        $section = $item->section()->orderBy('sort_order', 'asc')->get();
        return $section;
    }
}
