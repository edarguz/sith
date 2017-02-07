<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Labordocente */

$this->title = Yii::t('app', '');

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Labor docente'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="labordocente-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelsLabordocente' => $modelsLabordocente,

    ]) ?>

</div>
