<?php
include_once dirname(__FILE__) . '/update.class.php';
class gtsReviewItemDisableProcessor extends gtsReviewItemUpdateProcessor
{
    public function beforeSet()
    {
        $this->setProperty('active', false);
        return true;
    }
}
return 'gtsReviewItemDisableProcessor';
