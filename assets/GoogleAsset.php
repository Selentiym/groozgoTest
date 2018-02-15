<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class GoogleAsset extends AssetBundle {
    public $sourcePath = __DIR__.'/google';
//    public $basePath = '@webroot/assets/google';
//    public $baseUrl = '@web/';
    public $js = [
        'https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=AIzaSyBCFlZ18I2OODtJtSe8a3e6PjaKwB8Q4vg',
        'lib.js'
    ];
}
