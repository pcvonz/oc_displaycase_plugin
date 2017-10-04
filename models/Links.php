<?php namespace Vonzimmerman\DisplayCase\Models;

use Model;

/**
 * Model
 */
class Links extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\Sortable;
    
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
    public $table = 'vonzimmerman_displaycase_link';

    public $attachOne= [
        'icon' => 'System\Models\File',
    ];

    public $belongsTo = [
        'profile' => 'Vonzimmerman\DisplayCase\Models\Profile'
    ];
}
