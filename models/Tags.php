<?php namespace Vonzimmerman\DisplayCase\Models;

use Model;

/**
 * Model
 */
class Tags extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    /*
     * Disable timestamps by default.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = false;

    /*
     * Validation
     */
    public $rules = [
    ];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'vonzimmerman_displaycase_tag';
    
    public $belongsToMany = [
        'items' => [
            'Vonzimmerman\DisplayCase\Models\Item', 
            'table' => 'vonzimmerman_displaycase_tagmap'
        ]
    ];

}
