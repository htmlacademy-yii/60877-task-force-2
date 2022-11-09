<?php

namespace app\controllers;

use app\models\AddTask;
use app\models\Category;
use app\models\Task;
use yii\helpers\ArrayHelper;
class AddTaskController extends SecuredController
{
    public function actionIndex()
    {
        $model = new AddTask();
        $categories = Category::find()->all();
        $newTask = new Task();
        if ($model->load(\Yii::$app->request->post()) && $model->validate()) {

            $newTask->description = $model->about_job;
            $newTask->describe_task = $model->name;
            $newTask->category_id = $model->categories;
            $newTask->address = $model->location;
            $newTask->budget = $model->budget;
            $newTask->expire = $model->expire_date;
            //$newTask->files = $model->
                $newTask->save();
        }
        return $this->render('index', ['model' => $model, 'categories'=>$categories]);


    }
}
