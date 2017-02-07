<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Estadocivil */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Estadocivil',
]) . ' ' . $model->id_estado_civil;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Estadocivils'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_estado_civil, 'url' => ['view', 'id' => $model->id_estado_civil]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="estadocivil-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
