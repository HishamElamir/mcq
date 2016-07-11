<?php

namespace app\modules\teacher\controllers;

use Yii;
use app\modules\teacher\models\Notification;
use app\modules\teacher\models\NotificationSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * NotificationController implements the CRUD actions for Notification model.
 */
class NotificationController extends Controller {

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
     * Lists all Notification models.
     * @return mixed
     */
    public function actionIndex($id) {


        if ($_GET['id']) {
            $student_id = $_GET['id'];

            $notification = new Notification();


            $notifications = $notification->find()->where(['user_id' => $student_id])->all();
            $teachers = \app\modules\teacher\models\Teacher::find()
                            ->join('inner join', 'courses', 'user.id = courses.teacher_id')
                            ->join('inner join', 'group', 'group.course_id = courses.id')->all();
            $notifNum = (new yii\db\Query())
                    ->from('notifications')
                    ->where(['read' => 'unread'])
                    ->count();

            $unreadIds = Notification::find()->where(['read' => 'unread'])->all();
            $data = array();
            $unreadIdsArray = array();
            foreach ($unreadIds as $unreadId) {
                $array['id'] = $unreadId->id;
                $unreadIdsArray[] = $array;
            }


            $notifysArray = array();
            foreach ($notifications as $notif) {
                $array['text'] = $notif->text;
                $array['group'] = $notif->group->attributes;
                $array['exam'] = $notif->int->attributes;
                $array['id'] = $notif->id;
                $notifysArray[] = $array;
            }

            $data['unReadIds'] = $unreadIdsArray;
            $data['student'] = $notifications[0]->user->attributes;
            $data['teacher'] = $teachers[0]->attributes;
            $data['notifications'] = $notifysArray;




            //print_r($data);

            echo json_encode($data);
        } else
            echo "false";
    }

    public function actionSetRead() {
        if (isset($_POST['notifyIds'])) {

            $ids = implode(',', $_POST['notifyIds']);

            $connection = Yii::$app->db;
            if ($connection->createCommand()->update('notifications', ['read' => 'read'], 'id in(' . $ids . ')')->execute())
                echo 1;
            else
                echo 0;
        } else {
            echo 0;
        }
    }

    public function actionCountNotifications($id) {

        if ($_GET['id']) {
            $student_id = $_GET['id'];
            $query = new \yii\db\Query();
            $notifNum = $query
                    ->from('notifications')
                    ->where(['read' => 'unread', 'user_id' => $student_id])
                    ->count();
            echo $notifNum;
        } else
            echo "false";
    }

    public function actionSetNotifyRead($id) {

        if ($_GET['id']) {
            $student_id = $_GET['id'];
            $query = new \yii\db\Query();
            $notifNum = $query
                    ->from('notifications')
                    ->where(['read' => 'unread', 'user_id' => $student_id])
                    ->count();
            echo $notifNum;
        } else
            echo "false";
    }

    /**
     * Displays a single Notification model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Notification model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Notification();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Notification model.
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
     * Deletes an existing Notification model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {

        if ($this->findModel($id)->delete())
            echo TRUE;
        else
           echo FALSE;




        // return $this->redirect(['index']);
    }

    /**
     * Finds the Notification model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Notification the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Notification::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
