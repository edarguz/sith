<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Tipotitulo */

$this->title = Yii::t('app', 'Actualizar {modelClass}: ', [
    'modelClass' => 'Tipotitulo',
]) . ' ' . $model->id_tipotitulo;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tipo titulo'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_tipotitulo, 'url' => ['view', 'id' => $model->id_tipotitulo]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Actualizar');
?>
<div class="tipotitulo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
