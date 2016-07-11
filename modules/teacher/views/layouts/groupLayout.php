<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->beginContent('@app/views/layouts/main.php');
?>

<?php
$dataProvider = $GLOBALS['groupData'];
?>


<div class="row">
    <div class="col-lg-7">
        <div id="content">
            <?php echo $content; ?>
        </div>
    </div>
    <div class="col-lg-5" >
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12" style=" border-bottom: 1px solid #cccccc;">
                         <?= Html::a('All students', ['student/index'], ['class' => 'pull-right btn btn-default', 'title' => 'All Students']) ?>
                        <?= Html::a('All exams', ['exam/index'], ['class' => 'pull-right btn btn-default', 'title' => 'All exams']) ?>
                    </div>
                </div>

                <h3>Your groups</h3>
                <p class="pull-right">

                    <?= Html::a('<i class="glyphicon glyphicon-plus"></i>', ['group/create'], ['title' => 'Create new group', 'class' => 'btn btn-default'])
                    ?>

                </p>

                <?=
                GridView::widget([
                    'dataProvider' => $dataProvider,
                    // 'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        'id',
                        [
                            'label' => 'name',
                            'format' => 'raw',
                            // here comes the problem - instead of parent_region I need to have parent
                            'value' => function ($dataProvider) {
                                return Html::a($dataProvider->title, yii\helpers\Url::to(['group/view', 'id' => $dataProvider->id]));
                            },
                        ],
                        'description:ntext',
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
                                    $url = yii\helpers\Url::toRoute(['group/view', 'id' => $key]);
                                    return $url;
                                }

                                if ($action === 'update') {
                                    $url = yii\helpers\Url::toRoute(['group/update', 'id' => $key]);
                                    return $url;
                                }
                                if ($action === 'delete') {
                                    $url = yii\helpers\Url::toRoute(['group/delete', 'id' => $key]);
                                    return $url;
                                }
                            }
                                ],
                            ],
                                ]);
                                ?>
                            </div>
                        </div>

                    </div>













                    <?php $this->endContent(); ?>