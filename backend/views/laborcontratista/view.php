<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Laborcontratista */

$this->title = $model->id_contratista;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Laborcontratistas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="laborcontratista-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id_contratista], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id_contratista], [
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
           'id_contratista',
            'num_contrato',
            'id_funcionario',
            'valor_contrato',
            'cdp',
            'fecha_cdp',
            'fecha_suscripcion',
            'fecha_inicio',
            'fecha_fin',
            'fecha_registro',
            'objeto:ntext',
            'actividades:ntext',
            'id_tipotitulo',
            'cargo',
            'supervisor',
            'area',
            'forma_pago',
            'num_cuotas',
            'id_fondosalud',
            'id_arl',
            'id_fondopensiones',
           
        ],
    ]) ?>

</div>
