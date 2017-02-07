<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Periodoacademico */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Periodoacademico',
]) . ' ' . $model->id_periodo_academico;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Periodoacademicos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_periodo_academico, 'url' => ['view', 'id' => $model->id_periodo_academico]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="periodoacademico-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
