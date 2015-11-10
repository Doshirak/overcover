<?php

namespace app\controllers;

use Yii;
use app\models\SectionPost;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SectionPostController implements the CRUD actions for SectionPost model.
 */
class SectionPostController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    public function beforeAction($action)
    {
        if (parent::beforeAction($action)) {
            if (!Yii::$app->user->can('editPosts')) {
                return $this->goHome();
            }
            return true;
        } else {
            return false;
        }
    }

    /**
     * Lists all SectionPost models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => SectionPost::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SectionPost model.
     * @param integer $post
     * @param integer $section
     * @return mixed
     */
    public function actionView($post, $section)
    {
        return $this->render('view', [
            'model' => $this->findModel($post, $section),
        ]);
    }

    /**
     * Creates a new SectionPost model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SectionPost();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'post' => $model->post, 'section' => $model->section]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing SectionPost model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $post
     * @param integer $section
     * @return mixed
     */
    public function actionUpdate($post, $section)
    {
        $model = $this->findModel($post, $section);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'post' => $model->post, 'section' => $model->section]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing SectionPost model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $post
     * @param integer $section
     * @return mixed
     */
    public function actionDelete($post, $section)
    {
        $this->findModel($post, $section)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the SectionPost model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $post
     * @param integer $section
     * @return SectionPost the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($post, $section)
    {
        if (($model = SectionPost::findOne(['post' => $post, 'section' => $section])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
