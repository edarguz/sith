<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Labordocente */

$this->title = $model->id_labor;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Labordocente'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="labordocente-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Actualizar'), ['Actualizar', 'id' => $model->id_labor], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Eliminar'), ['Eleminar', 'id' => $model->id_labor], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', '¿Seguro que quieres eliminar este item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_labor',
            'id_facultad',
            'id_programa',
            'id_modulo',
            'id_jornada',
            'id_funcionario',
            'id_tipotitulo',
            'horas_semanales',
            'horas_trabajo_grado',
            'horas_examenes_finales',
            'horas_reunion_general',
            'horas_reunion_facultad',
            'horas_jurado_grado',
            'id_periodo_academico',
            'id_semestre',
            'vr_hora',
            'observaciones'


        ],
    ]) ?>

</div>
