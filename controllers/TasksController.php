<?php

namespace app\controllers;

use app\models\Categories;
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
            'categories'=>$categories
        ]);

    }
}
