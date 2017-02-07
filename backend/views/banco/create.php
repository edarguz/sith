<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Banco */

$this->title = Yii::t('app', 'Crear Banco');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bancos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="banco-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
