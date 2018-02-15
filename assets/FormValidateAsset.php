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
class FormValidateAsset extends AssetBundle {
    public $sourcePath = __DIR__.'/form';
//    public $basePath = '@webroot/assets/google';
//    public $baseUrl = '@web/';
    public $js = [
        'validate.js'
    ];
    public $depends = [
        'yii\web\JqueryAsset'
    ];
}
