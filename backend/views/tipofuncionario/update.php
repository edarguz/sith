<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Tipofuncionario */

$this->title = Yii::t('app', 'Actualizar {modelClass}: ', [
    'modelClass' => 'Tipofuncionario',
]) . ' ' . $model->id_tipo_funcionario;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tipofuncionario'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_tipo_funcionario, 'url' => ['view', 'id' => $model->id_tipo_funcionario]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="tipofuncionario-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
