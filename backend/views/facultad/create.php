<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Facultad */

$this->title = Yii::t('app', 'Crear Facultad');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Facultad'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="facultad-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
