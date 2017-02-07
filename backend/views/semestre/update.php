<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Semestre */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Semestre',
]) . ' ' . $model->id_semestre;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Semestres'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_semestre, 'url' => ['view', 'id' => $model->id_semestre]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="semestre-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
