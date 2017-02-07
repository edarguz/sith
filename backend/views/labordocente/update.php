<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Labordocente */

$this->title = Yii::t('app', 'Actualizar {modelClass}: ', [
    'modelClass' => 'Labordocente',
]) . ' ' . $model->id_labor;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Labordocente'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_labor, 'url' => ['view', 'id' => $model->id_labor]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Actualizar');
?>
<div class="labordocente-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
