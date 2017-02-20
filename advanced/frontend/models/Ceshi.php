<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "ceshi".
 *
 * @property integer $id
 * @property string $name
 * @property string $hooty
 * @property string $sex
 */
class Ceshi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ceshi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'hooty', 'sex'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'hooty' => 'Hooty',
            'sex' => 'Sex',
        ];
    }
}
