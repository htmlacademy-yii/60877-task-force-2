<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[UserReplies]].
 *
 * @see UserReplies
 */
class UserRepliesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return UserReplies[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return UserReplies|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
