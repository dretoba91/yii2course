<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
use app\models\User;

$this->title = 'Sudent Registration';
?>
<div class="students-index">

<h1><?= Html::encode($this->title) ?></h1></br></br></br>

<p>
    <?= Html::a('Register Students', ['register'], ['class' => 'btn btn-success']) ?>
</p>


<?php if(!empty($students)) : ?>
<div class="table-responsive">
<table class="table">
        <thead class="thead-dark">
        <tr>
        <th scope="col">Id</th>
          <th scope="col">Name</th>
          <th scope="col">Faculty</th>
          <th scope="col">Department</th>
          <th scope="col">Level</th>
           <th scope="col">created</th>
        </tr>
        </thead>
   
<?php foreach($students as $student) : ?>
    <tr>
        <th scope="row"><?= $student->id; ?></th>
        <td><?= $student->user->name ?></td>
        <td><?= $student->faculty->name?></td>
        <td><?= $student->department->name ?></td>
        <td><?= $student->level->name ?></td>
        <td><?= $student->created_at; ?></td>
        <!-- <td>
            <span class="pull-right">
                <a class="btn btn-default" href="index.php/students/update&id=<?= $student->id ?>">update</a>
                <a class="btn btn-danger" href="index.php/students/delete&id=<?= $student->id ?>">delete</a>
            </span>
        </td> -->
        </tr>


    
<?php  endforeach; ?>

</table>
</div>
<?php else: ?>




<?php endif; ?>
<?= LinkPager::widget(['pagination'=>$pagination]);?>


</div>