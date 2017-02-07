<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Contrato */

$this->title = Yii::t('app', 'Agregar Contrato');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Contratos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contrato-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
