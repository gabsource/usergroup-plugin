<?php namespace BnB\UserGroup\Controllers;

use Backend\Classes\Controller;
use BackendAuth;
use BackendMenu;
use BnB\UserGroup\Models\UserGroup;
use Flash;
use Lang;
use System\Classes\SettingsManager;

class UserGroups extends Controller
{

    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController'
    ];

    public $formConfig = 'config_form.yaml';

    public $listConfig = 'config_list.yaml';

    public $requiredPermissions = ['rainlab.groups.access_groups'];

    public $bodyClass = 'layout-container';


    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('RainLab.User', 'user', 'groups');
        SettingsManager::setContext('RainLab.User', 'settings');
    }


    /**
     * Deleted checked users.
     */
    public function index_onDelete()
    {
        if (( $checkedIds = post('checked') ) && is_array($checkedIds) && count($checkedIds)) {

            foreach ($checkedIds as $groupId) {
                if ( ! $user = UserGroup::find($groupId)) {
                    continue;
                }
                $user->delete();
            }

            Flash::success(Lang::get('bnb.usergroup::lang.groups.delete_selected_success'));
        } else {
            Flash::error(Lang::get('bnb.usergroup::lang.groups.delete_selected_empty'));
        }

        return $this->listRefresh();
    }
}
