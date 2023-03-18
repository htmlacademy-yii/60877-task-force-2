<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[TagsAttribute]].
 *
 * @see TagsAttribute
 */
class TagsAttributeQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return TagsAttribute[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return TagsAttribute|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
