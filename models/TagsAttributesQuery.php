<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[TagsAttributes]].
 *
 * @see TagsAttributes
 */
class TagsAttributesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return TagsAttributes[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return TagsAttributes|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
