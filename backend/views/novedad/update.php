<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Novedad */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Novedad',
]) . ' ' . $model->id_novedad;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Novedads'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_novedad, 'url' => ['view', 'id' => $model->id_novedad]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="novedad-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
