<?php
namespace app\controllers;
use Yii;
use yii\db\Query;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

class TasksController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}
