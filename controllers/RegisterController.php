<?php


namespace app\controllers;

use yii\web\Controller;
use app\models\Users;
use app\models\Register;
use Yii;

class RegisterController extends Controller
{
    public function actionIndex()
    {

        $register = new Register();

        if ($register->load(\Yii::$app->request->post()) && $register->validate()) { // если данные проходят валидацию то делаем дальше
            $users = new Users();
            $users->password_hash = Yii::$app->getSecurity()->generatePasswordHash($register->password); // а в поле пароля хэшированное значение
            $users->save(); // записываем все в модельку
            return Yii::$app->response->redirect(['tasks']); // если успех то на страницу с тасками
        } else {
            return $this->render('index', ['register' => $register]); // а если нет то на ту же страницу попадаем
        }


    }
}