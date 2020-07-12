<?php
include_once dirname(__FILE__) . '/update.class.php';
class gtsReviewItemEnableProcessor extends gtsReviewItemUpdateProcessor
{
    public function beforeSet()
    {
        $this->setProperty('active', true);
        return true;
    }
}
return 'gtsReviewItemEnableProcessor';