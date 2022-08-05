<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $email
 * @property string $name
 * @property string $password
 * @property string $dt_add
 * @property  TasksReplies[] $replies
 * @property  UserReplies[] $executorReplies
 * @property Tasks[] $doneTasks
 * @property Tasks[] $failedTasks
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email', 'name', 'password', 'dt_add'], 'required'],
            [['email', 'name', 'password', 'dt_add'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'name' => 'Name',
            'password' => 'Password',
            'dt_add' => 'Dt Add',
            'user_img' => 'User Img',
            'quote' => 'Quote',
            'country' => 'Country',
            'city' => 'City',
            'age' => 'Age',
            'phone' => 'Phone',
            'telegram' => 'Telegram',
            'status' => 'Status',
            'avg_rating' => 'Avg Rating',
            'user_status' => 'User Status',
        ];
    }

   public function getAvgRating()
    {
        static $rating = null;

        if (is_null($rating) && count($this->replies) > 0) {
            $ratings = [];
            foreach ($this->replies as $reply) {
                $ratings[] = $reply->rate;
            }

            $rating = array_sum($ratings) / count($ratings);
        }
        return $rating;
    }

 public function getUserAvgRating()
    {
        static $rating = null;

        if (is_null($rating)) {
            $ratings = [];
            foreach ($this->executorReplies as $reply) {
                $ratings[] = $reply->rate;
            }

            $rating = array_sum($ratings) / count($ratings);


        }
        return $rating;
    }

    public function getReplies()
    {
        return $this->hasMany(UserReplies::class, ['user_id' => 'id']);
    }

    public function getDoneTasks()
    {
        return $this->hasMany(Tasks::class, ['user_id' => 'id'])->andWhere(['status' => 1]);
    }

    public function getFailedTasks()
    {
        return $this->hasMany(Tasks::class, ['user_id' => 'id'])->andWhere(['status' => 0]);
    }

    public function getExecutorReplies()
    {
        return $this->hasMany(UserReplies::class, ['executor_id' => 'id']);
    }

    public function getUserRating()
    {
        // отношение к новой таблице отзывов пользователя
        return $this->hasMany(UserRating::class, ['user_id' => 'id']);
    }

    public function getTags()
    {
        return $this->hasMany(TagsAttributes::class, ['id' => 'id'])->viaTable('tags_attribution', ['user_id' => 'id']);
    }


    public function getAllRepliesForUsers()
    {
        return $this->hasMany(TasksReplies::class, ['user_id' => 'id'])->viaTable('replies_links', ['replies_id' => 'id'])->where(['entity' => 'user']);
    }

    public function getUser()
    {
        return $this->hasOne(UserReplies::class, ['executor_id' => 'id']);
    }


}
