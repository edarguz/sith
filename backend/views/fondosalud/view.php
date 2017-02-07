<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Fondosalud */

$this->title = $model->id_fondo_salud;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Fondosaluds'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fondosalud-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id_fondo_salud], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id_fondo_salud], [
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
            'id_fondo_salud',
            'fondo_salud',
        ],
    ]) ?>

</div>
