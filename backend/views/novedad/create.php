<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm; 
use yii\helpers\ArrayHelper;
use kartik\select2\Select2; 
use kartik\widgets\DatePicker; 
use backend\models\Funcionario;
use backend\models\Tiponovedad;
use yii\bootstrap\Modal;


/* @var $this yii\web\View */
/* @var $model backend\models\Novedad */

$this->title = Yii::t('app', 'Crear Novedad');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Novedad'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="novedad-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
