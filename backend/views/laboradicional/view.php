<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Laboradicional */

$this->title = $model->id_laboradicional;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Laboradicionals'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="laboradicional-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id_laboradicional], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id_laboradicional], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_laboradicional',
            'id_funcionario',
            'id_programa',
            'id_facultad',
            'id_semestre',
            'id_modulo',
            'horas_sem',
            'id_tipotitulo',
            'vr_hora',
            'fecha_inicio',
            'fecha_fin',
            'id_periodo_academico',
            'vr_semestre',
        ],
    ]) ?>

</div>
