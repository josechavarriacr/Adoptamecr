<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tbl_animals_types".
 *
 * @property integer $id
 * @property integer $id_animals
 * @property string $name
 * @property string $description
 *
 * @property TblAnimals $idAnimals
 */
class AnimalsTypes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_animals_types';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_animals'], 'integer'],
            [['name', 'description'], 'string', 'max' => 50],
            [['id_animals'], 'exist', 'skipOnError' => true, 'targetClass' => Animals::className(), 'targetAttribute' => ['id_animals' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_animals' => 'Id Animals',
            'name' => 'Name',
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnimals()
    {
        return $this->hasOne(Animals::className(), ['id' => 'id_animals']);
    }
}
