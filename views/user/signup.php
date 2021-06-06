<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\SignupForm;
use app\models\User;

/* @var $this yii\web\View */
/* @var $model app\models\user */
/* @var $form ActiveForm */
?>
<div class="user-signup">

            <h2 class="page-header">Register</h2>


    <div class="site-signup">
            <h1><?= Html::encode($this->title) ?></h1>
            <p>Please fill out the following fields to register:</p>
        <div class="row">
            <div class="col-lg-5">
 
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                                
                <?= $form->field($model, 'password')->passwordInput() ?>
                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>    