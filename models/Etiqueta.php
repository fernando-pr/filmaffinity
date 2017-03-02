<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "etiquetas".
 *
 * @property integer $id
 * @property string $nombre
 * @property integer $pelicula_id
 *
 * @property Etiquetadas[] $etiquetadas
 * @property Peliculas[] $peliculas
 * @property Peliculas $pelicula
 */
class Etiqueta extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'etiquetas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'pelicula_id'], 'required'],
            [['pelicula_id'], 'integer'],
            [['nombre'], 'string', 'max' => 60],
            [['nombre'], 'unique'],
            [['pelicula_id'], 'exist', 'skipOnError' => true, 'targetClass' => Pelicula::className(), 'targetAttribute' => ['pelicula_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'pelicula_id' => 'Pelicula ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEtiquetadas()
    {
        return $this->hasMany(Etiquetada::className(), ['etiqueta_id' => 'id'])->inverseOf('etiqueta');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPeliculas()
    {
        return $this->hasMany(Pelicula::className(), ['id' => 'pelicula_id'])->viaTable('etiquetadas', ['etiqueta_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPelicula()
    {
        return $this->hasOne(Pelicula::className(), ['id' => 'pelicula_id'])->inverseOf('etiquetas');
    }
}
