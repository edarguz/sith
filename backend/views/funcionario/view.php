<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Funcionario */

$this->title = $model->id_funcionario;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Funcionarios'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="funcionario-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id_funcionario], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id_funcionario], [
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
            'id_funcionario',
            'nombres',
            'apellidos',
            'identificacion',
            'fecha_exp',
            'lugar_expedicion',
            'id_genero',
            'id_tipo_funcionario',
            'fecha_nac',
            'lugar_nac',
            'id_estado_civil',
            'id_rh',
            'direccion',
            'telefono',
            'tel_movil',
            'email:email',
            'estado',
            'id_banco',
            'numero_cuenta',
        ],
    ]) ?>

</div>
