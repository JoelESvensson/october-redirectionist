<?php namespace EngagementAgency\Redirectionist\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

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
}
