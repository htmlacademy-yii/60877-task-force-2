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
use yii\helpers\ArrayHelper;
$this->title = 'My Yii Application';
?>

<main class="main-content container">
    <div class="left-column">

        <h3 class="head-main head-task">Новые задания</h3>

        <?php echo \yii\widgets\ListView::widget([
            'dataProvider' => $dataProvider,
            'itemView' => '__taskitem',
            'layout' => "{items}\n{pager}",
            'pager' => [
                'options' => [
                    'tag' => 'ul',
                    'class' => 'pagination-list',
                ],
                'linkContainerOptions' => [
                    'tag' => 'li',
                    'class' => 'pagination-item',
                ],
                'linkOptions' => [
                    'class' => 'link link--page',
                ],
                'nextPageCssClass' => 'mark',
                'prevPageCssClass' => 'mark',
                'nextPageLabel' => '', // Удаляем символ стрелки для следующей страницы
                'prevPageLabel' => '', //
                'activePageCssClass' => 'pagination-item--active',
                'maxButtonCount' => 3,
                'lastPageLabel' => false,
                'firstPageLabel' => false,
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
                    <div class="checkbox-wrapper">
                        <?= $form->field($modelSearch, 'categories')
                            ->checkboxList(
                                ArrayHelper::map($categories, 'id', 'name'),
                                [
                                    'item' => function ($index, $label, $name, $checked, $value) {
                                        $checked = $checked ? 'checked' : '';
                                        return "<label class='control-label'><input type='checkbox' {$checked} name='{$name}' value='{$value}'>" . Html::encode($label) . "</label>";
                                    }
                                ]
                            )->label(false) ?>
                    </div>
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
                <?= Html::input('submit', null, 'Искать', ['class' => 'button button--blue']) ?>
                <?php ActiveForm::end() ?>

            </div>
        </div>
    </div>
</main>