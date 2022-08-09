<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_rating".
 *
 * @property int $id
 * @property int $rating
 * @property int $user_id
 */
class UserRating extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_rating';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['rating', 'user_id'], 'required'],
            [['rating', 'user_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'rating' => Yii::t('app', 'Rating'),
            'user_id' => Yii::t('app', 'User ID'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return UserRatingQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserRatingQuery(get_called_class());
    }

   /* public function getUser()
    {
        return $this->hasOne(Users::class, ['id' => 'user_id']);
    }*/

        public function getUserAvgRating()
    {
        static $rating = null;

        if (is_null($rating)) {
            $ratings = [];
            foreach ($this->rating as $reply) {
                $ratings[] = $reply->rating;
            }
            $rating = array_sum($ratings) / count($ratings);
        }
        return $rating;
    }

}
