<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Contrato */

$this->title = Yii::t('app', 'Actualizar {modelClass}: ', [
    'modelClass' => 'Contrato',
]) . ' ' . $model->id_contrato;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Contratos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_contrato, 'url' => ['view', 'id' => $model->id_contrato]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Actualizar');
?>
<div class="contrato-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
