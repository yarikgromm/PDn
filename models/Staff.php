<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "staff".
 *
 * @property int $id
 * @property string $fullname
 * @property int $department_code
 * @property string|null $room
 * @property string|null $phone
 */
class Staff extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'staff';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fullname', 'department_code'], 'required'],
            [['department_code'], 'integer'],
            [['fullname'], 'string', 'max' => 255],
            [['room'], 'string', 'max' => 4],
            [['phone'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fullname' => 'Ф.И.О.',
            'department_code' => 'Код отдела',
            'room' => 'Кабинет',
            'phone' => 'Телефон',
        ];
    }
    
//     public function relations() {
//         return [
//             'department' => [self::BELONGS_TO, 'Department', 'department_id']
//         ];
//     }
}
