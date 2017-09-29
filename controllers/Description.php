<?php namespace Vonzimmerman\DisplayCase\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class Description extends Controller
{
    public $implement = [
        'Backend\Behaviors\ListController',
        'Backend\Behaviors\FormController'
    ];
    
   // public $reorderConfig = 'config_reorder.yaml';
   // public $listConfig = 'config_list.yaml';
   // public $formConfig = 'config_form.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Vonzimmerman.DisplayCase', 'main-menu-item', 'Sections');
    }
}
