<?php

namespace app\modules\teacher\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\teacher\models\ExamsQuestions;

/**
 * ExamQuestionSearch represents the model behind the search form about `app\modules\teacher\models\ExamsQuestions`.
 */
class ExamQuestionSearch extends ExamsQuestions
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
    
      public function searchExamsForTeacher($params , $exam_id)
    {
//        $query =\app\modules\teacher\models\Question::find()
//                        ->join('inner join', 'exams_questions', 'exams_questions.question_id = question.id')
//                        ->join('inner join', 'exams', 'exams_questions.exam_id = '.$id);
           $query =  ExamsQuestions::find()->where(['exam_id' => $exam_id]);
           
           //$c = new ExamsQuestions();
          
          // print_r($query[0]->question);
                       


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
