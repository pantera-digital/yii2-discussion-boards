<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\MessageBoards */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="message-boards-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="panel panel-default">
        <div class="panel-body" id="main-container" style="padding-bottom: 30px; padding-top: 30px;">

            <?php if($model->isNewRecord){ $model->user_id = Yii::$app->user->id;} ?>
            <?= $form->field($model,'user_id')->hiddenInput()->label(false) ?>
            <?= $form->field($model, 'title')->label(false)->error(false)->textInput(['maxlength' => true, 'placeholder' => 'Тема обсуждения..', 'style' => 'font-size: 28px; border: 0 none; box-shadow: none;', 'autofocus' => true]) ?>

            <div style="padding: 0; margin: 0 -15px;">
                <?= $form->field($model, 'main_message')->error(false)->label(false)->widget(\dosamigos\ckeditor\CKEditor::className(), [
                    'options' => [
                        'rows' => 12,
                    ],
                    'clientOptions' => [
                        'height' => 500,
                    ],
                    'preset' => 'basic'
                ]) ?>
            </div>

        </div>
    </div>

    <div class="form-group text-center">
        <?= Html::submitButton($model->isNewRecord ? 'Разместить обсуждение' : 'Сохранить изменения', ['class' => 'btn btn-lg ' . ($model->isNewRecord ? 'btn-primary' : 'btn-success'), 'style' => 'border-radius: 4px; padding-top: 7px; padding-bottom: 7px;']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
