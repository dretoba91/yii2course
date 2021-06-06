<?php

namespace app\controllers;

use Yii;
use app\models\User;
use app\models\SignupForm;
use app\models\LoginForm;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogin()
    {
       
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect(array('index.php/students'));
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionRegister()
    {
	     $user = new user();

	    if ($user->load(Yii::$app->request->post())) {
	          // Save Record
              $user->save(false);
              //send message
              yii::$app->getSession()->setFlash('success', 'You are Registered');

              return $this->redirect('index.php');
	    }

	    return $this->render('register', [
	        'user' => $user,
        ]);
    }    
}        