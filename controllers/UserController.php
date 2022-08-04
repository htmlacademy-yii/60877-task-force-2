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

/*        $rating =
            (new \yii\db\Query())->select(['id', 'rate', '@curRank :=@curRank + 1 AS rank'])
            ->from(['user_replies', 'q' => 'SELECT @curRank:=0'])
            ->where(['user_id' => $id])->orderBy(['rate' => SORT_DESC]);*/

        $rating = Yii::$app->db->createCommand("SELECT * FROM (SELECT *, (@position:=@position+1) as rate FROM (SELECT user_id,
       SUM(rate) / COUNT(rate) as pts
FROM user_replies, (SELECT @position:=0) as a
GROUP BY user_id
ORDER BY pts DESC) AS subselect) as general WHERE  user_id = $id")
           ->queryOne();


        return $this->render('index',
            [
                'singleUser' => $singleUser,
                'rating' => $rating
            ]
        );

    }
}
