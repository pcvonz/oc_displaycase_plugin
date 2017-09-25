<?php namespace Paul\AgencyPages\Models;

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
    public $table = 'paul_agencypages_tag';
    
    public $belongsToMany = [
        'items' => [
            'Paul\AgencyPages\Models\Item', 
            'table' => 'paul_agencypages_tagmap'
        ]
    ];
}
