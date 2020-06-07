<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "subject".
 *
 * @property int $id
 * @property string|null $fullname
 * @property string|null $address
 * @property string|null $phone
 * @property string|null $passport_id
 * @property string|null $passport_issuer
 * @property string|null $passport_date
 * @property string|null $contents
 * @property int $staff_code
 * @property int $result_code
 * @property string|null $doc_id
 * @property string|null $doc_date
 */
class Subject extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'subject';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fullname', 'address', 'passport_issuer', 'contents'], 'string'],
            [['passport_date', 'doc_date'], 'safe'],
            [['staff_code', 'result_code'], 'required'],
            [['staff_code', 'result_code'], 'integer'],
            [['phone', 'passport_id'], 'string', 'max' => 10],
            [['doc_id'], 'string', 'max' => 50],
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
            'address' => 'Адрес',
            'phone' => 'Телефон',
            'passport_id' => 'Номер паспорта',
            'passport_issuer' => 'Место выдачи паспорта',
            'passport_date' => 'Дата выдачи паспорта',
            'contents' => 'Содержание обращения',
            'staff_code' => 'Код ответственного сотрудника',
            'result_code' => 'Код результата рассмотрения',
            'doc_id' => 'Номер документа',
            'doc_date' => 'Дата документа',
        ];
    }
}
