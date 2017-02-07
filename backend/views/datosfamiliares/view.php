<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Datosfamiliares */

$this->title = $model->id_datos_fam;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Datosfamiliares'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="datosfamiliares-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Actualizar'), ['update', 'id' => $model->id_datos_fam], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Eliminar'), ['delete', 'id' => $model->id_datos_fam], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_datos_fam',
            'id_funcionario',
            'nombres',
            'apellidos',
            'genero',
            'fecha_nacimiento',
        ],
    ]) ?>

</div>
