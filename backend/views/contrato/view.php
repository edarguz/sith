<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Contrato */

$this->title = $model->id_contrato;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Contratos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contrato-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Actualizar'), ['update', 'id' => $model->id_contrato], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Eminar'), ['delete', 'id' => $model->id_contrato], [
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
            'id_cargo',
            'supervisor',
            'id_area',
            'forma_pago',
            'num_cuotas',
            'id_fondosalud',
            'id_arl',
            'id_fondopensiones',
        ],
    ]) ?>

</div>
