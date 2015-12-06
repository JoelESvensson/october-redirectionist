<?php namespace EngagementAgency\Redirectionist\Controllers;

use BackendMenu;
use Backend\Classes\Controller;
use Cache;

class Redirections extends Controller
{
    public $requiredPermissions = ['engagementagency.redirections.access_redirects'];

    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController',
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('EngagementAgency.Redirectionist', 'redirectionist', 'redirections');
    }

    public function formAfterSave($model)
    {
        parent::formAfterSave($model);
        Cache::forget('engagement_redirectionist_redirections');
    }
}
