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
            'fullname' => 'Fullname',
            'address' => 'Address',
            'phone' => 'Phone',
            'passport_id' => 'Passport ID',
            'passport_issuer' => 'Passport Issuer',
            'passport_date' => 'Passport Date',
            'contents' => 'Contents',
            'staff_code' => 'Staff Code',
            'result_code' => 'Result Code',
            'doc_id' => 'Doc ID',
            'doc_date' => 'Doc Date',
        ];
    }
}
