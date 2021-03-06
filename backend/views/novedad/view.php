<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Novedad */

$this->title = $model->id_novedad;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Novedads'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="novedad-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id_novedad], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id_novedad], [
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
            'id_novedad',
            'id_tipo_novedad',
            'fecha_inicio',
            'fecha_fin',
            'id_funcionario',
            'observaciones',
        ],
    ]) ?>

</div>
