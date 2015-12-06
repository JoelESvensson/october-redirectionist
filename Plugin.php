<?php

namespace EngagementAgency\Redirectionist;

use Backend;
use Cache;
use EngagementAgency\Redirectionist\Models\Redirection;
use Route;
use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function pluginDetails()
    {
        return [
            'name' => 'Redirectionist',
            'description' => '',
            'author' => 'EngagementAgency',
            'icon' => 'icon-angle-double-right',
        ];
    }

    public function boot()
    {
        $redirections = Cache::remember('engagement_redirectionist_redirections', 60, function () {
            return Redirection::all();
        });
        foreach ($redirections as $redirection) {
            Route::get($redirection->from_route, function () use ($redirection) {
                return redirect($redirection->to_route);
            });
        }
    }

    public function registerComponents()
    {
        return [
        ];
    }

    public function registerNavigation()
    {
        return [
            'redirectionist' => [
                'label' => 'Vidarebefordringar',
                'url' => Backend::url('engagementagency/redirectionist/redirections'),
                'icon' => 'icon-angle-double-right',
                'permissions' => ['engagementagency.redirectionist.*'],
                'order' => 500,
            ],
        ];
    }

    public function registerSettings()
    {
        return [
        ];
    }

    public function registerFormWidgets()
    {

    }

    public function registerPermissions()
    {
        return [
            'engagementagency.redirections.access_redirects' => [
                'label' => 'Får hantera Vidarebefordringar',
                'tab' => 'Redirectionist',
            ],
        ];
    }

    public function registerSchedule($schedule)
    {
    }

    public function registerMarkupTags()
    {
        return [
            'functions' => [
            ],
            'filters' => [
            ],
        ];
    }
}
