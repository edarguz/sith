<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Tiponovedad */

$this->title = Yii::t('app', 'Actualizar {modelClass}: ', [
    'modelClass' => 'Tiponovedad',
]) . ' ' . $model->id_tipo_novedad;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tiponovedad'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_tipo_novedad, 'url' => ['view', 'id' => $model->id_tipo_novedad]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="tiponovedad-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
