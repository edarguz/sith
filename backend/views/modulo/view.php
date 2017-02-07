<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Modulo */

$this->title = $model->id_modulo;
$this->params['breadcrumbs'][] = ['label' => 'Modulos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="modulo-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_modulo], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_modulo], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_modulo',
            'modulo',
            'creditos',
            'id_programa',
        ],
    ]) ?>

</div>
