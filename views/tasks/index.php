<?php

/** @var yii\web\View $this */

/** @var \yii\data\ActiveDataProvider $dataProvider */

/** @var \app\models\Category[] $categories */

/** @var \app\models\SearchTasks $modelSearch */

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\LinkPager;
$this->title = 'My Yii Application';
?>

<main class="main-content container">
    <div class="left-column">

        <h3 class="head-main head-task">Новые задания</h3>

            <?php echo \yii\widgets\ListView::widget([
                'dataProvider' => $dataProvider,
                'itemView' => '__taskitem',
                'layout' => "{items}\n{pager}",
                'class' => 'list-view',
                'pager' => [
                    'options' => [
                        'class' => 'pagination-list', // Добавьте свой CSS класс здесь
                    ],
                    'linkContainerOptions' => [
                        'class' => 'pagination-item', // Добавьте свой CSS класс для тегов <li> здесь
                    ],
                    'linkOptions' => [
                        'class' => 'link link--page', // Добавьте свой CSS класс для тегов <a> здесь
                    ],
                    'maxButtonCount' => 3, // Устанавливаем максимальное количество отображаемых страниц на 3
                   // 'prevPageLabel' => '<<', // Устанавливаем явную метку для кнопки перехода на предыдущую страницу с текстом "<<"
                    //'firstPageLabel' => '1', // Устанавливаем явную метку для первой страницы
                    'lastPageLabel' => false, // Отключаем метку для последней страницы
                    //'nextPageLabel' => '>>',
                    'activePageCssClass' => 'pagination-item--active',
                ],
            ]); ?>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var paginationList = document.getElementById('pagination-list');
                var listItems = paginationList.getElementsByClassName('list-item');

                for (var i = 0; i < listItems.length; i++) {
                    listItems[i].addEventListener('click', function (event) {
                        // Удаляем класс list-item--active с текущего активного элемента
                        var activeItem = paginationList.querySelector('.list-item--active');
                        if (activeItem) {
                            activeItem.classList.remove('list-item--active');
                        }

                        // Добавляем класс list-item--active на новый элемент
                        event.target.classList.add('list-item--active');
                    });
                }
            });
        </script>
    </div>
    <div class="right-column">
        <div class="right-card black">
            <div class="search-form">
                <?php
                $form = ActiveForm::begin([
                    'options' => ['class' => 'search-task__form'],
                    'method' => 'post'
                ]) ?>


                <h4 class="head-card">Категории</h4>
                <div class="form-group">
                    <?php /*foreach ($categories as $attr => $category): ?>
                        <?php
                        $checked = in_array($category->id, $modelSearch->categories);
                        echo $form
                            ->field($modelSearch, "categories[$attr]")
                            ->checkbox(['id' => $attr, 'value' => $category->id, 'label' => $category->name, 'checked' => $checked])
                        ?>
                    <?php endforeach;*/ ?>
                    <?php foreach ($categories as $attr => $category): ?>
                        <?php
                        $checked = in_array($category->id, $modelSearch->categories);
                        /*echo $form
                            ->field($modelSearch, "categories[$attr]")
                            ->checkbox(['id' => $attr, 'value' => $category->id, 'label' => Html::a($category->name, ['tasks/index', 'category_id' => $category->id]), 'checked' => $checked])*/
                        echo $form
                            ->field($modelSearch, "categories[$attr]")
                            ->checkbox([
                                'id' => $attr,
                                'class' => '', // добавление класса
                                'value' => $category->id,
                                'label' => Html::a($category->name, ['tasks/index', 'category_id' => $category->id], ['class' => 'cat-links']),
                                'checked' => $checked
                            ])
                        ?>
                    <?php endforeach; ?>
                </div>
                <h4 class="head-card">Дополнительно</h4>
                <div class="form-group">
                    <?php echo $form->field($modelSearch, 'without_author')->checkbox(['id' => 'without-performer'])->label(''); ?>
                </div>
                <h4 class="head-card">Период</h4>
                <div class="form-group">
                    <label for="period-value"></label>
                    <?php echo $form->field($modelSearch, 'taskPeriod')->dropdownList([
                        60 * 60 => '1 час',
                        60 * 60 * 12 => '12 часов',
                        60 * 60 * 24 => '24 часа'
                    ],
                        ['text' => 'Please select', 'options' => ['id' => 'period-value', 'label' => '']])->label('');
                    ?>
                </div>
                <?= Html::submitButton('Искать', ['class' => 'button button--blue', 'value' => "Искать"]) ?>
                <?php ActiveForm::end() ?>

            </div>
        </div>
    </div>
</main>