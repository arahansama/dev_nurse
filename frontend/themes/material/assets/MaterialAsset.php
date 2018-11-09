<?php
namespace frontend\themes\material\assets;

use yii\web\AssetBundle;


class MaterialAsset extends AssetBundle
{
    public $sourcePath = '@frontend/themes/material/dist';
    public $css = [
        'css/bootstrap.min.css',
        'css/material-dashboard.css?v=1.2.1',
        'css/demo.css',
        '//maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css',
        '//fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons',
        '//fonts.googleapis.com/icon?family=Material+Icons',
       
       
    ];

    public $js = [
        'js/jquery-3.2.1.min.js',
        'js/bootstrap.min.js',
        'js/material.min.js',
        'js/perfect-scrollbar.jquery.min.js',
        '//cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js',
        'js/arrive.min.js',
        'js/jquery.validate.min.js',
        'js/moment.min.js',
        'js/chartist.min.js',
        'js/jquery.bootstrap-wizard.js',
        'js/bootstrap-notify.js',
        'js/bootstrap-datetimepicker.js',
        'js/jquery-jvectormap.js',
        'js/nouislider.min.js',
        '//maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE',
        'js/jquery.select-bootstrap.js',
        'js/jquery.datatables.js',
        'js/sweetalert2.js',
        'js/jasny-bootstrap.min.js',
        'js/fullcalendar.min.js',
        'js/jquery.tagsinput.js',
        'js/material-dashboard.js?v=1.2.1',
        'js/demo.js',
        
        
    ];

    public $depends = [
        // 'yii\web\YiiAsset',

       // 'yii\bootstrap\BootstrapAsset',
       // 'agency\assets\FontAwesomeAsset'
    ];
}