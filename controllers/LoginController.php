<?php

namespace app\controllers;

use app\models\LoginForm;
use yii\web\Controller;
use yii\web\Response;
use yii\widgets\ActiveForm;
use yii\filters\AccessControl;

class LoginController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['index'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index'],
                        'roles' => ['?']
                    ]
                ]
            ]
        ];
    }

    public function actionIndex()
    {
        $this->layout = 'landing';
        $loginForm = new LoginForm();

        if (\Yii::$app->request->getIsPost()&&$loginForm->load(\Yii::$app->request->post())) {
           if (\Yii::$app->request->isAjax) {
            \Yii::$app->response->format = Response::FORMAT_JSON;

              return ActiveForm::validate($loginForm);
            }
            if ($loginForm->validate()) {

                $user = $loginForm->getUser();
                \Yii::$app->user->login($user);

                return $this->goHome();
            }
        }


        return $this->render('index', ['loginForm' => $loginForm]);
    }
}