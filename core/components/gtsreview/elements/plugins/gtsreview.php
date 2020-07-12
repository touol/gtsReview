<?php
/** @var modX $modx */
/* @var array $scriptProperties */
switch ($modx->event->name) {
    case 'OnHandleRequest':
        /* @var gtsReview $gtsReview*/
        $gtsReview = $modx->getService('gtsreview', 'gtsReview', $modx->getOption('gtsreview_core_path', $scriptProperties, $modx->getOption('core_path') . 'components/gtsreview/') . 'model/');
        if ($gtsReview instanceof gtsReview) {
            $gtsReview->loadHandlerEvent($modx->event, $scriptProperties);
        }
        break;
}
return '';