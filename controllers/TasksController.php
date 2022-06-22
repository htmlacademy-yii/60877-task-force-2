<?php

namespace app\controllers;

use app\models\Categories;
use app\models\Replies;
use app\models\SearchTasks;
use yii\web\Controller;
use app\models\Tasks;
use yii\web\NotFoundHttpException;

class TasksController extends Controller
{

    public function actionIndex()
    {

        $modelSearch = new SearchTasks();
        $dataProvider = $modelSearch->search($this->request->post());
        $categories = Categories::find()->all();

        return $this->render('index', [
            'modelSearch' => $modelSearch,
            'dataProvider' => $dataProvider,
            'categories' => $categories
        ]);

    }

    public function actionView($id)
    {
        $replies = Replies::find()->where(['task_id' => $id])->all();
        $singleTask = Tasks::find()->where(['id' => $id])->one();

        $cat_id = $singleTask->category_id;
        $categoryTask = Categories::find()->where(['id' => $cat_id])->one();
        return $this->render('single-task', ['singleTask' => $singleTask, 'categoryTask' => $categoryTask, 'replies' => $replies]);

    }
}
