<?php

namespace app\modules\teacher\controllers;

use Yii;
use app\modules\teacher\models\Exam;
use app\modules\teacher\models\ExamSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ExamController implements the CRUD actions for Exam model.
 */
global $examData;
$searchModel = new ExamSearch();
$dataProvider = $searchModel->searchExamsForTeacher(Yii::$app->request->queryParams);
$examData = $dataProvider;

class ExamController extends Controller {

    public $layout = 'examLayout';

    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Exam models.
     * @return mixed
     */
    public function actionIndex() {

        $model = new Exam();

//        if ($model->load(Yii::$app->request->post())) {
//            
////            print_r($_POST);
////            exit();
//            $model->exam_grade_approval = 0;
//            $model->teacher_id = Yii::$app->user->id;
//            $model->save();
//            return $this->redirect(['view', 'id' => $model->id]);
//        } else {
//            return $this->render('index', [
//                        'model' => $model,
//            ]);
//        }
        
         return $this->render('index');
    }

    /**
     * Displays a single Exam model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Exam model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new \app\modules\admin\models\Exams();

            if ($model->load(Yii::$app->request->post())) {
                $model->teacher_id = Yii::$app->user->getId();
                $model->exam_grade_approval = 0; 
                
                
                $model->save();

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
                            //'dataProvider' => $dataProvider,
            ]);
        }
    }

    /**
     * Updates an existing Exam model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Exam model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Exam model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Exam the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Exam::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionQuestion($id) {
        $query = \app\modules\teacher\models\Question::find()
                ->join('inner join', 'exams_questions', 'exams_questions.question_id = question.id')
                ->join('inner join', 'exams', 'exams_questions.exam_id = ' . $id);

        $dataProvider = new \yii\data\ActiveDataProvider([
            'query' => $query,
        ]);



        $model = new \app\modules\teacher\models\GroupExams();
        return $this->render('question', [
                    // 'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'model' => $model
        ]);
    }

}
