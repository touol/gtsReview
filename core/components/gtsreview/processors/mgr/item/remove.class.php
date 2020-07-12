<?php
class gtsReviewItemRemoveProcessor extends modObjectRemoveProcessor
{
    public $objectType = 'gtsReviewItem';
    public $classKey = 'gtsReviewItem';
    public $languageTopics = ['gtsreview:manager'];
    #public $permission = 'remove';

    /**
     * @return bool|null|string
     */
    public function initialize()
    {
        if (!$this->modx->hasPermission($this->permission)) {
            return $this->modx->lexicon('access_denied');
        }
        return parent::initialize();
    }
}

return 'gtsReviewItemRemoveProcessor';