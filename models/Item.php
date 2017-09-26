<?php namespace Vonzimmerman\DisplayCase\Models;

use Model;

/**
 * Model
 */
class Item extends Model
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
    public $table = 'vonzimmerman_displaycase_data';

    public $attachMany = [
        'screenshot' => 'System\Models\File'
    ];

    public $attachOne= [
        'banner' => 'System\Models\File',
        'thumbnail' => 'System\Models\File'
    ];
    public $belongsToMany = [
        'tags' => [
            'Vonzimmerman\DisplayCase\Models\Tags', 
            'table'    => 'vonzimmerman_displaycase_tagmap'
        ]
    ];
}
