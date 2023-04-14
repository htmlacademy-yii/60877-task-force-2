<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[UserRating]].
 *
 * @see UserRating
 */
class UserRatingQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return UserRating[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return UserRating|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
