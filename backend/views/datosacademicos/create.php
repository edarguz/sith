<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Datosacademicos */

$this->title = Yii::t('app', 'Agregar Datos Académicos');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Datosacademicos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="datosacademicos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelsDatosacademicos' => $modelsDatosacademicos,
    ]) ?>

</div>
