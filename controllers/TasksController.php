<?php

namespace app\controllers;

use app\models\AddTask;
use app\models\Category;
use app\models\City;
use app\models\Replies;
use app\models\SearchTasks;
use app\models\Task;
use app\models\TasksReply;
use app\models\TaskStatuses;
use yii\base\BaseObject;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use Yii;
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

        $currentUserStatus = User::find()->where(['id' => $task->user_id])->one();
        return $this->render('single-task', ['task' => $task, 'currentUserStatus' => $currentUserStatus]);
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


    public function actionAddReply()
    {
        $taskModel = new Task();
        if ($taskModel->load(\Yii::$app->request->post()) && $taskModel->validate()) { // если данные проходят валидацию то делаем дальше
            $newReply = new TasksReply();
            $newReply->dt_add = time();
            $newReply->rate = null;
            $newReply->description = $this->your_comment;
            $newReply->photo = \Yii::$app->user->identity->user_img;
            $newReply->task_id = \Yii::$app->request->get('id');
            $newReply->price = $this->price;
            $newReply->user_id = \Yii::$app->user->identity->id;
            $newReply->price = $this->price;
            if ($newReply->save()) {
                return $this->render('single-task');
            }
        }
    }

    public function actionRejectedtask($id)
    {
        $rejectedTask = TaskStatuses::find()->where(['task_id' => $id])->andWhere(['user_id' => \Yii::$app->user->identity->id])->one();
        $rejectedTask->status = 'finished';
        $rejectedTask->update();
        return $this->render('rejectedtask');
    }

    public function actionReplynotadd($id)
    {
        $currentReply = TasksReply::find()->where(['task_id' => $id])->one();
        $currentReply->status = 0;
        $currentReply->update();
        return $this->render('tasksreplyrejected');
    }

    public function actionFinishTask($id)
    {
        $authorofthetask = Task::find()->where(['id'=>$id])->one();
        $authorofthetask->status = 'done';
        $authorofthetask->update();
        $authortaskid = $authorofthetask->user_id;
        return $this->render('single-task', ['authortaskid'=>$authortaskid]);
    }
}


