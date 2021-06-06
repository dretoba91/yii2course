<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\ListView;

use yii\helpers\ArrayHelper;

use app\models\Courses;

?>

<div class="courses-reg">
<?php if($Switch == false) : ?>

	<?php $form = ActiveForm::begin(); ?>
		<?= $form->field($registerCourse, 'courses')->checkboxList($courses)->label("Select Courses") ?>
		
		 

        <div class="form-group">
            <?= Html::submitButton('Register', ['class' => 'btn btn-primary']) ?>
        </div>

	<?php ActiveForm::end(); ?>

 <?php else : ?>
 	<div class="row">
            <div class="col-md-8">
                <?php if ($registration->status == 0) :?>
                	<div class="alert alert-warning">
					  <strong>Waiting response!</strong> You can edit your course list while waiting approval.
					  <button class="pull-right btn btn-sm btn-warning" id="EditBtn"><i class="fa fa-edit"></i> <span>Edit Courses</span></button>
					</div>


        <?php elseif($registration->status == 1): ?>
                	<div class="alert alert-info">
					  <strong>Approved!</strong> You can view courses.
					  <!--<button class="pull-right btn btn-sm btn-primary"><i class="fa fa-eye"></i> <span>View Status</span></button>-->
					</div>
        <?php else: ?>
        <div class="alert alert-danger">
  <strong>Rejected!</strong> You can edit your course list while waiting approval.
  <button class="pull-right btn btn-sm btn-danger" id="EditBtn"><i class="fa fa-edit"></i> <span>Edit Courses</span></button>
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
	                            <th>Credit</th>
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

                <div id="Edit-courses">
					<?php $form = ActiveForm::begin(['action' => "index.php/courses/registerupdate&id=".$registration->id]); ?>
							<?= $form->field( $EditRegisterCourse, 'courses')->checkboxList($coursesEdit)->label("Select Courses") ?>
					        <div class="form-group">
					            <?= Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>
					            <button class="btn btn-sm btn-default" id="CancleBtn"><i class="fa fa-eye"></i> <span>Cancle</span></button>
					        </div>

					<?php ActiveForm::end(); ?>
				</div>

 <?php endif; ?>


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