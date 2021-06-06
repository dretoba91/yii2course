<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\helpers\ArrayHelper;

use app\models\Courses;
/* @var $this yii\web\View */
/* @var $model app\models\Registration */
/* @var $form ActiveForm */
?>


<div class="courses-reg">


 	<div class="row">
            <div class="col-md-10">
                <?php if ($registration->status == 0) :?>
                	<div class="alert alert-warning">
					  <strong></strong> <a class="btn btn-success" href="approve_course?id=<?= $registration->id ?>">Approve</a>
            <a class="btn btn-danger" href="reject_course?id=<?= $registration->id ?>">Reject</a>  <?= $registration->user->name; ?> course registeration waiting for Approval.
					</div>


        <?php elseif($registration->status == 1): ?>
                	<div class="alert alert-info">
					  <strong>Approved!</strong> <?= $registration->user->name; ?> course registration.
            <a class="btn btn-danger" href="reject_course?id=<?= $registration->id ?>">Reject</a> .
					</div>
        <?php else: ?>
        <div class="alert alert-danger">
  <strong>Rejected!</strong> <?= $registration->user->name; ?> course registration.
  <strong></strong> <a class="btn btn-success" href="approve_course?id=<?= $registration->id ?>">Approve</a>
</div>

                <?php endif; ?>
            </div>
    </div>
    <div id="table">
	    <table class="table table-bordered table-responsive">
	                    <thead class="black white-text">
	                        <tr>
	                            <th>Course</th>
                              <th>Course code</th>
	                            <th>Unit</th>
	                        </tr>
	                    </thead>
	                    <tbody>
	                    	<?php $totalunit = 0; ?>
	                        <?php foreach ($courses as $course):?>
	                            <?php $totalunit += (int) $course->unit ?>
	                         <tr>
	                            <th><?= $course->name ?></th>
	                            <td><?= $course->course_code ?></td>
	                            <td><?= $course->unit ?></td>

	                        </tr>
	                        <?php endforeach; ?>
	                    </tbody>
	                    <tfoot>
	                        <tr>
	                        	<td></td>
	                            <th>Total</th>
	                            <td><?= $totalunit ?></td>
	                        </tr>
	                    </tfoot>
	                </table>
	     </div>



</div><!-- courses-reg -->

<script type="text/javascript">

    const EditBox = document.querySelector('#Edit-courses'),
    EditBtn = document.querySelector('#EditBtn'),
    table = document.querySelector('#table'),
    CancleBtn = document.querySelector('#CancleBtn');

    EditBox.style.display = 'none';

    EditBtn.addEventListener('click', () => {
    	table.style.display = 'none';
    	EditBox.style.display = 'block';
    	EditBtn.style.display = 'none';
    });

    CancleBtn.addEventListener('click', () => {
    	table.style.display = 'initial';
    	EditBtn.style.display = 'block';
    	EditBox.style.display = 'none';
    });

</script>
