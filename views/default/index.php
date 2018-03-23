<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\MessageBoardsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Обсуждения';
?>
<style>
body,
html {
	background-color: #f7f7f7;
}
.media {
	margin: 15px 30px;
	cursor: pointer;
}
[data-key] + [data-key] .media {
	margin-top: -16px;
}
</style>

<div class="message-boards-index" style="width: 780px; margin: 40px auto;">
    <div class="panel panel-default">
		<div class="panel-body" id="main-container" style="padding-bottom: 30px;">

			<h1 style="margin: 30px 0 15px; font-size: 26px; font-weight: bold;" class="text-center"><?= Html::encode($this->title) ?></h1>

		    <div class="text-center" style="margin: 0 0 20px">
			    	<?= Html::a('Создать новое', ['create'], ['class' => 'btn btn-success btn-lg','id' => 'new-message-board', 'style' => 'border-radius: 4px; padding-top: 7px; padding-bottom: 7px;']) ?>
			</div>

			<?php Pjax::begin(); ?>
			    <?= ListView::widget([
			        'dataProvider' => $dataProvider,
			        'itemView' => '_view',
			        'summary' => false
			    ]) ?>
			<?php Pjax::end(); ?>	
		</div>
	</div>
</div>
