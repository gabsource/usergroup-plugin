<?php

return [
    'groups' => [
        'menu_label' => 'Groups',
        'new_group' => 'New Group',
        'delete_selected_confirm' => 'Do you really want to delete selected groups?',
        'list_title' => 'Manage Groups',
        'return_to_list' => 'Back to groups list',
        'delete_confirm' => 'Do you really want to delete this group?',
        'delete_selected_success' => 'Successfully deleted the selected groups.',
        'delete_selected_empty' => 'There are no selected groups to delete.',
        'all_groups' => 'All groups',
    ],
    'group' => [
        'label' => 'Group',
    ],
    'components' => [
        'sessiongroup' => [
            'name' => 'Session Group',
            'description' => 'Adds the user session to a page and can restrict page access to a specific user group (connected user only).',
            'group_title' => 'Allowed Group',
            'group_description' => 'Choose the group that has access this page.',
        ],
    ],
    'plugin' => [
        'name' => 'Users Groups',
        'description' => 'Manage front-end users groups',
        'access_groups' => 'Manage users groups',
    ],
    'user' => [
        'groups' => 'Groups',
        'groups_comment' => 'Select the groups the user belongs to.',
    ],
];