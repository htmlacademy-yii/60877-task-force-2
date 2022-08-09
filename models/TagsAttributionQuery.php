<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[TagsAttribution]].
 *
 * @see TagsAttribution
 */
class TagsAttributionQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return TagsAttribution[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return TagsAttribution|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
