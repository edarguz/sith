<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Fondosalud */

$this->title = Yii::t('app', 'Actualizar {modelClass}: ', [
    'modelClass' => 'Fondosalud',
]) . ' ' . $model->id_fondo_salud;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Fondosaluds'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_fondo_salud, 'url' => ['view', 'id' => $model->id_fondo_salud]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="fondosalud-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
