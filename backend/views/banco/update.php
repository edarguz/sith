<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Banco */

$this->title = Yii::t('app', 'Actualizar {modelClass}: ', [
    'modelClass' => 'Banco',
]) . ' ' . $model->id_banco;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bancos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_banco, 'url' => ['view', 'id' => $model->id_banco]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Actualizar');
?>
<div class="banco-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
