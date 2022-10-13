<?php


namespace app\controllers;

use yii\web\Controller;
use app\models\Users;
use app\models\Register;
use app\models\City;
use Yii;

class RegisterController extends Controller
{
    public function actionIndex()
    {

        $register = new Register();

        //  $cities = \app\models\Cities::find()->select('city')->indexBy('city')->column();

        $cities = City::find()->asArray()->all();

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
            }
        } else {
            return $this->render('index', ['register' => $register, 'cities' => $cities]); // а если нет то на ту же страницу попадаем
        }


    }
}