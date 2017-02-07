<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Rh */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Rh',
]) . ' ' . $model->id_rh;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Rhs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_rh, 'url' => ['view', 'id' => $model->id_rh]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="rh-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
