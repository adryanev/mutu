<?php


namespace common\models;


use InvalidArgumentException;
use yii\base\Model;

class UserForm extends Model
{

    public $username;
    public $password;
    public $email;
    public $status;
    public $is_admin;
    public $is_institusi;
    public $is_fakultas;
    public $is_prodi;

    public $nama_lengkap;
    public $id_fakultas;
    public $id_prodi;

    private $_user;
    private $_profilUser;


    public function attributeLabels()
    {
        return [
            'username' => 'Username (Nip/Nik)',
            'is_admin' => 'Akses Admin',
            'is_institusi' => 'Akses Institusi',
            'is_fakultas' => 'Akses Fakultas',
            'is_prodi' => 'Akses Prodi',
            'id_fakultas' => 'Fakultas',
            'id_prodi' => 'Prodi',
        ];
    }

    public function __construct($id, $config = [])
    {
        if (!is_int($id)) {
            throw new InvalidArgumentException('Oops, Data yang anda cari tidak dapat ditemukan.');
        }
        if (empty($id)) {
            $this->_user = new User();
            $this->_profilUser = new ProfilUser();
        } else {
            $this->_user = User::findOne($id);
            if (!$this->_user) {
                throw new InvalidArgumentException('User yang dicari tidak ada');
            }
            $this->_profilUser = $this->_user->profilUser;


        }

        parent::__construct($config);
    }

    public function updateUser()
    {
        $user = $this->_user;
        $user->scenario = 'update';
        $profil = $this->_profilUser;
        $user->setAttributes($this->getAttributes([
            'username', 'email', 'status', 'is_admin', 'is_institusi', 'is_fakultas', 'is_prodi',
        ]));

        $profil->setAttributes($this->getAttributes(['nama_lengkap', 'id_fakultas', 'id_prodi']));

        $valid = $user->save()&& $profil->save() ;


        return $valid ? $user : null;

    }

    public function addUser()
    {
        $user = $this->_user;
        $user->scenario = 'create';

        $profil = $this->_profilUser;

        $user->setAttributes(['username','email','status','is_admin','is_institusi','is_fakultas','is_prodi']);
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();
        $profil->setAttributes(['nama_lengkap','id_fakultas','id_prodi']);

        $valid = $user->save()&& $profil->save() ;



        return $valid? $user : null;
    }

}