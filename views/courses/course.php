<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Courses */
/* @var $form ActiveForm */
?>
<div class="course">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'name') ?>
        <?= $form->field($model, 'course_code') ?>
        <?= $form->field($model, 'unit') ?>
        <?= $form->field($model, 'level_id') ?>
        <?= $form->field($model, 'department_id') ?>
        <?= $form->field($model, 'created_id') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- course -->
