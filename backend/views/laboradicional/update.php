<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Laboradicional */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Laboradicional',
]) . $model->id_laboradicional;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Laboradicionals'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_laboradicional, 'url' => ['view', 'id' => $model->id_laboradicional]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="laboradicional-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
