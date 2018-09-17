<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\MataPelajaran */

$this->title = "Detail Mata Pelajaran";
$this->params['breadcrumbs'][] = ['label' => 'Mata Pelajaran', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mata-pelajaran-view box box-primary">

    <div class="box-header">
        <h3 class="box-title">Detail Mata Pelajaran</h3>
    </div>

    <div class="box-body">

    <?= DetailView::widget([
        'model' => $model,
        'template' => '<tr><th width="180px" style="text-align:right">{label}</th><td>{value}</td></tr>',
        'attributes' => [
            [
                'attribute' => 'nama',
                'format' => 'raw',
                'value' => $model->nama,
            ],
        ],
    ]) ?>

    </div>

    <div class="box-footer">
        <?= Html::a('<i class="fa fa-pencil"></i> Sunting Mata Pelajaran', ['update', 'id' => $model->id], ['class' => 'btn btn-success btn-flat']) ?>
        <?= Html::a('<i class="fa fa-list"></i> Daftar Mata Pelajaran', ['index'], ['class' => 'btn btn-warning btn-flat']) ?>
    </div>

</div>
