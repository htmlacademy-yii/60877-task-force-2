<?php use yii\helpers\Html;

/**
 * @var app\models\Tasks $task
 */

?>

<main class="main-content container">
    <div class="left-column">
        <div class="head-wrapper">
            <h3 class="head-main"><?php echo $task->name; ?></h3>
            <p class="price price--big"><?php echo $task->budget; ?> UAH</p>
        </div>
        <p class="task-description">
            <?php echo $task->description; ?>
        </p>
        <a href="#" class="button button--blue">Откликнуться на задание</a>
        <div class="task-map">
            <img class="map" src="img/map.png" width="725" height="346" alt="Новый арбат, 23, к. 1">

            <p class="map-address town">Москва</p>
            <p class="map-address">Новый арбат, 23, к. 1</p>
        </div>
        <?php if (count($task->replies) > 0): ?>
            <h4 class="head-regular">Отклики на задание</h4>
        <?php endif; ?>
        <?php foreach ($task->replies as $reply): ?>

            <div class="response-card">

                <?php echo \yii\helpers\Html::img("@web/img/{$reply->user->user_img}", ['alt' => '', 'id' => '', 'width' => 100, 'height' => 100]) ?>

                <div class="feedback-wrapper">

                    <a href="#" class="link link--block link--big"><?php echo $reply->user->name; ?></a>
                    <div class="response-wrapper">

                        <div class="stars-rating small">
                            <?php for ($i = 0; $i < $reply->user->getAvgRating(); $i++): ?>
                                <span class="fill-star"></span>
                            <?php endfor; ?>
                        </div>
                        <?php if (count($reply->user->replies) > 0): ?>
                            <p class="reviews"><?= count($reply->user->replies) ?> отзыва</p>
                        <?php endif; ?>
                    </div>
                    <p class="response-message">
                        <?php echo $reply->description; ?>
                    </p>

                </div>
                <div class="feedback-wrapper">
                    <p class="info-text"><span class="current-time"> <?php echo $reply->getWasOnSite(); ?></span> назад
                    </p>
                    <p class="price price--small"><?php echo $reply->price; ?> uah</p>
                </div>
                <div class="button-popup">
                    <a href="#" class="button button--blue button--small">Принять</a>
                    <a href="#" class="button button--orange button--small">Отказать</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="right-column">
        <div class="right-card black info-card">
            <h4 class="head-card">Информация о задании</h4>
            <dl class="black-list">
                <dt>Категория</dt>
                <dd><?php echo $task->category->name; ?></dd>
                <dt>Дата публикации</dt>
                <dd><?php

                    echo $task->getWasOnSite();
                    //echo round($task->getWasOnSite()); ?> дня назад</dd>
                <dt>Срок выполнения</dt>
                <dd><?php echo $task->expire; ?></dd>
                <dt>Статус</dt>
                <?php if ($task->status === 1): ?>
                    <dd>Открыт для новых заказов</dd>
                <?php else: ?>
                    <dd>Закрыт для новых заказов</dd>
                <?php endif; ?>
            </dl>
        </div>
        <div class="right-card white file-card">
            <h4 class="head-card">Файлы задания</h4>
            <ul class="enumeration-list">
                <li class="enumeration-item">
                    <a href="#" class="link link--block link--clip">my_picture.jpg</a>
                    <p class="file-size">356 Кб</p>
                </li>
                <li class="enumeration-item">
                    <a href="#" class="link link--block link--clip">information.docx</a>
                    <p class="file-size">12 Кб</p>
                </li>
            </ul>
        </div>
    </div>
</main>
