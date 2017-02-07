<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Programa */

$this->title = Yii::t('app', 'Actualizar {modelClass}: ', [
    'modelClass' => 'Programa',
]) . ' ' . $model->id_programa;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Programas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_programa, 'url' => ['view', 'id' => $model->id_programa]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="programa-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
