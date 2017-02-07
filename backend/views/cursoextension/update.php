<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Cursoextension */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Cursoextension',
]) . ' ' . $model->id_curso_extension;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cursoextensions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_curso_extension, 'url' => ['view', 'id' => $model->id_curso_extension]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="cursoextension-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
