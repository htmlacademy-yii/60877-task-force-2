<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Tasks;

/**
 * SearchTasks represents the model behind the search form of `app\models\Tasks`.
 * @property array $categories;
 */
class SearchTasks extends Tasks
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
            [['categories'], 'safe'],
            [['taskPeriod'], 'integer'],
            [['without_author'], 'string'],
            ['categories', function ($attribute, $params) {
                $this->categories = array_filter($this->categories);
            }],
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

        /*$this->categories = $this->categories->validate();*/
        /*$this->categories = array_flip($this->categories);
        unset($this->categories[0]);
        $this->categories = array_flip($this->categories);*/

        $query->where(['status' => 1])->orderBy('dt_add DESC');

        if ($this->without_author === '1') {
            $query->andFilterWhere(['user_id' => 0]);
        }
        $query->andFilterWhere(['category_id' => $this->categories])->andFilterWhere(['user_id' => 1]);

        if ($this->taskPeriod !== 0) {
            $query->andFilterWhere(['<', 'dt_add', time() - $this->taskPeriod]);
        }


        return $dataProvider;
    }
}
