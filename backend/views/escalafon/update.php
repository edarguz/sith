<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Escalafon */

$this->title = Yii::t('app', 'Actualizar {modelClass}: ', [
    'modelClass' => 'Escalafon',
]) . ' ' . $model->id_escalafon;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Escalafons'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_escalafon, 'url' => ['view', 'id' => $model->id_escalafon]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="escalafon-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
