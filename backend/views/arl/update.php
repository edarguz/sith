<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Arl */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Arl',
]) . ' ' . $model->id_arl;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Arls'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_arl, 'url' => ['view', 'id' => $model->id_arl]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="arl-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
