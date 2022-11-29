<?php

namespace app\controllers;

use app\models\AddTask;
use app\models\Category;
use app\models\Files;
use app\models\Replies;
use app\models\SearchTasks;
use app\models\Task;
use Codeception\Step\Executor;
use yii\base\BaseObject;
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
                            $user = \Yii::$app->user->identity->user_status;

                            $user_status = $user->user_status;
                            $user_constant = User::EXECUTOR;
                            return $user_status === $user_constant;
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


        $categories = Category::find()->all();
        $model = new AddTask();

        if ($model->load(\Yii::$app->request->post()) && $model->validate()) {

            /*начинаю сохранять в БД данные с формы*/


            /*  $newTask->name = $model->about_job;

              $newTask->description = $model->describe_task;
              $newTask->category_id = $model->categories;
              $newTask->address = $model->location; // в $model->location null

              $newTask->budget = $model->budget;

              $newTask->expire = $model->expire_date;
              $newTask->create_at = date('Y-m-d h-m-s');
              $newTask->status = 1;
              $newTask->user_id = \Yii::$app->user->identity->id;

              $newTask->save();

              $instances = UploadedFile::getInstances($model, 'files');

              foreach ($instances as $instance) {
                  $files = new Files();
                  $instance->saveAs("uploads/".$instance->name);
                  $files->tasks_id = $newTask->id;
                  $files->files_name = $instance->name;
                  $files->save();
              }*/
            /*окончил сохранение*/
            /*заканчиваю сохранять данные с формы */
            $newTask = new Task();
            $connection = $newTask->getDb();
            $transaction = $connection->beginTransaction();
            try {
              $task_after_save =  $model->createNewTask();
                $model->saveFile($task_after_save);

                /*

                 foreach ($instances as $instance) {
                     $files = new Files();
                     $instance->saveAs("uploads/" . $instance->name);
                     $files->tasks_id = $newTask->id;
                     $files->files_name = $instance->name;
                     $files->save();
                 }*/
                $transaction->commit();
            } catch (\Exception $e) {
                $transaction->rollBack();
                throw $e;
            } catch (\Throwable $e) {
                $transaction->rollBack();
                throw $e;
            }
        }


        return $this->render('add', ['model' => $model, 'categories' => $categories]);
    }

}


