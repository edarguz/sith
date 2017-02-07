<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Genero */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Genero',
]) . ' ' . $model->id_genero;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Generos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_genero, 'url' => ['view', 'id' => $model->id_genero]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="genero-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
