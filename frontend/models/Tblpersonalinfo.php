<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tblpersonalinfo".
 *
 * @property string $CID
 * @property string $PName
 * @property string $FName
 * @property string $LName
 * @property string $Birthday
 * @property string $MarryStatus
 * @property string $TelNo1
 * @property string $TelNo2
 * @property string $eMail1
 * @property string $eMail2
 * @property string $AddressNo
 * @property string $AddressLabel
 * @property string $Moo
 * @property string $SubdistrictCode
 * @property string $DistrictCode
 * @property string $ProviceCode
 * @property string $Staus
 */
class Tblpersonalinfo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tblpersonalinfo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['CID'], 'required'],
            [['CID'], 'string', 'max' => 13],
            [['PName', 'FName', 'LName', 'Birthday', 'TelNo1', 'TelNo2', 'AddressLabel'], 'string', 'max' => 50],
            [['MarryStatus', 'SubdistrictCode', 'DistrictCode', 'ProviceCode', 'Staus'], 'string', 'max' => 2],
            [['eMail1', 'eMail2'], 'string', 'max' => 20],
            [['AddressNo'], 'string', 'max' => 10],
            [['Moo'], 'string', 'max' => 3],
            [['CID'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'CID' => 'Cid',
            'PName' => 'Pname',
            'FName' => 'Fname',
            'LName' => 'Lname',
            'Birthday' => 'Birthday',
            'MarryStatus' => 'Marry Status',
            'TelNo1' => 'Tel No1',
            'TelNo2' => 'Tel No2',
            'eMail1' => 'E Mail1',
            'eMail2' => 'E Mail2',
            'AddressNo' => 'Address No',
            'AddressLabel' => 'Address Label',
            'Moo' => 'Moo',
            'SubdistrictCode' => 'Subdistrict Code',
            'DistrictCode' => 'District Code',
            'ProviceCode' => 'Provice Code',
            'Staus' => 'Staus',
        ];
    }
}
