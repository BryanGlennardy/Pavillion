<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'email';

    // register
    public function insertDataRegister($role, $nama, $email, $password, $tanggalLahir, $nomorTelepon, $alamatFoto)
    {
        $this->db->transBegin();
        $sql = "INSERT INTO user (role, nama, email, password, tanggalLahir, nomorTelepon, foto) VALUES(:role:, :nama:, :email:, :password:, :tanggalLahir:, :nomorTelepon:, :alamatFoto:)";
        $data = [
            'role' => $role,
            'nama' => $nama,
            'email' => $email,
            'password' => $password,
            'tanggalLahir' => $tanggalLahir,
            'nomorTelepon' => $nomorTelepon,
            'alamatFoto' => $alamatFoto
        ];

        $query = $this->db->query($sql, $data);
        $this->db->transComplete();

        if ($this->db->transStatus() === FALSE) {
            $this->db->transRollback();
            return FALSE;
        }

        $this->db->transCommit();
        return TRUE;
    }

    // login
    public function verifyLogin($email, $password)
    {
        $this->db->transBegin();
        $query = $this->db->query("SELECT * FROM user");
        $this->db->transComplete();

        if ($this->db->transStatus() === FALSE) {
            $this->db->transRollback();
            return FALSE;
        }

        $this->db->transCommit();
        $result = $query->getResultArray();

        foreach ($result as $row) {
            if ($email == $row['email']) {
                if (md5($password) == $row['password']) {
                    return $row;
                }
            }
        }

        return FALSE;
    }

    // get semua data user / read user
    public function getUser()
    {
        $this->db->transBegin();
        $query = $this->db->query("SELECT * FROM user");
        $this->db->transComplete();

        if ($this->db->transStatus() === FALSE) {
            $this->db->transRollback();
            return FALSE;
        } else {
            $this->db->transCommit();
            return $query->getResultArray();
        }
    }

    // get semua data user berdasarkan email 
    public function getUserByEmail($email)
    {
        $this->db->transBegin();
        $sql = "SELECT * FROM user WHERE email = :email:";
        $data  = [
            'email' => $email
        ];
        $query = $this->db->query($sql, $data);

        $this->db->transComplete();

        if ($this->db->transStatus() === FALSE) {
            $this->db->transRollback();
            return FALSE;
        } else {
            $this->db->transCommit();
            return $query->getRowArray();
        }
    }

    // edit profile
    public function editProfile($nama, $email, $password, $tanggalLahir, $nomorTelepon, $alamatFoto, $role)
    {
        $this->db->transBegin();
        $sql = "UPDATE user SET nama = :nama:, password = :password:, tanggalLahir = :tanggalLahir:, nomorTelepon = :nomorTelepon:, foto = :alamatFoto:, role = :role:";
        $sql .= "WHERE email = :idEmail:";
        $data = [
            'nama' => $nama,
            'password' => $password,
            'tanggalLahir' => $tanggalLahir,
            'nomorTelepon' => $nomorTelepon,
            'alamatFoto' => $alamatFoto,
            'role' => $role,
            'idEmail' => $email
        ];
        $query = $this->db->query($sql, $data);
        $this->db->transComplete();

        if ($this->db->transStatus() === FALSE) {
            $this->db->transRollback();
            return FALSE;
        }
        $this->db->transCommit();
        return TRUE;
    }

    // delete user
    public function deleteUser($email)
    {
        $this->db->transBegin();
        $sql = "DELETE FROM user WHERE email = :email:";
        $data = [
            'email' => $email
        ];
        $query = $this->db->query($sql, $data);
        $this->db->transComplete();

        if ($this->db->transStatus() === FALSE) {
            $this->db->transRollback();
            return FALSE;
        } else {
            $this->db->transCommit();
            return TRUE;
        }
    }
}
