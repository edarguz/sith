<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Funcionario */

$this->title = Yii::t('app', 'Nuevo Funcionario');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Funcionarios'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="funcionario-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
