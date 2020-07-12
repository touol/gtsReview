<?php

class gtsReviewOfficeItemDisableProcessor extends modObjectProcessor
{
    public $objectType = 'gtsReviewItem';
    public $classKey = 'gtsReviewItem';
    public $languageTopics = ['gtsreview'];
    //public $permission = 'save';


    /**
     * @return array|string
     */
    public function process()
    {
        if (!$this->checkPermissions()) {
            return $this->failure($this->modx->lexicon('access_denied'));
        }

        $ids = $this->modx->fromJSON($this->getProperty('ids'));
        if (empty($ids)) {
            return $this->failure($this->modx->lexicon('gtsreview_item_err_ns'));
        }

        foreach ($ids as $id) {
            /** @var gtsReviewItem $object */
            if (!$object = $this->modx->getObject($this->classKey, $id)) {
                return $this->failure($this->modx->lexicon('gtsreview_item_err_nf'));
            }

            $object->set('active', false);
            $object->save();
        }

        return $this->success();
    }

}

return 'gtsReviewOfficeItemDisableProcessor';
