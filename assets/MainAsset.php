<?php

namespace app\assets;
use yii\web\AssetBundle;
use yii\web\View;

class MainAsset extends AssetBundle
{
    public $basePath = '@webroot';

    public $css = [
        'css/style.css',
        'css/autocomplete.min.css'
    ];

    public $js = [
        'https://api-maps.yandex.ru/2.1/?apikey=e666f398-c983-4bde-8f14-e3fec900592a&lang=ru_RU',
        'js/main.js',
        'js/custom-autocompplete.js',
    ];
    public $jsOptions = [
      //'position'=>View::POS_HEAD
    ];
}