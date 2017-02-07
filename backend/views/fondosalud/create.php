<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Fondosalud */

$this->title = Yii::t('app', 'Agregar Fondosalud');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Fondo de salud'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fondosalud-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
