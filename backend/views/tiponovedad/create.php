<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Tiponovedad */

$this->title = Yii::t('app', 'Crear Tipo novedad');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tipo novedad'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tiponovedad-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
