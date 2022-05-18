<?php

namespace app\controllers;

use app\models\Categories;
use yii\web\Controller;
use app\models\Tasks;
use yii\web\NotFoundHttpException;

class TasksController extends Controller
{
    public function actionIndex()
    {
        $tasks = Tasks::find()->where(['status'=>1])->orderBy('dt_add DESC')->all();

        if (is_null($tasks)) {
            throw new NotFoundHttpException("нет тасков!");
        }
        return $this->render('index', [
            'tasks' => $tasks,
        ]);
    }
}
