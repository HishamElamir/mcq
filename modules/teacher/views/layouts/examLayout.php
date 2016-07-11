<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->beginContent('@app/views/layouts/main.php');
?>

<?php
$dataProvider = $GLOBALS['examData'];
?>


<div class="row">
    <div class="col-lg-7">
        <div id="content">
            <?php echo $content; ?>
        </div>
    </div>
    <div class="col-lg-5" style=" border-top: 1px solid #cccccc;">

        <?php // echo $this->render('_search', ['model' => $searchModel]);   ?>

        <p >
            
        </p>
        
        <p >
            <?php echo Html::a('All questions', ['question/index'], ['class' => 'btn btn-default pull-right', 'title' => 'Display all Questions'])
            ?>
        </p>
        <p >
            <?php echo Html::a('All groups', ['group/index'], ['class' => 'btn btn-default pull-right', 'title' => 'Display all Questions'])
            ?>
        </p>

        <h3 >
            Exams
        </h3>

        <p class="pull-right">
            <?= Html::a('<i class="glyphicon glyphicon-plus"></i>', ['exam/create'], ['title' => 'Create new Exams Questions', 'class' => 'btn btn-default'])
            ?>
        </p>

        <?=
        GridView::widget([
            'dataProvider' => $dataProvider,
            // 'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                // 'name',
                [
                    'label' => 'name',
                    'format' => 'raw',
                    // here comes the problem - instead of parent_region I need to have parent
                    'value' => function ($dataProvider) {
                        return Html::a($dataProvider->name, yii\helpers\Url::to(['exam-question/index', 'id' => $dataProvider->id]));
                    },
                        ],
                        [
                            'label' => 'assigned?',
                            'format' => 'raw',
                            // here comes the problem - instead of parent_region I need to have parent
                            'value' => function ($dataProvider) {
                                return Html::a('false', '/admin/region/view?id=' . $dataProvider->name);
                            },
                        ],
                        ['class' => 'yii\grid\ActionColumn',
                            'template' => '{view}{update}{delete}',
                            'buttons' => [
                                'view' => function ($url, $model) {
                                    return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
                                                'title' => Yii::t('app', 'view'),
                                                    ]
                                    );
                                },
                                    ],
                                    'urlCreator' => function ($action, $model, $key, $index) {
                                if ($action === 'view') {
                                    $url = yii\helpers\Url::toRoute(['exam/view', 'id' => $key]);
                                    return $url;
                                }

                                if ($action === 'update') {
                                    $url = yii\helpers\Url::toRoute(['exam/update', 'id' => $key]);
                                    return $url;
                                }
                                if ($action === 'delete') {
                                    $url = yii\helpers\Url::toRoute(['exam/delete', 'id' => $key]);
                                    return $url;
                                }
                            }
                                ],
                            ],
                        ]);
                        ?>
                    </div>
                </div>













                <?php $this->endContent(); ?>