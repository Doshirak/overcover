<?php

namespace app\controllers;

class ImageController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLoad()
    {
        return $this->render('load');        
    }
}
