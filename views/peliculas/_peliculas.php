<?= \yii\grid\GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        'titulo',
        'sipnosis'
    ],
    'tableOptions' => [
        'class' => 'table table-bordered table-hover',
    ],
]);
?>
