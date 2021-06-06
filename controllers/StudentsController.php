<?php

namespace app\controllers;

use Yii;
use app\models\Students;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use app\models\User;
use app\models\Departments;
use app\models\Faculties;
use app\models\Levels;
use app\models\Registration;
use yii\db\ActiveQuery;
use yii\data\Pagination;

/**
 * StudentsController implements the CRUD actions for Students model.
 */
class StudentsController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Students models.
     * @return mixed
     */
    public function actionIndex()
    {
        $query = students::find();

        $pagination = new Pagination([
                'defaultPageSize' => 20,
                'totalCount' => $query->count(),
        ]);

        $students = $query->orderBy('id')
        ->offset($pagination->offset)
        ->limit($pagination->limit)
        ->all();


        //Render view
        return $this->render('index', [
            'students' => $students,
            'pagination' => $pagination,
        ]);
    }

    public function actionHomepage()
    {
        $students = students::find();
        $registration = Registration::find();
       return $this->render('homepage',
            [
                'students' => $students,
                'registration' => $registration,
            ]

        );
    }

    /**
     * Displays a single Students model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Students model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionRegister()
    {
        $model = new students();

        $faculty = new Faculties();
        $dept = new Departments();
        $level = new Levels();

        if ($model->load(Yii::$app->request->post())) {


            $model->user_id = Yii::$app->user->identity->id;
            $model->save();
            yii::$app->getSession()->setFlash('success', 'Sucessful');
            return $this->redirect('homepage');
        }
        
        if(Yii::$app->user->id == User::DEFAULT){

        return $this->render('register/user', [
            'model' => $model,
            'faculty' => $faculty,
            'dept' => $dept,
            'level' => $level,

        ]);
        }else{
            return $this->render('create', [
            'model' => $model,
        ]);
        }
    }

    public function actionDepartment($id)
    {
        
        $countDepartments = Departments::find()->where(['faculty_id' => $id])->count();
        $departments = Departments::find()->where(['faculty_id' => $id])->all();

        if($countDepartments > 0) {
            foreach($departments as $department){
                echo "<option value='".$department->id."'>". $department->name."</option>"; 
            }
        } else{
            echo "<option>--</option>";
        }
    }

    /**
     * Updates an existing Students model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Students model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Students model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Students the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Students::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
