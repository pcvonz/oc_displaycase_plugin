<?php namespace Vonzimmerman\Displaycase\FormWidgets;

use Backend\Classes\FormWidgetBase;
use Backend\FormWidgets\RichEditor;

/**
 * RichTextToc Form Widget
 */
class RichTextToc extends RichEditor
{
    /**
     * @inheritDoc
     */
    protected $defaultAlias = 'vonzimmerman_displaycase_rich_text_toc';

    /**
     * @inheritDoc
     */
    public function init()
    {
        $this->viewPath = base_path().'/modules/backend/formwidgets/richeditor/partials';

        parent::init();
    }


    /**
     * @inheritDoc
     */
    public function render()
    {
        parent::prepareVars();
        return $this->makePartial('richeditor');
    }

    /**
     * Prepares the form widget view data
     */
    public function prepareVars()
    {
        $this->vars['name'] = $this->formField->getName();
        $this->vars['value'] = $this->getLoadValue();
        $this->vars['model'] = $this->model;
    }

    /**
     * @inheritDoc
     */
    public function loadAssets()
    {

        $this->assetPath = '/modules/backend/formwidgets/richeditor/assets';
        parent::loadAssets();
    }

    /**
     * @inheritDoc
     */
    public function getSaveValue($value)
    {
        echo $value;
        return $value;
    }
}
