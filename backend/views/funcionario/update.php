<?php

use yii\helpers\Html;
use kartik\checkbox\CheckboxX;
use kartik\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Funcionario */

$this->title = Yii::t('app', 'Actualizar {modelClass}: ', [
    'modelClass' => 'Funcionario',
]) . $model->id_funcionario;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Funcionarios'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_funcionario, 'url' => ['view', 'id' => $model->id_funcionario]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="funcionario-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
