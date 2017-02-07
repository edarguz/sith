<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Fondopensiones */

//$this->title = Yii::t('app', 'Fondo de pensiones');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Fondo de pensiones'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fondopensiones-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
