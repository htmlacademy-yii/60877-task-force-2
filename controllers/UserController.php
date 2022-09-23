<?php

namespace app\controllers;

use app\models\UserRating;
use app\models\UserReplies;
use app\models\Users;
use yii\web\Controller;
use app\models\Tasks;
use app\models\Replies;
use Yii;
use yii\web\NotFoundHttpException;

class UserController extends Controller
{
    public function actionView($id)
    {
        $singleUser = Users::find()->where(['id' => $id])->one();
        if ($singleUser === null) {
            throw new NotFoundHttpException("Нету такого юзера!");
        }

        if ($singleUser->user_status !== 'executor') {
            throw new NotFoundHttpException("Юзер не является исполнителем!");
        }

        $numberReplies = UserReplies::find()->where(['executor_id' => $id])->count();

        return $this->render('index',
            [
                'singleUser' => $singleUser,
                'numberReplies' => $numberReplies
            ]
        );

    }

    public function actionLogout()
    {
        \Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionProfile()
    {
        if ($id = \Yii::$app->user->getId()) {
            $user = User::findOne($id);

            print($user->email);
        }
    }
}
