<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "section_post".
 *
 * @property integer $post
 * @property integer $section
 */
class SectionPost extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'section_post';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['post', 'section'], 'required'],
            [['post', 'section'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'post' => 'Post',
            'section' => 'Section',
        ];
    }
}
