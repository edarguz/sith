<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Jornada */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Jornada',
]) . ' ' . $model->id_jornada;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Jornadas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_jornada, 'url' => ['view', 'id' => $model->id_jornada]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="jornada-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
