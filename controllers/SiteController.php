<?php

namespace app\controllers;

use app\models\MailQueue;
use app\models\MailTemplates;
use Yii;
use app\models\Students;
use yii\base\BaseObject;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SiteController implements the CRUD actions for Students model.
 */
class SiteController extends Controller
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
        $dataProvider = new ActiveDataProvider([
            'query' => Students::find(),
        ]);
        $queue = new MailQueue();
        $templates = MailTemplates::find()->all();
            return $this->render('index', [
            'dataProvider' => $dataProvider,
            'templates'    => $templates,
            'queue'        => $queue,
        ]);
    }

    /**
     * add students to queue for send mail
     * @return mixed
     */
    public final function actionCreateQueue(){
        if(Yii::$app->request->post()){
            $data = Yii::$app->request->post('MailQueue');
            $students = array_unique(explode(',',$data['student_ids']));
            $ready = true;
            foreach ($students as $student){
                $model = new MailQueue();
                $model->student_id = intval($student);
                $model->template_id = intval($data['template_id']);
                $model->status = 0;
                if(!$model->save()) {
                    $ready = false;
                    break;
                }
            }
            if($ready){
                return $this->redirect(['queue']);
            }
        }
        return $this->redirect(['index']);
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
    public function actionCreate()
    {
        $model = new Students();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
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
     * view all queue
     * @return string
     */
    public function actionQueue(){
        $dataProvider = new ActiveDataProvider([
            'query' => MailQueue::find(),
        ]);
        return $this->render('queue', [
            'dataProvider' => $dataProvider,
        ]);
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
