<?php

return [
    'plugin' => [
        'name' => 'Groupes Utilisateurs',
        'description' => 'Gestion des Groupes d\'utilisateurs Front-End.',
        'tab' => 'Groupe',
        'access_groups' => 'Gérer les Groupes d\'utilisateurs',
    ],
    'groups' => [
        'all_groups' => 'Tous les Groupes',
        'new_group' => 'Nouveau Groupe',
        'list_title' => 'Gestion des Groupes',
        'menu_label' => 'Groupes',
        'delete_selected_confirm' => 'Confirmez-vous la suppression des Groupes sélectionnés ?',
        'delete_confirm' => 'Confirmez-vous la suppression de ce Groupe ?',
        'delete_selected_success' => 'Les Groupes sélectionnés ont été supprimés avec succès',
        'delete_selected_empty' => 'Aucun Groupe sélectionné',
        'return_to_list' => 'Retour à la liste des groupes',
    ],
    'group' => [
        'id' => 'ID',
        'name' => 'Nom',
        'code' => 'Code',
        'code_comment' => 'Code interne utilisé pour référencer ce Groupe dans le code source',
        'created_at' => 'Créer le',
        'label' => 'Groupe',
    ],
    'user' => [
        'groups' => 'Groupes',
        'groups_comment' => 'Cochez les Groupes auxquels appartient cet utilisateur',
    ],
    'components' => [
        'sessiongroup' => [
            'name' => 'Session Groupe',
            'description' => 'Ajoute la session utilisateur à une page et permet de restreindre l’accès à une page à un groupe d‘utilisateurs (utilisateurs connectés uniquement).',
            'group_title' => 'Groupe autorisé',
            'group_description' => 'Choisissez le groupe autorisé à accéder à cette page',
        ],
    ],
];