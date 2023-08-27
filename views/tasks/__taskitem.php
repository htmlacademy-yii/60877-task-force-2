<?php

use yii\helpers\Url;
?>
<div class="task-card">
    <div class="header-task">
        <a href=" <?php echo Url::to(['tasks/view', 'id' =>$model->id]); ?>
"
           class="link link--block link--big"><?php echo \yii\helpers\Html::encode($model->name); ?></a>
        <p class="price price--task"><?php echo \yii\helpers\Html::encode($model->budget); ?> ₽</p>
    </div>
    <p class="info-text"><span class="current-time"><?php echo $model->getElapsedTime(); ?> </span>
    </p>
    <p class="task-text"><?php echo \yii\helpers\Html::encode($model->description); ?>
    </p>
    <div class="footer-task">
        <p class="info-text town-text"><?php echo \yii\helpers\Html::encode($model->address); ?></p>
        <p class="info-text category-text"><?php echo \yii\helpers\Html::encode($model->websiteCategories->name); ?></p>
        <a href="<?php echo Url::to(['tasks/view', 'id' =>$model->id]); ?>"
           class="button button--black">Смотреть Задание</a>
    </div>
</div>