<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Facultad */

$this->title = Yii::t('app', 'Actualizar {modelClass}: ', [
    'modelClass' => 'Facultad',
]) . ' ' . $model->id_facultad;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Facultads'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_facultad, 'url' => ['view', 'id' => $model->id_facultad]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="facultad-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>