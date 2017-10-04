<?php namespace Vonzimmerman\DisplayCase\Models;

use Model;

/**
 * Model
 */
class Profile extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    /*
     * Disable timestamps by default.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = false;

    public $attachOne= [
        'profile_image' => 'System\Models\File'
    ];
    /*
     * Validation
     */
    public $rules = [
    ];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'vonzimmerman_displaycase_profile';

    public $hasMany = [
        'links' => 'Vonzimmerman\DisplayCase\Models\Links'
    ];
}
