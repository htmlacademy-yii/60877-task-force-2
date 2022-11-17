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
use app\models\User;

class TasksController extends SecuredController
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@']
                    ],
                    [
                        'allow' => false,
                        'actions' => ['add'],
                        'matchCallback' => function ($rule, $action) {
                            $user = User::find()->where(['id' => \Yii::$app->user->getId()])->one();
                            $user_status = $user->user_status;
                            return $user_status === 'customer';
                        }
                    ]
                ]
            ]
        ];
    }

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

        $files = new Files();

        if ($model->load(\Yii::$app->request->post()) && $model->validate()) {
            $newTask = new Task();
            if ($files !== null || $files !== '') {

                foreach ($files as $file) {
                    $file->files_name = UploadedFile::getInstances($model, 'files');
                    $file->save();
                }


            }
            $newTask->description = $model->about_job;
            $newTask->name = $model->name;

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


