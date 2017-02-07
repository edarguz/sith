<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Fondopensiones */

$this->title = $model->id_fondo_pensiones;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Fondo de pensiones'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fondopensiones-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Actualizar'), ['update', 'id' => $model->id_fondo_pensiones], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Eliminar'), ['delete', 'id' => $model->id_fondo_pensiones], [
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
            'id_fondo_pensiones',
            'fondo_pensiones',
        ],
    ]) ?>

</div>
