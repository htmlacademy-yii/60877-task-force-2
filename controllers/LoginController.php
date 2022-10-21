<?php

namespace app\controllers;

use app\models\LoginForm;
use yii\db\Exception;
use yii\web\Controller;
use yii\web\Response;
use yii\widgets\ActiveForm;

class LoginController extends Controller
{
    public $layout = 'landing';

    public function actionIndex()
    {
        $loginForm = new LoginForm();

        if (\Yii::$app->request->getIsPost()&&$loginForm->load(\Yii::$app->request->post())) {
           if (\Yii::$app->request->isAjax && $loginForm->load(\Yii::$app->request->post())) {
            \Yii::$app->response->format = Response::FORMAT_JSON;

              return ActiveForm::validate($loginForm);
            }
            if ($loginForm->validate()) {

                $user = $loginForm->getUser();
                \Yii::$app->user->login($user);

                return $this->goHome();
            }
            else {
                throw new Exception("Не удалось авторизоваться!");
            }
        }


        return $this->render('index', ['loginForm' => $loginForm]);
    }
}