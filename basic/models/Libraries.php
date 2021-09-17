<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "libraries".
 *
 * @property int $id
 * @property string $Library_name
 * @property string $opening_time
 * @property string $closing_time
 */
class Libraries extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'libraries';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Library_name',], 'required'],
            [['Library_name', 'opening_time', 'closing_time'], 'string', 'max' => 255],
        ];
    }


   


    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Library_name' => 'Library Name',
            'opening_time' => 'Opening Time',
            'closing_time' => 'Closing Time',
        ];
    }


    // public function bookCount(){

    // }

  
}
