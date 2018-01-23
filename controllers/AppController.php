<?php
/**
 * Created by PhpStorm.
 * User: duda
 * Date: 1/23/2018
 * Time: 19:25
 */

namespace app\controllers;


use yii\web\Controller;

class AppController extends Controller
{
    public function debug($arr){
        echo '<pre>' . print_r($arr, true) . '</pre>';
    }
}

