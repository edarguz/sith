<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Area */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Area',
]) . ' ' . $model->id_area;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Areas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_area, 'url' => ['view', 'id' => $model->id_area]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="area-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
