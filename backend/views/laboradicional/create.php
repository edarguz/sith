<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Laboradicional */

$this->title = Yii::t('app', 'Nueva Labor adicional');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Labor adicional '), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="laboradicional-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
