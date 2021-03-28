<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $templates \app\models\MailTemplates */
/* @var $queue \app\models\MailQueue */

$this->title = 'Students';
$this->params['breadcrumbs'][] = $this->title;
$select_name = 'Select mail template';
?>
    <div class="students-index">
        <div class="mail-queue-form">
            <?php $form = ActiveForm::begin(['action' => ['site/create-queue'], 'options' => ['method' => 'post','id' => "queue_form"]]); ?>
            <h1><?= Html::encode($this->title) ?></h1>
            <div class="col-md-12" style=" padding:20px 0; ">
                <div class="col-md-2">
                    <?= Html::a('Create Students', ['create'], ['class' => 'btn btn-success']) ?>
                </div>
                <div class="col-md-offset-6 col-md-4">
                    <div class="col-md-8">
                    <h4><?= Html::encode($select_name) ?></h4>
                    </div>
                    <div class="col-md-4">
                        <?= Html::activeDropDownList($queue, 'template_id', ArrayHelper::map($templates, 'id', 'name'), ["class" => "btn"]) ?>
                    </div>
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
                <div class="col-md-offset-8 col-md-4">
                    <?= $form->field($queue, 'student_ids')->hiddenInput()->label(false) ?>
                    <div class="form-group" style="display: flex;margin: 5px;justify-content: space-between;">
                        <?= Html::a('View Queue', ['queue'], ['class' => 'btn btn-success btn-lg']) ?>
                        <?= Html::submitButton('Send Mail', ['id' => "send_mail", 'class' => 'btn btn-primary btn-lg']) ?>
                    </div>
                </div>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
<?php
$this->registerJs(<<<JS
    $('#send_mail').on('click',function (event){
        event.preventDefault();
        let data = $('#students tr');
        let ids = [];
        data.each(function (){
            let id = $(this).find('input:checked').val();
            if(id !== undefined){
                ids.push(id);
            }
        });
        if(ids.length > 0){
            $("#mailqueue-student_ids").val(ids);
            $("#queue_form").submit();
        }
    });
JS
);