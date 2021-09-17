<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "books".
 *
 * @property int $id
 * @property string $book_title
 * @property string $published_date
 * @property string $library_name
 * @property string $author_name
 * @property string $author_date_of_birth
 */
class Books extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'books';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['book_title', 'library_id', 'author_id'], 'required'],
            [['	created_date'], 'safe'],
            [['book_title', 'library_id', 'author_id'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'book_title' => 'Book Title',
            'created_date' => 'Created Date',
            'library_id' => 'Library Name',
            'author_id' => 'Author Name',
            // 'author_date_of_birth' => 'Author Date Of Birth',
        ];
    }

    // ..........................................

  

    // public static function get_message_trigger($id='user2'){
    //     $model = self::find()->where(["library_name" => $id])->one();
    //     if(!empty($model)){
    //         return $model->object_name;
    //     }
    
    //     return null;
    // }



  

}
