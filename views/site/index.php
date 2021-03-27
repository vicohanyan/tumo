<?php

use yii\helpers\Html;
use yii\grid\GridView;
use \yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $templates \app\models\MailTemplates */

$this->title = 'Students';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="students-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="col-md-12" style="padding:20px 0">
        <div class="col-md-2">
        <?= Html::a('Create Students', ['create'], ['class' => 'btn btn-success']) ?>
        </div>
        <div class="col-md-offset-8 col-md-2">
        <?= Html::dropDownList( 'Select template',"",ArrayHelper::map($templates, 'id', 'name'),["class"=>"btn"]) ?>
        </div>
    </div>
    <div id="students">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'name',
                'lastname',
                'email:email',
                [
                    'class' => 'yii\grid\CheckboxColumn',
                ],
                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
    <div class="col-md-12">
        <div class="col-md-offset-10 col-md-2">
                <?= Html::a('Send Mail', ['queue'], ['id'=>"send_mail",'class' => 'btn btn-primary btn-lg']) ?>
        </div>
    </div>
</div>
<?php
$this->registerJs(
<<<JS
$('#send_mail').on('click',function (event){
    event.preventDefault();
    let data = $('#students tr');
    // let ids;
    data.each(function (){
        console.log(this);
    });
    // console.log(ids);
    console.log(this.href);
});

JS
);