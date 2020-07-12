<?php
if (file_exists(dirname(dirname(dirname(dirname(__FILE__)))) . '/config.core.php')) {
    /** @noinspection PhpIncludeInspection */
    require_once dirname(dirname(dirname(dirname(__FILE__)))) . '/config.core.php';
} else {
    require_once dirname(dirname(dirname(dirname(dirname(__FILE__))))) . '/config.core.php';
}
/** @noinspection PhpIncludeInspection */
require_once MODX_CORE_PATH . 'config/' . MODX_CONFIG_KEY . '.inc.php';
/** @noinspection PhpIncludeInspection */
require_once MODX_CONNECTORS_PATH . 'index.php';
/** @var gtsReview $gtsReview */
$gtsReview = $modx->getService('gtsReview', 'gtsReview', MODX_CORE_PATH . 'components/gtsreview/model/');
$modx->lexicon->load('gtsreview:default');

// handle request
$corePath = $modx->getOption('gtsreview_core_path', null, $modx->getOption('core_path') . 'components/gtsreview/');
$path = $modx->getOption('processorsPath', $gtsReview->config, $corePath . 'processors/');
$modx->getRequest();

/** @var modConnectorRequest $request */
$request = $modx->request;
$request->handleRequest([
    'processors_path' => $path,
    'location' => '',
]);