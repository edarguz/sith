<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Modulo */

$this->title = Yii::t('app', 'Guardar Modulo');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Modulo'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="modulo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
