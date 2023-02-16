<?php

use yii\helpers\Url;
?>
<div class="task-card">
    <div class="header-task">
        <a href=" <?php echo Url::to(['tasks/view', 'id' =>$model->id]); ?>
"
           class="link link--block link--big"><?php echo $model->name; ?></a>
        <p class="price price--task"><?php echo $model->budget; ?> ₽</p>
    </div>
    <p class="info-text"><span class="current-time"><?php echo $model->getWasOnSite(); ?> </span>
    </p>
    <p class="task-text"><?php echo $model->description; ?>
    </p>
    <div class="footer-task">
        <p class="info-text town-text"><?php echo $model->address; ?></p>
        <p class="info-text category-text"><?php echo $model->websiteCategories->name; ?></p>
        <a href="<?php echo Url::to(['tasks/view', 'id' =>$model->id]); ?>"
           class="button button--black">Смотреть Задание</a>
    </div>
</div>