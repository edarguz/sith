<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Cargo */

$this->title = Yii::t('app', 'Actualizar {modelClass}: ', [
    'modelClass' => 'Cargo',
]) . ' ' . $model->id_cargo;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cargos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_cargo, 'url' => ['view', 'id' => $model->id_cargo]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="cargo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
