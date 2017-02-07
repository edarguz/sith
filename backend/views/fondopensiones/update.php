<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Fondopensiones */

$this->title = Yii::t('app', 'Actualizar {modelClass}: ', [
    'modelClass' => 'Fondo de pensiones',
]) . ' ' . $model->id_fondo_pensiones;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Fondo de pensiones'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_fondo_pensiones, 'url' => ['index', 'id' => $model->id_fondo_pensiones]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Actualizar');
?>
<div class="fondopensiones-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
