<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Tipofuncionario */

$this->title = Yii::t('app', 'Crear Tipo funcionario');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tipofuncionarios'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipofuncionario-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
