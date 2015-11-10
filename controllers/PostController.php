<?php

namespace app\controllers;

use Yii;
use app\models\Post;
use app\models\Section;
use app\models\SectionPost;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\components\ImageHandler;

/**
 * PostController implements the CRUD actions for Post model.
 */
class PostController extends Controller
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
        if ($action->id == 'get') {
            return true;
        }
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
     * Lists all Post models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Post::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Post model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Post model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Post();
        $section = '';
        if (ImageHandler::loadImage($model, 'img/')) {
            $sectionId = Yii::$app->request->post('section');
            $section = Section::find()->where(['id' => $sectionId])->one();
            if ($section) {
                $sectionPost = new SectionPost(['section' => $sectionId, 'post' => $model->id]);
                $sectionPost->save();
                return $this->redirect(['view', 'id' => $model->slug]);
            } else {
                return $this->redirect(['view', 'id' => $model->slug]);
            }
        } else {
            return $this->render('create', [
                'model' => $model, 'section' => $section
            ]);
        }
    }

    /**
     * Updates an existing Post model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $sectionPost = SectionPost::find(['post' => $model->id])->one();
        $section = $sectionPost->section;

        if (ImageHandler::loadImage($model, 'img/')) {
            $sectionId = Yii::$app->request->post('section');
            $section = Section::find()->where(['id' => $sectionId])->one();
            if ($section) {
                $sectionPost->delete();
                $sectionPost = new SectionPost(['section' => $sectionId, 'post' => $model->id]);
                $sectionPost->save();
                return $this->redirect(['view', 'id' => $model->slug]);
            }
        } else {
            return $this->render('update', [
                'model' => $model, 'section' => $section
            ]);
        }
    }

    /**
     * Deletes an existing Post model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionGet($id = null, $sort = 'date', $order = 'asc')
    {
        $aliases = ['asc' => 'SORT_ASC', 'desc' => 'SORT_DESC'];
        $order = $aliases[$order];
        if ($id == null || $id == 'all') {
            $posts = Post::find()->orderBy([$sort => $order])->asArray()->all();
            echo json_encode($posts);
        } else {
            $post = Post::find()->where(['id' => $id])->asArray()->one();
            echo json_encode($post);
        }
    }

    /**
     * Finds the Post model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Post the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Post::find()->where(['slug' => $id])->one()) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
