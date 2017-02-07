<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Cursoextension */

$this->title = Yii::t('app', 'Create Cursoextension');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cursoextensions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cursoextension-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
