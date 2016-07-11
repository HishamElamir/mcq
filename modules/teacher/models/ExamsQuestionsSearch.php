<?php

namespace app\modules\teacher\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\ExamsQuestions;

/**
 * ExamsQuestionsSearch represents the model behind the search form about `app\modules\admin\models\ExamsQuestions`.
 */
class ExamsQuestionsSearch extends ExamsQuestions
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'exam_id', 'question_id'], 'integer'],
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
        $query = ExamsQuestions::find();

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
            'question_id' => $this->question_id,
        ]);

        return $dataProvider;
    }
    
    public function searchExamsForTeacher($params , $id)
    {
        $query =\app\modules\teacher\models\Question::find()
                        ->join('inner join', 'exams_questions', 'exams_questions.question_id = question.id')
                        ->join('inner join', 'exams', 'exams_questions.exam_id = '.$id);

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
            'question_id' => $this->question_id,
        ]);

        return $dataProvider;
    }
}
