<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Datosfamiliares */

$this->title = Yii::t('app', 'Actualizar {modelClass}: ', [
    'modelClass' => 'Datos familiares',
]) . ' ' . $model->id_datos_fam;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Datosfamiliares'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_datos_fam, 'url' => ['view', 'id' => $model->id_datos_fam]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="datosfamiliares-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
