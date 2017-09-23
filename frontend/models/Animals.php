<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tbl_animals".
 *
 * @property integer $id
 * @property string $name
 * @property string $race
 * @property string $size
 * @property string $location
 *
 * @property TblAnimalsTypes[] $tblAnimalsTypes
 */
class Animals extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_animals';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'race', 'size', 'location'], 'string', 'max' => 50],
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
            'race' => 'Race',
            'size' => 'Size',
            'location' => 'Location',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnimalsTypes()
    {
        return $this->hasMany(AnimalsTypes::className(), ['id_animals' => 'id']);
    }
}
