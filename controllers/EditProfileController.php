<?php

namespace app\controllers;

use app\models\Category;
use app\models\EditProfile;
use app\models\User;
use yii\web\Controller;
use Yii;

class EditProfileController extends SecuredController
{
    public function actionIndex()
    {
        $categories = Category::find()->all();
        $model = new EditProfile();

        $id = \Yii::$app->user->id;
        $user = User::find()->where(['id' => $id])->one();
       // $userModel = new User();

        if ($model->load(Yii::$app->request->post())&&$model->validate()) {
            $user->name = $model->name;
            $user->email = $model->email;
            $user->date_of_birth = $model->date_of_birth;
            $user->phone = $model->phone;
            $user->telegram = $model->telegram;
            $user->quote = $model->informationaboutperson;
            $user->save();
            \Yii::$app->response->redirect('tasks');
        } else {
            return $this->render('index', ['categories' => $categories, 'model' => $model, 'user' => $user]);
        }


    }
}
