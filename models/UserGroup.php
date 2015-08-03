<?php namespace BnB\UserGroup\Models;

use Mail;
use October\Rain\Database\Model;
use URL;

class UserGroup extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /**
     * @var string The database table used by the model.
     */
    protected $table = 'user_groups';

    /**
     * Validation rules
     */
    public $rules = [
        'name' => 'required|between:3,64',
        'code' => 'required|between:3,64|regex:/^[a-zA-Z0-9_\-]+$/|unique:user_groups',
    ];

    /**
     * @var array Relations
     */
    public $belongsToMany = [
        'users'       => ['RainLab\User\Models\User', 'table' => 'users_groups'],
        'users_count' => ['RainLab\User\Models\User', 'table' => 'users_groups', 'count' => true]
    ];

    /**
     * @var array The attributes that are mass assignable.
     */
    protected $fillable = [
        'name'
    ];

}
