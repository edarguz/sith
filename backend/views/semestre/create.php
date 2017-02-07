<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Semestre */

$this->title = Yii::t('app', 'Create Semestre');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Semestres'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="semestre-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
