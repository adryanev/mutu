<?php


namespace common\models;


use yii\base\Model;

class PencarianBorangInstitusiForm extends Model
{


    public $akreditasi;
    public $borang_untuk;

    private $_akreditasi;
    private $_akreditasi_Institusi;
    private $_borang;


    public function rules() :array
    {
        return [
            [['akreditasi','borang_untuk',],'required']
        ];
    }

    public function cari($target): string
    {

        $url ='';
        $this->_akreditasi = Akreditasi::find()->where(['id'=>$this->akreditasi])->one();

        $this->_akreditasi_Institusi = AkreditasiInstitusi::findOne(['id_akreditasi'=>$this->_akreditasi->id]);

        if($this->borang_untuk ==='institusi'){
            $this->_borang = BorangInstitusi::findOne(['id_akreditasi_institusi'=>$this->_akreditasi_Institusi->id]);
            $url .= "borang-institusi/$target";
        }



        return $url;


    }

    /**
     * @return mixed
     */
    public function getAkreditasi()
    {
        return $this->_akreditasi;
    }

    /**
     * @return mixed
     */
    public function getAkreditasiProdi()
    {
        return $this->_akreditasi_prodi;
    }

    /**
     * @return mixed
     */
    public function getBorang()
    {
        return $this->_borang;
    }


}