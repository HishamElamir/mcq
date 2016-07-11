<?php

namespace app\modules\admin\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\GroupExams;

/**
 * GroupExamsSearch represents the model behind the search form about `app\modules\admin\models\GroupExams`.
 */
class GroupExamsSearch extends GroupExams
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'exam_id', 'course_id'], 'integer'],
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
        $query = GroupExams::find();

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
            'exam_id' => $this->exam_id,
            'course_id' => $this->course_id,
        ]);

        return $dataProvider;
    }
}
