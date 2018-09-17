<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Kelas */

$this->title = "Detail Kelas";
$this->params['breadcrumbs'][] = ['label' => 'Kelas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kelas-view box box-primary">

    <div class="box-header">
        <h3 class="box-title">Detail Kelas</h3>
    </div>

    <div class="box-body">

    <?= DetailView::widget([
        'model' => $model,
        'template' => '<tr><th width="180px" style="text-align:right">{label}</th><td>{value}</td></tr>',
        'attributes' => [
            [
                'attribute' => 'id_jurusan_angkatan',
                'format' => 'raw',
                'value' => @$model->jurusanAngkatan->nama,
            ],
            [
                'attribute' => 'created_at',
                'format' => 'raw',
                'value' => Yii::$app->formatter->asRelativeTime($model->created_at),
            ],
            [
                'attribute' => 'updated_at',
                'format' => 'raw',
                'value' => Yii::$app->formatter->asRelativeTime($model->updated_at),
            ],
            [
                'attribute' => 'created_by',
                'format' => 'raw',
                'value' => @$model->userCreate->username,
            ],
            [
                'attribute' => 'updated_by',
                'format' => 'raw',
                'value' => @$model->userUpdate->username,
            ],
        ],
    ]) ?>

    </div>

    <div class="box-footer">
        <?= Html::a('<i class="fa fa-list"></i> Daftar Kelas', ['index'], ['class' => 'btn btn-warning btn-flat']) ?>
    </div>

</div>
