<?php

namespace app\controllers;

use app\models\AddTask;
use app\models\AddTaskReply;
use app\models\Category;
use app\models\City;
use app\models\Files;
use app\models\Replies;
use app\models\SearchTasks;
use app\models\Task;
use app\models\TasksReply;
use app\models\TaskStatuses;
use yii\base\BaseObject;
use yii\db\Exception;
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

        $userModel = User::find()->where(['id' => $task->user_id])->one();
        $taskOwnerStatus = $userModel->user_status;


        $files = Files::find()->where(['tasks_id'=>Yii::$app->request->get('id')])->all();


        return $this->render('single-task', ['task' => $task, 'userModel' => $userModel, 'taskOwnerStatus' => $taskOwnerStatus, 'files'=>$files]);
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


    public function actionAddReply($id)
    {
        $taskModel = new AddTaskReply();//  у юзера статус исполнитель и таск в статусе new
        $userId = \Yii::$app->user->identity->id;
        $userCurrent = User::find()->where(['id' => $userId])->one();
        $userStatus = $userCurrent->user_status;
        $task = Task::find()->where(['id' => $id])->one();
        $taskStatus = $task->status;
        if ($taskModel->load(\Yii::$app->request->post()) && $taskModel->validate() && $userStatus === 'executor' && $taskStatus === 'new') { // доступно только исполнителю
            $newReply = new TasksReply();
            $newReply->dt_add = time();
            $newReply->rate = null;
            $newReply->description = $this->your_comment;
            $newReply->task_id = \Yii::$app->request->get('id');
            $newReply->price = $this->price;
            $newReply->user_id = \Yii::$app->user->identity->id;
            $newReply->price = $this->price;
            if ($newReply->save()) {
                $task->status = Task::STATUS_DONE;
                return $this->render('single-task');
            }
        }
    }

    public function actionRejectedtask($id)
    {
        $rejectedTask = Task::find()->where(['id' => $id])->one();
        if ($rejectedTask->status === 'new' && $rejectedTask->user_id = \Yii::$app->user->identity->id) {
            $rejectedTask->status = Task::STATUS_FAILED;
            $rejectedTask->update();
        } else {
            throw new \Exception('Не смогли отменить задание');
        }
        return $this->redirect('view/' . $id);
    }

    public function actionReplynotadd($task_id, $reply_id)
    {
        $task = Task::find()->where(['user_id' => \Yii::$app->user->identity->id])->one();

        $currentReply = TasksReply::find()->where(['id' => $reply_id])->one();
        $reply_status = $currentReply->status;
        $userModel = User::find()->where(['id' => $task->user_id])->one();
        if ($task->user_id === \Yii::$app->user->identity->id) {
            $currentReply->status = Task::STATUS_REJECTED;
            $currentReply->update();
        }
        return $this->render('single-task', ['reply_status' => $reply_status, 'task' => $task, 'userModel' => $userModel]);
    }

    public function actionTasksReplyAdd($id, $user_id)
    {
        $currentTask = Task::find()->where(['id' => $id])->one();
        if ($currentTask->user_id === \Yii::$app->user->identity->id) {
            $currentTask->executor_id = $user_id;
            $currentTask->status = Task::STATUS_INWORK;
            $currentTask->update();
        }

        return $this->redirect('view/' . $id);
    }

    public function actionFinishTask($id)
    {
        $authorofthetask = Task::find()->where(['id' => $id])->one();
        if ($authorofthetask->user_id === \Yii::$app->user->identity->id) {
            $authorofthetask->status = Task::STATUS_DONE;
            $authortaskid = $authorofthetask->user_id;
            $authorofthetask->update();
        }
        return $this->render('single-task', ['authortaskid' => $authortaskid]);
    }
}


