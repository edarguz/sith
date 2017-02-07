<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Tipofuncionario */

$this->title = $model->id_tipo_funcionario;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tipo funcionario'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipofuncionario-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id_tipo_funcionario], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id_tipo_funcionario], [
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
            'id_tipo_funcionario',
            'tipo_funcionario',
        ],
    ]) ?>

</div>
