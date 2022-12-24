<?php

namespace app\models;

use SebastianBergmann\Type\NullType;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Task;

/**
 * SearchTasks represents the model behind the search form of `app\models\Tasks`.
 * @property array $categories;
 */
class SearchTasks extends Task
{
    public $categories = [];
    public $taskPeriod = 0;
    public $without_author;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [

            [['taskPeriod'], 'integer'],
            [['without_author'], 'string'],

            [['categories'], 'filter', 'filter' => 'array_filter']

        ];
    }


    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $this->load($params);
        $query = self::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->where(['status' => 'new'])->orderBy('create_at DESC');

        $query->andFilterWhere(['category_id' => $this->categories]);

        if ($this->without_author === '1') {

            $query->where(['user_id' => null]);
        }


        if ($this->taskPeriod !== 0) {
            $query->andFilterWhere(['<', 'create_at', time() - $this->taskPeriod]);
        }


        return $dataProvider;
    }
}
