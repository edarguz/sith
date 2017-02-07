<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Datosacademicos */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Datosacademicos',
]) . ' ' . $model->id_datos_acad;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Datosacademicos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_datos_acad, 'url' => ['view', 'id' => $model->id_datos_acad]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="datosacademicos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
