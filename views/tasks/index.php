<?php

/** @var yii\web\View $this */

/** @var \yii\data\ActiveDataProvider $dataProvider */

/** @var \app\models\Category[] $categories */

/** @var \app\models\SearchTasks $modelSearch */

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

$this->title = 'My Yii Application';
?>

<main class="main-content container">
    <div class="left-column">

        <h3 class="head-main head-task">Новые задания</h3>

            <?php echo \yii\widgets\ListView::widget([
                'dataProvider' => $dataProvider,
                'itemView' => '__taskitem',
                'layout' => "{items}\n{pager}"
            ]); ?>

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
                    <?php foreach ($categories as $attr => $category): ?>
                        <?php
                        $checked = in_array($category->id, $modelSearch->categories);
                        echo $form
                            ->field($modelSearch, "categories[$attr]")
                            ->checkbox(['id' => $attr, 'value' => $category->id, 'label' => $category->name, 'checked' => $checked])
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