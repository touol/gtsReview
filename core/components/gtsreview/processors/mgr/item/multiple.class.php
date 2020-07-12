<?php

class gtsReviewMultipleProcessor extends modProcessor
{


    /**
     * @return array|string
     */
    public function process()
    {
        if (!$method = $this->getProperty('method', false)) {
            return $this->failure();
        }
        $ids = json_decode($this->getProperty('ids'), true);
        if (empty($ids)) {
            return $this->success();
        }

        /** @var gtsReview $gtsReview */
        $gtsReview = $this->modx->getService('gtsReview');
        foreach ($ids as $id) {
            /** @var modProcessorResponse $response */
            $response = $gtsReview->runProcessor('mgr/item/' . $method, array('id' => $id), array(
                'processors_path' => MODX_CORE_PATH . 'components/gtsreview/processors/mgr/'
            ));
            if ($response->isError()) {
                return $response->getResponse();
            }
        }

        return $this->success();
    }


}

return 'gtsReviewMultipleProcessor';