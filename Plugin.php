<?php namespace BnB\UserGroup;

use Backend\Facades\Backend;
use Illuminate\Support\Facades\Event;
use RainLab\User\Models\User;
use System\Classes\PluginBase;

/**
 * UserGroup Plugin Information File
 */
class Plugin extends PluginBase
{

    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'bnb.usergroup::lang.plugin.name',
            'description' => 'bnb.usergroup::lang.plugin.description',
            'author'      => 'B&B Web Expertise',
            'icon'        => 'icon-leaf'
        ];
    }


    public function registerPermissions()
    {
        return [
            'rainlab.groups.access_groups' => [
                'tab'   => 'rainlab.user::lang.plugin.tab',
                'label' => 'bnb.usergroup::lang.plugin.access_groups'
            ]
        ];
    }


    public function boot()
    {

        User::extend(function ($model) {
            $model->belongsToMany['groups'] = ['BnB\UserGroup\Models\UserGroup', 'table' => 'users_groups'];
        });

        Event::listen('backend.menu.extendItems', function ($manager) {

            $manager->addSideMenuItems('RainLab.User', 'user', [
                'groups' => [
                    'label'       => 'bnb.usergroup::lang.groups.all_groups',
                    'icon'        => 'icon-users',
                    'url'         => Backend::url('bnb/usergroup/usergroups'),
                    'permissions' => ['rainlab.groups.access_groups']
                ]
            ]);

        });

        Event::listen('backend.form.extendFields', function ($widget) {

            //Extend groups controller
            if ( ! $widget->getController() instanceof \RainLab\User\Controllers\Users) {
                return;
            }
            if ( ! $widget->model instanceof \RainLab\User\Models\User) {
                return;
            }

            $widget->addTabFields([
                'groups' => [
                    'label'   => trans('bnb.usergroup::lang.user.groups'),
                    'comment' => trans('bnb.usergroup::lang.user.groups_comment'),
                    'type'    => 'relation',
                    'tab'     => 'bnb.usergroup::lang.user.groups',
                    'span'    => 'auto'
                ]
            ]);
        });
    }

}
