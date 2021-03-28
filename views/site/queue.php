<?php

use yii\helpers\Html;
use yii\grid\GridView;
use \yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $templates \app\models\MailTemplates */

$this->title = 'Mail Queue';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mail-queue">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'label' => 'Template',
                'value' => 'student.name',
            ],
            [
                'label' => 'Template',
                'value' => 'student.lastname',
            ],
            [
                'label' => 'Template',
                'value' => 'template.name',
            ],
            [
                'label' => 'Status',
                'value' => 'status0.name',
            ],
        ],
    ]); ?>

</div>
