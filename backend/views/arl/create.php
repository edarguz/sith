<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Arl */

$this->title = Yii::t('app', 'Agregar Arl');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Arl'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="arl-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
