<?php


namespace common\models;


use yii\base\Model;

class PencarianPenilaianProdiForm extends Model
{

    public $akreditasi;
    public $program;
    public $id_prodi;
    public $borang_untuk;

    private $_akreditasi;
    private $_akreditasi_prodi;
    private $_borang;
}