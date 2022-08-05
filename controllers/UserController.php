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
        $rating = Yii::$app->db->createCommand("SELECT * FROM (SELECT *, (@position:=@position+1) as rate FROM (SELECT executor_id,
        SUM(rate) / COUNT(rate) as pts
        FROM user_replies, (SELECT @position:=0) as a
        GROUP BY executor_id
        ORDER BY pts DESC) AS subselect) as general WHERE  executor_id = $id")->queryOne();


        return $this->render('index',
            [
                'singleUser' => $singleUser,
                'rating' => $rating,
                'numberReplies' => $numberReplies
            ]
        );

    }
}
