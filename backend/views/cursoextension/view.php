<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Cursoextension */

$this->title = $model->id_curso_extension;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cursoextensions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cursoextension-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id_curso_extension], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id_curso_extension], [
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
            'id_curso_extension',
            'curso',
            'id_facultad',
        ],
    ]) ?>

</div>
