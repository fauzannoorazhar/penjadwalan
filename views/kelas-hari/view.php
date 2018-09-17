<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\KelasHari */

$this->title = "Detail Kelas Hari";
$this->params['breadcrumbs'][] = ['label' => 'Kelas Hari', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kelas-hari-view box box-primary">

    <div class="box-header">
        <h3 class="box-title">Detail Kelas Hari</h3>
    </div>

    <div class="box-body">

    <?= DetailView::widget([
        'model' => $model,
        'template' => '<tr><th width="180px" style="text-align:right">{label}</th><td>{value}</td></tr>',
        'attributes' => [
            [
                'attribute' => 'id',
                'format' => 'raw',
                'value' => $model->id,
            ],
            [
                'attribute' => 'id_kelas',
                'format' => 'raw',
                'value' => $model->id_kelas,
            ],
            [
                'attribute' => 'id_hari',
                'format' => 'raw',
                'value' => $model->id_hari,
            ],
        ],
    ]) ?>

    </div>

    <div class="box-footer">
        <?= Html::a('<i class="fa fa-pencil"></i> Sunting Kelas Hari', ['update', 'id' => $model->id], ['class' => 'btn btn-success btn-flat']) ?>
        <?= Html::a('<i class="fa fa-list"></i> Daftar Kelas Hari', ['index'], ['class' => 'btn btn-warning btn-flat']) ?>
    </div>

</div>
