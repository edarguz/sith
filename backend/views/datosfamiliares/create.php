<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Datosfamiliares */

$this->title = Yii::t('app', 'Crear Datos familiares');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Datosfamiliares'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="datosfamiliares-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelsDatosfamiliares' => $modelsDatosfamiliares,
    ]) ?>

</div>
