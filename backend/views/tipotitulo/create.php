<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Tipotitulo */

$this->title = Yii::t('app', 'Crear Tipo titulo');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tipotitulos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipotitulo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
