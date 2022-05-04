<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\Tasks;

class TasksController extends Controller
{
    public function actionIndex()
    {
        $tasks = Tasks::find()->limit(5)->all();

        if (is_null($tasks)) {
            throw new Exception("нет тасков!");
        }
        return $this->render('index');
    }
}
