<?php

/* @var $this yii\web\View */
use app\models\User;

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Course Registration App</h1>
        
    </div>

    <div class="body-content">
        <p class="lead"><?="Welcome to your page    " . Yii::$app->user->identity->name; ?></p>
        <?php if(!($students->where(['user_id' => Yii::$app->user->identity->id])->one())) : ?>
            <p><a class="btn btn-lg btn-success" href="/index.php/students/create">Register as a student</a> </p>
        
        <?php else: ?>
            <?php if(!($registration->where(['student_id' => Yii::$app->user->identity->id])->one())) : ?>
                <p><a class="btn btn-lg btn-warning" href="/index.php/courses/register">Register course</a></p>
                <?php else: ?>
                <p><a class="btn btn-lg btn-info" href="/index.php?r=courses/reg">View Registered course </a></p>
             <?php endif ?>
        <?php endif ?>
        </div>
   

   
</div>