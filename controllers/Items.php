<?php namespace Vonzimmerman\DisplayCase\Controllers;

use Backend\Classes\Controller;
use BackendMenu;
use Vonzimmerman\DisplayCase\Models\Description as Description;

class Items extends Controller
{
    public $implement = [
        'Backend\Behaviors\ListController',
        'Backend\Behaviors\FormController',
        'Backend\Behaviors\RelationController',
        'Backend\Behaviors\ReorderController'
   ];
    
    public $reorderConfig = 'config_reorder.yaml';
    public $formConfig = 'config_item_form.yaml';
    public $listConfig = ['items' => 'config_items_list.yaml', 'sections' => 'config_sections_list.yaml'];
    public $relationConfig = 'config_relation.yaml';

    public function __construct()
    {
        $this->addJs("https://cdn.rawgit.com/RubaXa/Sortable/1.6.0/Sortable.min.js");
        $this->addJs("/plugins/vonzimmerman/displaycase/assets/javscript/sortable.js");
        parent::__construct();
        BackendMenu::setContext('Vonzimmerman.DisplayCase', 'main-menu-item', 'side-menu-item2');
    }
    public function onReorder() 
    {
        $data = post();
        $records = [$data['valuea'], $data['valueb']];
        $model = new Description;
        $model->setSortableOrder($records[0], $records[1]);
    }
}
