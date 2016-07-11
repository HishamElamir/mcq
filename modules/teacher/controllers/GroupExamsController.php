<?php

namespace app\modules\teacher\controllers;

use Yii;
use app\modules\teacher\models\GroupExams;
use app\modules\teacher\models\ExamGroupsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;

/**
 * GroupExamsController implements the CRUD actions for GroupExams model.
 */
global $groupData, $groupIdGl;
$searchModel = new \app\modules\teacher\models\GroupSearch();
$dataProvider = $searchModel->searchGroupsForTeacher(Yii::$app->request->queryParams);
$groupData = $dataProvider;

class GroupExamsController extends Controller {

    /**
     * @inheritdoc
     */
    public $layout = 'groupComponentLayout';

    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                    'bulk-delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all GroupExams models.
     * @return mixed
     */
    public function actionIndex($groupId) {
        $GLOBALS['groupIdGl'] = $groupId;
        $searchModel = new ExamGroupsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $groupId);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'group_id' => $groupId,
        ]);
    }

    /**
     * Displays a single GroupExams model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        $request = Yii::$app->request;
        if ($request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                'title' => "GroupExams #" . $id,
                'content' => $this->renderAjax('view', [
                    'model' => $this->findModel($id),
                ]),
                'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                Html::a('Edit', ['update', 'id' => $id], ['class' => 'btn btn-primary', 'role' => 'modal-remote'])
            ];
        } else {
            return $this->render('view', [
                        'model' => $this->findModel($id),
            ]);
        }
    }

    /**
     * Creates a new GroupExams model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($group_id) {
       $e =new \app\modules\teacher\models\Exam();
        $request = Yii::$app->request;
        $model = new GroupExams();

        if ($request->isAjax) {
            /*
             *   Process for ajax request
             */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if ($request->isGet) {
                return [
                    'title' => "Create new GroupExams",
                    'content' => $this->renderAjax('create', [
                        'model' => $model,
                        'group_id' => $group_id,
                    ]),
                    'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                    Html::button('Save', ['class' => 'btn btn-primary', 'type' => "submit"])
                ];
            } else if ($model->load($request->post())) {
                $model->group_id = $group_id;
                $model->status = 'active';

                //Start notification
                //$notification = new \app\modules\teacher\models\Notification();
//                $notification->group_id = $group_id;
                $notif_text = 'Hello student, you hava an exam ';
//                $notification->text = $notif_text;
//                $notification->int_type = 'exam';
                $exam_id = $model->exam_id;
//                $notification->int_id = $exam_id;
//                $notification->updated_at = date('y-m-d H:i:s');
//                $notification->created_at = date('y-m-d H:i:s');
                //End notification
                //
                //get all student in this group to register to group
                $StudentsInGroup = \app\modules\teacher\models\StudentGroup::find()->where(['course_id' => $group_id])->all();

                $group = new \app\modules\teacher\models\Group();

                $StudentsObject = array();
                $notificationsObject = array();
                for ($i = 0; $i < count($StudentsInGroup); $i++) {

                    $notificationsObject[$i] = new \app\modules\teacher\models\Notification();
                    $notificationsObject[$i]->group_id = $group_id;
                    $notificationsObject[$i]->text = $notif_text;
                    $notificationsObject[$i]->int_type = 'exam';
                    $notificationsObject[$i]->int_id = $exam_id;
                     $notificationsObject[$i]->read = 'unread';
                    $notificationsObject[$i]->user_id = $StudentsInGroup[$i]->student_id;
                    $notificationsObject[$i]->updated_at = date('y-m-d H:i:s');
                    $notificationsObject[$i]->created_at = date('y-m-d H:i:s');

                    $StudentsObject[$i] = new \app\Modules\teacher\models\Student();
                    $StudentsObject[$i]->notification = $notificationsObject[$i];
                    $group->registerObderver($StudentsObject[$i]);
                }

                
                
                //print_r($StudentsObject);

               
                //$test = print_r($StudentsInGroup);
//                foreach ($StudentsInGroup as $StudentInGroup) {
//                    $student_id = $StudentInGroup->student_id; //get student id from student in group
//                    $student = new \app\Modules\teacher\models\Student();
//                    $student->id = $student_id; // assign student id
//                    $student->notification = $notification;
//                     $student->notification->user_id = $student_id;
//                    //$student->updateObserver();
//                    $test =  print_r($student);
//                    $group->registerObderver($student);
//                }


                if ($model->save() && $group->notifyObderver() ) {


                    $message = 'this action is sent successfully to your students in this group';
                    return [
                        'forceReload' => '#crud-datatable-pjax',
                        'title' => "Create new GroupExams",
                        'content' => '<span class="text-success">'
                        . '<p>'
                        . 'Create GroupExams success'
                        . $message . '<br/>'
                        //. $test
                        . '</p>'
                        . '</span>',
                        'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                        Html::a('Create More', ['create', 'group_id' => $group_id], ['class' => 'btn btn-primary', 'role' => 'modal-remote'])
                    ];
                }
            } else {

                $message = 'Sorry , the notification is failed';
                return [
                    'title' => "Create new GroupExams",
                    'content' =>
                    '<p>'
                    . $message
                    . '</p>'
                    . $this->renderAjax('create', [
                        'model' => $model,
                        'group_id' => $group_id,
                    ]),
                    'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                    Html::button('Save', ['class' => 'btn btn-primary', 'type' => "submit"])
                ];
            }
        } else {
            /*
             *   Process for non-ajax request
             */
            if ($model->load($request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('create', [
                            'model' => $model,
                            'group_id' => $group_id,
                ]);
            }
        }
    }

    /**
     * Updates an existing GroupExams model.
     * For ajax request will return json object
     * and for non-ajax request if update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $request = Yii::$app->request;
        $model = $this->findModel($id);

        if ($request->isAjax) {
            /*
             *   Process for ajax request
             */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if ($request->isGet) {
                return [
                    'title' => "Update GroupExams #" . $id,
                    'content' => $this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                    Html::button('Save', ['class' => 'btn btn-primary', 'type' => "submit"])
                ];
            } else if ($model->load($request->post()) && $model->save()) {
                return [
                    'forceReload' => '#crud-datatable-pjax',
                    'title' => "GroupExams #" . $id,
                    'content' => $this->renderAjax('view', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                    Html::a('Edit', ['update', 'id' => $id], ['class' => 'btn btn-primary', 'role' => 'modal-remote'])
                ];
            } else {
                return [
                    'title' => "Update GroupExams #" . $id,
                    'content' => $this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                    Html::button('Save', ['class' => 'btn btn-primary', 'type' => "submit"])
                ];
            }
        } else {
            /*
             *   Process for non-ajax request
             */
            if ($model->load($request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('update', [
                            'model' => $model,
                ]);
            }
        }
    }

    /**
     * Delete an existing GroupExams model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $request = Yii::$app->request;
        $this->findModel($id)->delete();

        if ($request->isAjax) {
            /*
             *   Process for ajax request
             */
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose' => true, 'forceReload' => '#crud-datatable-pjax'];
        } else {
            /*
             *   Process for non-ajax request
             */
            return $this->redirect(['index']);
        }
    }

    /**
     * Delete multiple existing GroupExams model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionBulkDelete() {
        $request = Yii::$app->request;
        $pks = explode(',', $request->post('pks')); // Array or selected records primary keys
        foreach ($pks as $pk) {
            $model = $this->findModel($pk);
            $model->delete();
        }

        if ($request->isAjax) {
            /*
             *   Process for ajax request
             */
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose' => true, 'forceReload' => '#crud-datatable-pjax'];
        } else {
            /*
             *   Process for non-ajax request
             */
            return $this->redirect(['index']);
        }
    }

    /**
     * Finds the GroupExams model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return GroupExams the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = GroupExams::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
