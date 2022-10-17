<?php

namespace app\controllers;

use app\models\Category;
use app\models\Replies;
use app\models\SearchTasks;
use yii\web\Controller;
use app\models\Task;
use yii\web\NotFoundHttpException;


class TasksController extends Controller
{

    public function actionIndex()
    {

        $modelSearch = new SearchTasks();
        $dataProvider = $modelSearch->search($this->request->post());
        $categories = Category::find()->all();

        return $this->render('index', [
            'modelSearch' => $modelSearch,
            'dataProvider' => $dataProvider,
            'categories' => $categories,
        ]);

    }

    public function actionView($id)
    {

        $task = Task::find()->where(['id' => $id])->one();
        if ($task === null) {
            throw new NotFoundHttpException("Нету такого таска!");
        }
        return $this->render('single-task', ['task' => $task]);

    }
}
