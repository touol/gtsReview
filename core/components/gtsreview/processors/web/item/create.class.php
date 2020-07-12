<?php

class gtsReviewOfficeItemCreateProcessor extends modObjectCreateProcessor
{
    public $objectType = 'gtsReviewItem';
    public $classKey = 'gtsReviewItem';
    public $languageTopics = ['gtsreview'];
    //public $permission = 'create';


    /**
     * @return bool
     */
    public function beforeSet()
    {
        $name = trim($this->getProperty('name'));
        if (empty($name)) {
            $this->modx->error->addField('name', $this->modx->lexicon('gtsreview_item_err_name'));
        } elseif ($this->modx->getCount($this->classKey, ['name' => $name])) {
            $this->modx->error->addField('name', $this->modx->lexicon('gtsreview_item_err_ae'));
        }

        return parent::beforeSet();
    }

}

return 'gtsReviewOfficeItemCreateProcessor';