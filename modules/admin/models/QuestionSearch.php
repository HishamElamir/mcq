<?php

namespace app\modules\admin\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\Question;

/**
 * QuestionSearch represents the model behind the search form about `app\modules\admin\models\Question`.
 */
class QuestionSearch extends Question
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'teacher_id'], 'integer'],
            [['q_title', 'ans_a', 'ans_b', 'ans_c', 'ans_d', 'ans_e', 'correct_ans', 'description', 'createed_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Question::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'teacher_id' => $this->teacher_id,
            'createed_at' => $this->createed_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'q_title', $this->q_title])
            ->andFilterWhere(['like', 'ans_a', $this->ans_a])
            ->andFilterWhere(['like', 'ans_b', $this->ans_b])
            ->andFilterWhere(['like', 'ans_c', $this->ans_c])
            ->andFilterWhere(['like', 'ans_d', $this->ans_d])
            ->andFilterWhere(['like', 'ans_e', $this->ans_e])
            ->andFilterWhere(['like', 'correct_ans', $this->correct_ans])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
