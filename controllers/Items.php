<?php namespace Vonzimmerman\DisplayCase\Controllers;

use Backend\Classes\Controller;
use BackendMenu;
use Vonzimmerman\DisplayCase\Models\Description as Description;
use Flash;
use Event;
class Items extends Controller
{
    public $implement = [
        'Backend\Behaviors\ListController',
        'Backend\Behaviors\FormController',
        'Backend\Behaviors\RelationController',
   ];
    
    public $formConfig = 'config_item_form.yaml';
    public $listConfig = ['items' => 'config_items_list.yaml'];
    public $relationConfig = 'config_relation.yaml';

    public function __construct()
    {
        $this->addJs("https://cdn.rawgit.com/RubaXa/Sortable/1.6.0/Sortable.min.js");
        $this->addJs("/plugins/vonzimmerman/displaycase/assets/javscript/sortable.js");
        parent::__construct();
        BackendMenu::setContext('Vonzimmerman.DisplayCase', 'main-menu-item', 'side-menu-item2');
        // TODO: Sort the fields when the request is done
        Event::listen('backend.list.extendQuery', function($widget, $field)
        {
        });
    }
    public function onReorder() 
    {
        $data = post();
        $records = $data['vals'];
        $position = 0;
        $moved = [];
        foreach ($records as $id) {
            if(in_array($id, $moved) || !$desc = Description::find($id))
                continue;
            $desc->sort_order = $position;
            $desc->save();
            $moved[]=$id;
            $position++;
        }
        Flash::success('The list has been reordered');
    }
}
