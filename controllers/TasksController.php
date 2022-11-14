<?php

namespace app\controllers;

use app\models\AddTask;
use app\models\Category;
use app\models\Files;
use app\models\Replies;
use app\models\SearchTasks;
use app\models\Task;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use yii\web\UploadedFile;


class TasksController extends SecuredController
{
    public $files;

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

    public function actionAdd()
    {
        $model = new AddTask();
        $categories = Category::find()->all();
        $newTask = new Task();
        $files = new Files();
        if ($model->load(\Yii::$app->request->post()) && $model->validate()) {

            if ($files !== null || $files !== '') {

                    $files->files_name = UploadedFile::getInstances($model, 'files');
                }
            }
            $newTask->description = $model->about_job;
            $newTask->describe_task = $model->name;
            $newTask->category_id = $model->categories;
            $newTask->address = $model->location;
            $newTask->budget = $model->budget;
            $newTask->expire = $model->expire_date;
            $newTask->save();
        } else {
            return $this->render('add', ['model' => $model, 'categories' => $categories]);
        }


    }

}
