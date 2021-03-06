<?php
class ShowController extends StudipController {

    public function before_filter(&$action, &$args) {

		$this->set_layout($GLOBALS['template_factory']->open('layouts/base_without_infobox'));
//		PageLayout::setTitle('');

    }

    public function index_action() {
        
        if (Request::submitted('save')) {
            Notenverwaltung::deleteBySQL('Seminar_id = ?', array($GLOBALS['SessionSeminar']));
            foreach(Request::getArray('user') as $user) {
                $new = new Notenverwaltung(array($user, $GLOBALS['SessionSeminar']));
                $new->store();
            }
        }
        
        $this->sem = new Course($GLOBALS['SessionSeminar']);
        $this->users = new SimpleCollection($this->sem->members->pluck('user'));
        $this->users->orderBy('Nachname');
        $this->noten = new SimpleCollection(Notenverwaltung::findBySeminar_id($GLOBALS['SessionSeminar']));
    }

    // customized #url_for for plugins
    function url_for($to)
    {
        $args = func_get_args();

        # find params
        $params = array();
        if (is_array(end($args))) {
            $params = array_pop($args);
        }

        # urlencode all but the first argument
        $args = array_map("urlencode", $args);
        $args[0] = $to;

        return PluginEngine::getURL($this->dispatcher->plugin, $params, join("/", $args));
    } 
}
