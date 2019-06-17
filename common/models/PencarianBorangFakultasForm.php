<?php


namespace common\models;


use yii\base\Model;

/**
 *
 * @property mixed $akreditasiProdi
 * @property mixed $borang
 */
class PencarianBorangFakultasForm extends Model
{


    public $akreditasi;
    public $id_fakultas;
    public $borang_untuk;
    public $jenjang;

    private $_akreditasi;
    private $_akreditasi_prodi;
    private $_borang;


    public function rules(): array
    {
        return [
            [['akreditasi', 'jenjang', 'id_fakultas', 'borang_untuk',], 'required']
        ];
    }

    public function cari($target): string
    {

        $url = '';
        $this->_akreditasi = S7Akreditasi::find()->where(['id' => $this->akreditasi])->one();
        $program = $this->jenjang;
        $borangfakultasClass = 'common\\models\\S7Borang' . $program . 'Fakultas';
        $this->_borang = call_user_func($borangfakultasClass . '::findOne', ['id_akreditasi' => $this->akreditasi, 'id_fakultas' => $this->id_fakultas]);
        $url .= 'borang-' . strtolower($program) . '-fakultas/' . $target;


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