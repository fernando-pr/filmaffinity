<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View;
/* @var $this yii\web\View */
/* @var $model app\models\AlquilerForm */
/* @var $form ActiveForm */
/* @var $alquileres Alquiler[] */
$this->title = 'Peliculas';
$this->params['breadcrumbs'][] = $this->title;
$url = Url::to(['peliculas/peliculas']);
$urlActual = Url::to('');
$js = <<<EOT
    $('#buscarform-titulo').keyup(function() {
        var q = $('#buscarform-titulo').val();
        if (q == '') {
            $('#peliculas').html('');
        }

        $.ajax({
            method: 'GET',
            url: '$url',
            data: {
                q: q
            },
            success: function (data, status, event) {
                $('#peliculas').html(data);

            }
        });
    });
EOT;
$this->registerJs($js);
?>
<div class="peliculas-buscar">
    <?php $form = ActiveForm::begin([
        'method' => 'get',
        'action' => ['peliculas/buscar'],
    ]); ?>
    <?= $form->field($model, 'titulo') ?>
    <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
<div id="peliculas">
</div>
