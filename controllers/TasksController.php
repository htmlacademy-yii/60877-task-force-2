<?php

namespace app\controllers;

use app\models\AddTask;
use app\models\Category;
use app\models\Replies;
use app\models\SearchTasks;
use app\models\Task;
use app\models\TasksReply;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;

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
                            return \Yii::$app->user->identity->user_status === User::EXECUTOR;
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
        $request  = \Yii::$app->request;

        $reply_status = $request->get('reply');


        $currentReply = TasksReply::find()->where(['task_id'=>$task->id])->one();

        if ($reply_status==='success') {
            $currentReply->status=1;
            $currentReply->getErrors();
            $currentReply->save();
        }
        else {
            $currentReply->status=0;
            $currentReply->getErrors();
            $currentReply->save();
        }

        $currentUserStatus = User::find()->where(['id' => $task->user_id])->one();
        return $this->render('single-task', ['task' => $task, 'currentUserStatus'=>$currentUserStatus]);
    }

    public function actionAdd()
    {
        $categories = Category::find()->all();
        $model = new AddTask();


        if ($model->load(\Yii::$app->request->post()) && $model->validate()) {


            $task = $model->createNewTask();
            \Yii::$app->response->redirect(['/tasks/view/', 'id' => $task->id]);
        }


        return $this->render('add', ['model' => $model, 'categories' => $categories]);
    }



}


