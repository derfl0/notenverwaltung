<?php

require 'bootstrap.php';

/**
 * Notenverwaltung.class.php
 *
 * ...
 *
 * @author  Florian Bieringer <florian.bieringer@uni-passau.de>
 * @version 0.1a
 */
class NotenverwaltungPlugin extends StudIPPlugin implements StandardPlugin {

    public function initialize() {
        PageLayout::addStylesheet($this->getPluginURL() . '/assets/style.css');
        PageLayout::addScript($this->getPluginURL() . '/assets/application.js');
    }

    public function getTabNavigation($course_id) {
        if ($GLOBALS['perm']->have_studip_perm('dozent', $GLOBALS['SessionSeminar'])) {
            $navigation = new AutoNavigation(_('Notenverwaltung'));
            $navigation->setURL(PluginEngine::GetURL($this, array(), 'show'));
            $navigation->setImage(Assets::image_path('icons/16/white/test.png'));
            $navigation->setActiveImage(Assets::image_path('icons/16/black/test.png'));
            return array('notenverwaltung' => $navigation);
        }
    }

    public function getNotificationObjects($course_id, $since, $user_id) {
        return array();
    }

    public function getIconNavigation($course_id, $last_visit, $user_id) {
        // ...
    }

    public function getInfoTemplate($course_id) {
        // ...
    }

    public function perform($unconsumed_path) {
        $this->setupAutoload();
        $dispatcher = new Trails_Dispatcher(
                $this->getPluginPath(), rtrim(PluginEngine::getLink($this, array(), null), '/'), 'show'
        );
        $dispatcher->plugin = $this;
        $dispatcher->dispatch($unconsumed_path);
    }

    private function setupAutoload() {
        if (class_exists("StudipAutoloader")) {
            StudipAutoloader::addAutoloadPath(__DIR__ . '/models');
        } else {
            spl_autoload_register(function ($class) {
                        include_once __DIR__ . $class . '.php';
                    });
        }
    }

}
