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

            $users->email = $register->email;
            $users->name = $register->name;
            $users->password_hash= Yii::$app->getSecurity()->generatePasswordHash($register->password); // а в поле пароля хэшированное значение
            $users->dt_add = time();
            $users->user_img = 'man-blond.jpg';
            $users->quote = "Ukraine";
            $users->country = "Ukraine";
            $users->city = "Chernihiv";
            $users->age = 45;
            $users->telegram = "@newsUkraine";
            $users->status = 1;
            $users->user_status = 'executor';
            $users->answer_orders = 1;

            if ($users->save()) {
                return Yii::$app->response->redirect(['tasks']); // если успех то на страницу с тасками
            }

        } else {
            return $this->render('index', ['register' => $register]); // а если нет то на ту же страницу попадаем
        }


    }
}