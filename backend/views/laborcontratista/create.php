<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Laborcontratista */

$this->title = Yii::t('app', 'Nueva Labor contratista');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Labor contratista'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="laborcontratista-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
