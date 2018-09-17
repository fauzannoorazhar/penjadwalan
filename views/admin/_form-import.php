<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/** @var $importForm app\models\ImportForm */
?>

<?php $form = ActiveForm::begin([
    'layout'=>'horizontal',
    'enableAjaxValidation'=>false,
    'enableClientValidation'=>false,
    'fieldConfig' => [
        'horizontalCssClasses' => [
            'label' => 'col-sm-2',
            'wrapper' => 'col-sm-4',
            'error' => '',
            'hint' => '',
        ],
    ]
]); ?>

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Import Excel</h3>
    </div>

    <div class="box-body">
        <?= $form->errorSummary($importForm); ?>

        <?= $form->field($importForm, 'id_satker')->widget(\kartik\select2\Select2::classname(), [
            'data' =>  \app\models\Satker::getList(),
            'options' => [
                'placeholder' => '- Pilih Satuan Kerja -',
            ],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ])->label('Satker'); ?>

        <?= $form->field($importForm, 'sheet',[
            'horizontalCssClasses' => [
                'label' => 'col-sm-2',
                'wrapper' => 'col-sm-2',
                'error' => '',
                'hint' => '',
            ],
        ])->textInput(['type' => 'number','min' => 0])->label('Sheet') ?>

        <?= $form->field($importForm, 'mulai_dari',[
            'horizontalCssClasses' => [
                'label' => 'col-sm-2',
                'wrapper' => 'col-sm-2',
                'error' => '',
                'hint' => '',
            ],
        ])->textInput(['type' => 'number','min' => 1])->label('Mulai Dari Baris') ?>

        <?= $form->field($importForm, 'file')->fileInput()->label('File Excel') ?>

    </div>

    <div class="box-footer">
        <div class="col-sm-offset-2">
            <?= Html::submitButton('<i class="fa fa-check"></i> Import',['class' => 'btn btn-success btn-flat']) ?>

            <?php Html::a('<i class="fa fa-download"></i> Unduh Contoh Format Excel',Yii::getAlias("@web/imports/example.xlsx"),['class' => 'btn btn-primary btn-flat']) ?>
        </div>
    </div>
</div>

<?php ActiveForm::end(); ?>
