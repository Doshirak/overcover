<?php

namespace app\models;

use Yii;
use app\models\User;

/**
 * This is the model class for table "post".
 *
 * @property integer $id
 * @property string $title
 * @property string $slug
 * @property string $text
 * @property string $date
 * @property string $img
 * @property string $author
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'slug'], 'required'],
            [['text'], 'string'],
            [['date'], 'safe'],
            [['title', 'slug', 'img', 'author'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'slug' => 'Slug',
            'text' => 'Text',
            'date' => 'Date',
            'img' => 'Img',
            'author' => 'Author',
        ];
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if (property_exists(Yii::$app, 'user')) {
                $user = User::find()->where(['id' => Yii::$app->user->getId()])->one();
                $this->author = $user->name;
            }
            if ($this->date == '') {
                $this->date = date('Y-m-d');
            }
            return true;
        } else {
            return false;
        }
    }
}
