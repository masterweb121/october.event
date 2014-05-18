<?php namespace Bzdbbb\Event;

use Backend;
use Controller;
use System\Classes\PluginBase;

/**
 * event Plugin Information File
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
            'name'        => 'event',
            'description' => 'No description provided yet...',
            'author'      => 'bzdbbb',
            'icon'        => 'icon-leaf'
        ];
    }

    public function registerNavigation()
    {
        return [
            'event' => [
                'label'       => 'Events',
                'url'         => Backend::url('bzdbbb/event/events'),
                'icon'        => 'icon-calendar',
                'permissions' => ['blog.*'],
                'order'       => 500,

                'sideMenu' => [
                    'events' => [
                        'label'       => 'Events',
                        'icon'        => 'icon-calendar',
                        'url'         => Backend::url('bzdbbb/event/events'),
                        'permissions' => ['blog.access_posts'],
                    ],
                    'category' => [
                        'label'       => 'Categories',
                        'icon'        => 'icon-bars',
                        'url'         => Backend::url('bzdbbb/event/categories'),
                        'permissions' => ['blog.access_posts'],
                    ]                 
                ]

            ]
        ];
    }

    public function registerFormWidgets()
    {
        return [
            'Bzdbbb\Event\FormWidgets\DatePicker' => [
                'label' => 'DatePicker',
                'alias' => 'datePicker'
            ]
        ];
    }


    public function registerComponents()
    {
        return [
            '\Bzdbbb\Event\Components\EventList' => 'eventList'
        ];
    }    

}