<?php
/**
 * Created by PhpStorm.
 * User: duda
 * Date: 1/23/2018
 * Time: 19:09
 */

namespace app\controllers\admin;

use app\controllers\AppController;


class UserController extends AppController
{
    public function actionIndex(){
        return $this->render('index');
    }
}