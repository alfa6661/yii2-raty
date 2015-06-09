<?php
namespace alfa6661\widgets;

/**
 * @author Alfa Adhitya <alfa2159@gmail.com>
 * @link http://www.lab-informatika.com/
 */
class RatyAsset extends \yii\web\AssetBundle
{

    public $sourcePath = '@vendor/alfa6661/yii2-raty/assets';

    public $css = [
        'jquery.raty.css'
    ];

    public $js = [
        'jquery.raty.js'
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\web\JqueryAsset',
    ];
}