<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Tasks5]].
 *
 * @see Tasks5
 */
class TasksQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Tasks5[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Tasks5|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    public function searchName (string $value) {
        return $this->andWhere(['like', 'name', $value]);
    }

}
