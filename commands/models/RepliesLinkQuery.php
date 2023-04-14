<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[RepliesLink]].
 *
 * @see RepliesLink
 */
class RepliesLinkQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return RepliesLink[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return RepliesLink|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
