<?php


namespace app\controllers;

use yii\web\Controller;
use app\models\Register;
use Yii;
class RegisterController extends Controller
{
    public function actionIndex()
    {
        $register = new Register();
        $register->load(\Yii::$app->request->post());
        if ($register->validate()) {
            $register->dt_add = time();
            $register->save();
            return Yii::$app->response->redirect(['tasks']);
        }
        return $this->render('index', ['register' => $register]);

    }
}