<?php namespace BnB\UserGroup\Components;

use BnB\UserGroup\Models\UserGroup;
use RainLab\User\Components\Session;
use RainLab\User\Models\User;

class SessionGroup extends Session
{

    public function componentDetails()
    {
        return [
            'name'        => trans('bnb.usergroup::lang.components.sessiongroup.name'),
            'description' => trans('bnb.usergroup::lang.components.sessiongroup.description')
        ];
    }


    public function defineProperties()
    {
        $properties = parent::defineProperties();

        $properties = array_merge($properties, [
            'group' => [
                'title'       => 'bnb.usergroup::lang.components.sessiongroup.group_title',
                'description' => 'bnb.usergroup::lang.components.sessiongroup.group_description',
                'type'        => 'dropdown',
                'default'     => '',
            ]
        ]);

        unset( $properties['security'] );

        return $properties;
    }


    public function getGroupOptions()
    {
        return UserGroup::orderBy('name', 'ASC')->get()->lists('name', 'id');
    }


    /**
     * Executed when this component is bound to a page or layout.
     */
    public function onRun()
    {
        $this->setProperty('security', self::ALLOW_USER);

        if ($redirect = parent::onRun()) {
            return $redirect;
        }

        /** @var $user User */
        $user = $this->page['user'];

        $redirectUrl  = $this->controller->pageUrl($this->property('redirect'));
        $allowedGroup = $this->property('group', null);

        $group = UserGroup::where('id', $allowedGroup);

        if ( ! $group || ! $user->inGroup($group)) {
            return Redirect::guest($redirectUrl);
        }

        $this->page['group'] = $group;
    }

}