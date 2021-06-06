<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
?>


<h1 class="page-header">Course Registration Status</h1>

<?php if(null !== yii::$app->getSession()->setFlash('sucess')) : ?>
	<div class="alert alert-sucess"> <?= yii::$app->getSession()->setFlash('sucess') ?></div>
<?php endif; ?>


<?php if(!empty($registration)) : ?>
<div class="table-responsive">
<table class="table">
            <thead class="thead-dark">
            <tr>
              <th scope="col">Student Name</th>
              <th scope="col">Faculty</th>
              <th scope="col">Department</th>
              <th scope="col">Level</th>
              <th scope="col">options</th>
            </tr>
            </thead>

	<?php foreach($registration as $reg) : ?>

        <tr>
            <td scope="row"><?= $reg->user->name; ?></td>
            <td><?= $reg->student->faculty->name; ?></td>
            <td><?= $reg->student->department->name; ?></td>
            <td><?= $reg->student->level->name; ?></td>
            <td>
              <?php if($reg->status == 1) : ?>
               <span class="pull-left">
                 <?= "APPROVED" ?>
                    <a class="btn btn-warning" href="course?id=<?= $reg->student_id ?>">Check</a>
                </span>
              <?php elseif($reg->status == 2) : ?>
                <span class="pull-left">
                  <?= "REJECTED" ?>
                     <a class="btn btn-warning" href="course?id=<?= $reg->student_id ?>">Check</a>
                </span>
              <?php else : ?>
                <span class="pull-left">
                  <?= "PENDING" ?>
                     <a class="btn btn-warning" href="course?id=<?= $reg->student_id ?>">Check</a>
                </span>


          <?php endif; ?>
           </td>
            </tr>


	<?php  endforeach; ?>

 </table>
</div>
<?php else: ?>

<p>Data empty</p>


<?php endif; ?>




<?= LinkPager::widget(['pagination'=>$pagination]);?>

<script>

   

</script>
