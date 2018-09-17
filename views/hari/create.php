<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Hari */

$this->title = "Tambah Hari";
$this->params['breadcrumbs'][] = ['label' => 'Haris', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hari-create">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
