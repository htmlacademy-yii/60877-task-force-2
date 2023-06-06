<?php

namespace app\controllers;

use app\models\Categories;
use app\models\Category;
use app\models\EditProfile;
use app\models\User;
use yii\web\Controller;
use yii\web\UploadedFile;
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

            $file = UploadedFile::getInstance($model, 'user_img');
            if ($file && $file->tempName) {
                if ($user->user_img) {
                    if (file_exists(Yii::getAlias('@webroot/uploads/' . $user->user_img))) {
                        unlink(Yii::getAlias('@webroot/uploads/' . $user->user_img));
                    }
                }
                $user->user_img = time() . '.' . $file->extension;
                $file->saveAs(Yii::getAlias('@webroot/uploads/' . $user->user_img));
            }


            if ($user->save()) {
                return $this->redirect('tasks');
            }

        }
        // Получаем связанные категории для текущего пользователя
        $categories = $user->categories;
        $categoryNames = array_map(function ($category) {
            return $category->name;
        }, $categories);

        return $this->render('index', ['model' => $model, 'user' => $user, 'categories' => $categories, 'categoryNames' => $categoryNames]);
    }
}
