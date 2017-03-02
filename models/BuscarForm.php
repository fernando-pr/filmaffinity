<?php

namespace app\models;

class BuscarForm extends \yii\base\Model
{
    public $titulo;


    public function rules()
    {
        return [
            [['titulo'], 'required'],
            [['titulo'], 'exist',
                'skipOnError' => true,
                'targetClass' => Pelicula::className(),
                'targetAttribute' => ['titulo' => 'titulo'],
            ],
        ];
    }

    public function attributeLabels()
    {
        return [
            'titulo' => 'Titulo de la pelicula',
        ];
    }
}
