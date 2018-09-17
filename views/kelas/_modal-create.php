<?php

use app\models\JurusanAngkatanSearch;
use yii\bootstrap\Modal;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\StringHelper;
use yii\widgets\Pjax;

$modelSearch = new JurusanAngkatanSearch();
$dataProvider = $modelSearch->searchJurusan(Yii::$app->request->queryParams);
$dataProvider->pagination->pageSize = 10;

?>

<?php Modal::begin([
    'header' => '<h3>Daftar Jurusan Angkatan</h3>',
    'id' => 'modal-kelas',
    'size' => Modal::SIZE_LARGE,
    'toggleButton' => [
        'label' => '<i class="fa fa-plus"></i> Tambah Kelas',
        'class' => 'btn btn-success btn-flat'
    ],
]) ?>

<?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $modelSearch,
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                'header' => 'No',
                'headerOptions' => ['style' => 'text-align:center; width: 55px'],
                'contentOptions' => ['style' => 'text-align:center']
            ],
            [
                'attribute' => 'nama',
                'format' => 'raw',
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:center;'],
            ],
            [
                'attribute' => 'tahun',
                'format' => 'raw',
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:center;'],
            ],
            [
                'format' => 'raw',
                'value' => function($data) {
                    return Html::a('<i class="fa fa-check"></i>',['kelas/create','id_jurusan_angkatan' => $data->id],['class' => 'btn btn-success btn-flat btn-xs','data-toggle' => 'tooltip', 'title' => 'Tambah Kelas']);
                },
                'headerOptions' => ['style' => 'text-align:center;width:50px'],
                'contentOptions' => ['style' => 'text-align:center;'],
            ],
        ],
    ]); ?>
<?php Pjax::end(); ?>

<?php Modal::end(); ?>
