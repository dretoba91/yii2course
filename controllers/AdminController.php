<?php

namespace app\controllers;

use Yii;
use app\models\Faculties;
use app\models\Courses;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class AdminController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
