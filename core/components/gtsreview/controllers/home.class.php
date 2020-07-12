<?php

/**
 * The home manager controller for gtsReview.
 *
 */
class gtsReviewHomeManagerController extends modExtraManagerController
{
    /** @var gtsReview $gtsReview */
    public $gtsReview;


    /**
     *
     */
    public function initialize()
    {
        $this->gtsReview = $this->modx->getService('gtsReview', 'gtsReview', MODX_CORE_PATH . 'components/gtsreview/model/');
        parent::initialize();
    }


    /**
     * @return array
     */
    public function getLanguageTopics()
    {
        return ['gtsreview:manager', 'gtsreview:default'];
    }


    /**
     * @return bool
     */
    public function checkPermissions()
    {
        return true;
    }


    /**
     * @return null|string
     */
    public function getPageTitle()
    {
        return $this->modx->lexicon('gtsreview');
    }


    /**
     * @return void
     */
    public function loadCustomCssJs()
    {
        $this->addCss($this->gtsReview->config['cssUrl'] . 'mgr/main.css');
        $this->addJavascript($this->gtsReview->config['jsUrl'] . 'mgr/gtsreview.js');
        $this->addJavascript($this->gtsReview->config['jsUrl'] . 'mgr/misc/utils.js');
        $this->addJavascript($this->gtsReview->config['jsUrl'] . 'mgr/misc/combo.js');
        $this->addJavascript($this->gtsReview->config['jsUrl'] . 'mgr/misc/default.grid.js');
        $this->addJavascript($this->gtsReview->config['jsUrl'] . 'mgr/misc/default.window.js');
        $this->addJavascript($this->gtsReview->config['jsUrl'] . 'mgr/widgets/items/grid.js');
        $this->addJavascript($this->gtsReview->config['jsUrl'] . 'mgr/widgets/items/windows.js');
        $this->addJavascript($this->gtsReview->config['jsUrl'] . 'mgr/widgets/home.panel.js');
        $this->addJavascript($this->gtsReview->config['jsUrl'] . 'mgr/sections/home.js');

        $this->addJavascript(MODX_MANAGER_URL . 'assets/modext/util/datetime.js');

        $this->gtsReview->config['date_format'] = $this->modx->getOption('gtsreview_date_format', null, '%d.%m.%y <span class="gray">%H:%M</span>');
        $this->gtsReview->config['help_buttons'] = ($buttons = $this->getButtons()) ? $buttons : '';

        $this->addHtml('<script type="text/javascript">
        gtsReview.config = ' . json_encode($this->gtsReview->config) . ';
        gtsReview.config.connector_url = "' . $this->gtsReview->config['connectorUrl'] . '";
        Ext.onReady(function() {MODx.load({ xtype: "gtsreview-page-home"});});
        </script>');
    }


    /**
     * @return string
     */
    public function getTemplateFile()
    {
        $this->content .=  '<div id="gtsreview-panel-home-div"></div>';
        return '';
    }

    /**
     * @return string
     */
    public function getButtons()
    {
        $buttons = null;
        $name = 'gtsReview';
        $path = "Extras/{$name}/_build/build.php";
        if (file_exists(MODX_BASE_PATH . $path)) {
            $site_url = $this->modx->getOption('site_url').$path;
            $buttons[] = [
                'url' => $site_url,
                'text' => $this->modx->lexicon('gtsreview_button_install'),
            ];
            $buttons[] = [
                'url' => $site_url.'?download=1&encryption_disabled=1',
                'text' => $this->modx->lexicon('gtsreview_button_download'),
            ];
            $buttons[] = [
                'url' => $site_url.'?download=1',
                'text' => $this->modx->lexicon('gtsreview_button_download_encryption'),
            ];
        }
        return $buttons;
    }
}