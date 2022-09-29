<?php


namespace app\controllers;

use yii\web\Controller;
use app\models\Users;
use app\models\Register;
use app\models\Cities;
use Yii;

class RegisterController extends Controller
{
    public function actionIndex()
    {

        $register = new Register();
        $cities = Cities::find()->all();

        if ($register->load(\Yii::$app->request->post()) & $register->validate()) { // если данные проходят валидацию то делаем дальше

            $users = new Users();
            $users->name = $register->name;
            $users->email = $register->email;
            $users->city = $register->city;
            $users->dt_add = time();
            $users->answer_orders = $register->answer_orders;
            $users->password_hash = Yii::$app->getSecurity()->generatePasswordHash($register->password); // а в поле пароля хэшированное значение

            if ($users->save()) {
                return Yii::$app->response->redirect(['tasks']); // если успех то на страницу с тасками
            } else {
                var_dump($users->getErrors());
            }
        } else {
            return $this->render('index', ['register' => $register]); // а если нет то на ту же страницу попадаем
        }


    }
}