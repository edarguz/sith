<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Tipotitulo */

$this->title = $model->id_tipotitulo;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tipotitulos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipotitulo-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Actualizar'), ['update', 'id' => $model->id_tipotitulo], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Eliminar'), ['delete', 'id' => $model->id_tipotitulo], [
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
            'id_tipotitulo',
            'tipotitulo',
            'vr_hora',
        ],
    ]) ?>

</div>
