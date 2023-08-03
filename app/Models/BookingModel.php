<?php

namespace App\Models;

use CodeIgniter\Model;

class BookingModel extends Model
{
    protected $table = 'booking';
    protected $primaryKey = 'idBooking';
    protected $useAutoIncrement = true;

    // melakukan booking / insert booking
    public function insertBooking($idBooking, $idHotel, $namaHotel, $emailUser, $namaLengkapTamu, $nomorTeleponTamu, $emailTamu, $jumlahKamar, $checkIn, $checkOut, $harga, $jamTanggalBooking)
    {
        $this->db->transBegin();
        $sql = "INSERT INTO booking (idBooking, idHotel, namaHotel, emailUser, namaLengkapTamu, nomorTeleponTamu, emailTamu, jumlahKamar, checkIn, checkOut, harga, jamTanggalBooking) VALUES(:idBooking:, :idHotel:, :namaHotel:, :emailUser:, :namaLengkapTamu:, :nomorTeleponTamu:, :emailTamu:, :jumlahKamar:, :checkIn:, :checkOut:, :harga:, :jamTanggalBooking:)";
        $data = [
            'idBooking' => $idBooking,
            'idHotel' => $idHotel,
            'namaHotel' => $namaHotel,
            'emailUser' => $emailUser,
            'namaLengkapTamu' => $namaLengkapTamu,
            'nomorTeleponTamu' => $nomorTeleponTamu,
            'emailTamu' => $emailTamu,
            'jumlahKamar' => $jumlahKamar,
            'checkIn' => $checkIn,
            'checkOut' => $checkOut,
            'harga' => $harga,
            'jamTanggalBooking' => $jamTanggalBooking
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

    // get daftar booking for all user
    public function getDetailBookingAll()
    {
        $this->db->transBegin();
        $query = $this->db->query("SELECT * FROM booking");
        $this->db->transComplete();

        if ($this->db->transStatus() === FALSE) {
            $this->db->transRollback();
            return FALSE;
        } else {
            $this->db->transCommit();
            return $query->getResultArray();
        }
    }

    // get detail booking & daftar booking untuk 1 user by email
    public function getDetailBookingUser($emailUser)
    {
        $this->db->transBegin();
        $sql = "SELECT * FROM booking WHERE emailUser = :emailUser:";
        $data  = [
            'emailUser' => $emailUser
        ];
        $query = $this->db->query($sql, $data);
        $this->db->transComplete();

        if ($this->db->transStatus() === FALSE) {
            $this->db->transRollback();
            return FALSE;
        } else {
            $this->db->transCommit();
            return $query->getResultArray();
        }
    }

    // get detail booking & daftar booking untuk 1 user by id booking
    public function getDetailBookingUserById($idBooking)
    {
        $this->db->transBegin();
        $sql = "SELECT * FROM booking WHERE idBooking = :idBooking:";
        $data  = [
            'idBooking' => $idBooking
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

    // edit booking
    public function editBooking($idBooking, $idHotel, $emailUser, $namaLengkapTamu, $nomorTeleponTamu, $emailTamu, $jumlahKamar, $checkIn, $checkOut, $harga, $jamTanggalBooking)
    {
        $this->db->transBegin();
        $sql = "UPDATE booking SET idBooking = :idBooking:, idHotel = :idHotel:, emailUser = :emailUser:, namaLengkapTamu = :namaLengkapTamu:, nomorTeleponTamu = :nomorTeleponTamu:, emailTamu = :emailTamu:, jumlahKamar = :jumlahKamar:, checkIn = :checkIn:, checkOut = :checkOut:, harga = :harga:, jamTanggalBooking = :jamTanggalBooking:";
        $sql .= "WHERE idBooking = :idBooking:";
        $data = [
            'idBooking' => $idBooking,
            'idHotel' => $idHotel,
            'emailUser' => $emailUser,
            'namaLengkapTamu' => $namaLengkapTamu,
            'nomorTeleponTamu' => $nomorTeleponTamu,
            'emailTamu' => $emailTamu,
            'jumlahKamar' => $jumlahKamar,
            'checkIn' => $checkIn,
            'checkOut' => $checkOut,
            'harga' => $harga,
            'jamTanggalBooking' => $jamTanggalBooking
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

    // delete booking
    public function deleteBooking($idBooking)
    {
        $this->db->transBegin();
        $sql = "DELETE FROM booking WHERE idBooking = :idBooking:";
        $data = [
            'idBooking' => $idBooking
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
