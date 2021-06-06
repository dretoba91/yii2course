<?php

use yii\helpers\Html;
use yii\grid\GridView;


/* @var $this yii\web\View */
/* @var $searchModel app\models\FacultiesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Faculties';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="faculties-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <span>
        <?= Html::a('Create Faculties', ['create'], ['class' => 'btn btn-success']) ?>
    </span>

     <span class="pull-right">
        <?= Html::a('Departments', ['departments/index'], ['class' => 'btn btn-info']) ?>
    
        <?= Html::a('Levels', ['levels/index'], ['class' => 'btn btn-warning']) ?>
    </span>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'created_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
