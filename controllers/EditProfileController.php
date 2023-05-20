<?php

namespace app\controllers;

use app\models\Categories;
use app\models\Category;
use app\models\EditProfile;
use app\models\User;
use yii\web\Controller;
use Yii;

class EditProfileController extends SecuredController
{
    public function actionIndex()
    {
        $model = new EditProfile();

        $id = \Yii::$app->user->id;
        $user = User::find()->where(['id' => $id])->one();

        $categories = Category::find()->all();
        $request = Yii::$app->request;
        $post = $request->post();

        if ($model->load($post) && $model->validate()) {

            $user->name = $model->name;
            $user->email = $model->email;
            $user->dt_add = date("Y-m-d");
            $user->date_of_birth = $model->date_of_birth;
            $user->phone = $model->phone;
            $user->telegram = $model->telegram;
            $user->quote = $model->quote;
            if ($user->save()) {
                return $this->redirect('tasks');
            }
            else {
                var_dump($user->getErrors());
                exit();
            }
        }

        // Получаем связанные категории для текущего пользователя
        $categories = $user->categories;
        $categoryNames = array_map(function ($category) {
            return $category->name;
        }, $categories);

        return $this->render('index', ['model' => $model, 'user' => $user, 'categories' => $categories, 'categoryNames' => $categoryNames]);
    }

    /* public function actionIndex()
     {
         $categories = Category::find()->all();
         $model = new EditProfile();

         $id = \Yii::$app->user->id;
         $user = User::find()->where(['id' => $id])->one();
         $request = Yii::$app->request;
         $post = $request->post();


         if ($model->validate()) {

             $user->name = $model->name;
             $user->email = $model->email;
             $user->date_of_birth = $model->date_of_birth;
             $user->phone = $model->phone;
             $user->telegram = $model->telegram;
             $user->quote = $model->informationaboutperson;

             if ($user->save()) {

                 \Yii::$app->response->redirect('tasks');
             }
             else {
                 var_dump($user->getErrors());
                 exit();
             }
         }
         $userid = Yii::$app->user->identity->id;
         $user = User::find()->where(['id' => $userid])->one();

         if ($user) {
             $categories = $user->categories;
             $categoryNames = array_map(function ($category) {
                 return $category->name;
             }, $categories);
         }
         return $this->render('index', ['model' => $model, 'user' => $user, 'categories' => $categories, 'categoryNames' => $categoryNames]);
     }*/
}
