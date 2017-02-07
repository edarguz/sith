<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Laborcontratista */

$this->title = Yii::t('app', 'Actualizar {modelClass}: ', [
    'modelClass' => 'Laborcontratista',
]) . $model->id_contratista;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Laborcontratista'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_contratista, 'url' => ['view', 'id' => $model->id_contratista]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Actualizar');
?>
<div class="laborcontratista-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
