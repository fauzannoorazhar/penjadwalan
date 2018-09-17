<?php 
use app\models\Pekerjaan;
use app\models\Satker;
use kartik\form\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\Html;
use app\models\PekerjaanMetode;

/** @var $this yii\web\View */
/** @var $pekerjaanSearch \app\models\PekerjaanSearch */
?>


<?php $form = ActiveForm::begin([
    'action' => ['admin/index'],
    'method' => 'get',
]); ?>

<div class="box box-primary">
    <div class="box-body">
        <div class="row">
            <div class="col-sm-3" style="padding-right: 0px !important;">
                <?= $form->field($pekerjaanSearch, 'id_satker',[
                    'options'=>['style'=>'margin-bottom:0px !important'],
                    'errorOptions' => ['tag' => null]
                ])->dropDownList(Satker::getList(),['prompt'=>'Semua Satker'])->label(false); ?>
            </div>
            <div class="col-sm-2" style="padding-right: 0px !important;">
                <?= $form->field($pekerjaanSearch, 'id_metode_pengadaan',[
                    'options'=>['style'=>'margin-bottom:0px !important'],
                    'errorOptions' => ['tag' => null]
                ])->dropDownList(PekerjaanMetode::getList(),['prompt'=>'Semua Sumber Dana'])->label(false); ?>
            </div>
            <div class="col-sm-3">
                <?= Html::submitButton('<i class="fa fa-check"></i> Filter Data', ['class' => 'btn btn-primary btn-flat']) ?>
            </div>
        </div>
    </div>
</div>
<?php ActiveForm::end(); ?>


<?php /*
<?php $form = ActiveForm::begin([
    'action' => ['admin/index'],
    'method' => 'get',
]); ?>

<div class="box box-primary">
	<div class="box-header with-border">
		<h2 class="box-title">Filter</h2>
	</div>

	<div class="box-body">

			<div class="row">
				<div class="col-sm-3">
                    <?= $form->field($pekerjaanSearch, 'id_satker')->widget(Select2::class, [
                        'data' => Satker::getList(),
                        'pluginOptions' => ['allowClear' => true],
                        'options' => [
                            'placeholder' => 'Pilih Satker',
                        ]
                    ])->label(false) ?>
				</div>
				<div class="col-sm-3">
                    <?= $form->field($pekerjaanSearch, 'id_metode_pengadaan')->widget(Select2::class, [
                        'data' => PekerjaanMetode::getList(),
                        'pluginOptions' => ['allowClear' => true],
                        'options' => [
                            'placeholder' => 'Pilih Metode',
                        ]
                    ])->label(false) ?>
				</div>
				<div class="col-sm-3">
					<?= Html::submitButton('<i class="fa fa-check"></i> Filter Data', ['class' => 'btn btn-success btn-flat']) ?>
				</div>
			</div>
	</div>
</div>

<?php ActiveForm::end(); ?>
 */ ?>
