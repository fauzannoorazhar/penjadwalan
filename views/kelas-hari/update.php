<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\KelasHari */

$this->title = "Sunting Kelas Hari";
$this->params['breadcrumbs'][] = ['label' => 'Kelas Haris', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Sunting';
?>
<div class="kelas-hari-update">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
