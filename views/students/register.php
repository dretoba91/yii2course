<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use app\models\Students;
use app\models\Departments;
use app\models\Levels;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\students */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="students-form">
<h2 class="page-header">Register</h2>
    <?php $form = ActiveForm::begin(); ?>



    <?= $form->field($model, 'faculty_id')->dropdownlist(
            ArrayHelper::map($faculty::find()->all(), 'id', 'name'),
            [
                'prompt' => 'Select Faculty',

                'onchange' => '
                 

                $.post( "index.php/students/department&id='.'"+$(this).val(), function( data ){

                    $( "select#students-department_id" ).html( data );

                });'

            ]

        );?>

    <?= $form->field($model, 'department_id')->dropdownlist(
        ArrayHelper::map(Departments::find()->all(), 'id', 'name'),
            [
                'prompt' => 'Select Department', 

            ]

        ); ?>

    <?= $form->field($model, 'level_id')->dropdownlist(
        ArrayHelper::map($level::find()->all(), 'id', 'name'),
        [
        'prompt' => 'Select Level'
        ]
    );?>


    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<script>
$( window ).ready(
    $( "#students-departments_id" ).html( "<option>Select Department</option>" );
);
</script> 
