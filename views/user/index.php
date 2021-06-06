<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jumbotron">
        <h1>Welcome!</h1>

        
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Register</h2>
                    <p>
                        <?= Html::a('Signup User', ['register'], ['class' => 'btn btn-success']) ?>
                    </p>
               
            </div>
            <div class="col-lg-4">
                <h2>Login</h2>
                
                    <p>
                        <?= Html::a('Login User', ['login'], ['class' => 'btn btn-success']) ?>
                    </p>
            </div>
            
        </div>

    </div>
</div>
