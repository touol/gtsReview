<?php
/** @var xPDOTransport $transport */
/** @var array $options */
/** @var modX $modx */
if ($transport->xpdo) {
    $modx =& $transport->xpdo;

    $dev = MODX_BASE_PATH . 'Extras/gtsReview/';
    /** @var xPDOCacheManager $cache */
    $cache = $modx->getCacheManager();
    if (file_exists($dev) && $cache) {
        if (!is_link($dev . 'assets/components/gtsreview')) {
            $cache->deleteTree(
                $dev . 'assets/components/gtsreview/',
                ['deleteTop' => true, 'skipDirs' => false, 'extensions' => []]
            );
            symlink(MODX_ASSETS_PATH . 'components/gtsreview/', $dev . 'assets/components/gtsreview');
        }
        if (!is_link($dev . 'core/components/gtsreview')) {
            $cache->deleteTree(
                $dev . 'core/components/gtsreview/',
                ['deleteTop' => true, 'skipDirs' => false, 'extensions' => []]
            );
            symlink(MODX_CORE_PATH . 'components/gtsreview/', $dev . 'core/components/gtsreview');
        }
    }
}

return true;