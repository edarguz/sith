<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Escalafon */

$this->title = Yii::t('app', 'Crear Escalafón');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Escalafon'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="escalafon-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
