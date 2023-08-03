<?php

namespace App\Models;

use CodeIgniter\Model;

class HotelModel extends Model
{
    protected $table = 'hotel';
    protected $primaryKey = 'idHotel';
    protected $useAutoIncrement = true;

    // get semua data hotel
    public function getDataHotel()
    {
        $this->db->transBegin();
        $query = $this->db->query("SELECT * FROM hotel");
        $this->db->transComplete();

        if ($this->db->transStatus() === FALSE) {
            $this->db->transRollback();
            return FALSE;
        } else {
            $this->db->transCommit();
            return $query->getResultArray();
        }
    }

    // get semua data hotel berdasarkan id 
    public function getHotelById($idHotel)
    {
        $this->db->transBegin();
        $sql = "SELECT * FROM hotel WHERE idHotel = :idHotel:";
        $data  = [
            'idHotel' => $idHotel
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

    // filter berdasarkan bintang/rating
    public function getRatingHotel($rating)
    {
        $this->db->transBegin();
        $sql = "SELECT * FROM hotel WHERE rating = :rating:";
        $data = [
            'rating' => $rating
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

    // filter berdasarkan harga
    public function getHargaHotel($hargaLebihBesar, $hargaLebihKecil)
    {
        $this->db->transBegin();
        $sql = "SELECT * FROM hotel WHERE harga BETWEEN :hargaLebihBesar: AND :hargaLebihKecil:";
        $data = [
            'hargaLebihBesar' => $hargaLebihBesar,
            'hargaLebihKecil' => $hargaLebihKecil
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

    // filter berdasarkan lokasi
    public function getLokasiHotel($kota)
    {
        $this->db->transBegin();
        $sql = "SELECT * FROM hotel WHERE lokasi LIKE %:lokasi:%";
        $data = [
            'lokasi' => $kota
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

    // Insert Hotel
    public function insertHotel($idHotel, $namaHotel, $fasilitas, $jumlahKamar, $rating, $harga, $lokasi, $fotoHotel)
    {
        $this->db->transBegin();
        $sql = "INSERT INTO hotel (idHotel, namaHotel, fasilitas, jumlahKamar, rating, harga, lokasi, fotoHotel) VALUES (:idHotel:, :namaHotel:, :fasilitas:, :jumlahKamar:, :rating:,:harga:, :lokasi:, :fotoHotel:)";
        $data = [
            'idHotel' => $idHotel,
            'namaHotel' => $namaHotel,
            'fasilitas' => $fasilitas,
            'jumlahKamar' => $jumlahKamar,
            'rating' => $rating,
            'harga' => $harga,
            'lokasi' => $lokasi,
            'fotoHotel' => $fotoHotel
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

    // Edit Hotel
    public function editHotel($idHotel, $namaHotel, $fasilitas, $jumlahKamar, $rating, $harga, $lokasi, $alamatFoto)
    {
        $this->db->transBegin();
        $sql = "UPDATE hotel SET namaHotel = :namaHotel:, fasilitas = :fasilitas:, jumlahKamar = :jumlahKamar:, rating = :rating:, harga = :harga:, lokasi = :lokasi:, fotoHotel = :alamatFoto:";
        $sql .= "WHERE idHotel = :idHotel:";
        $data = [
            'idHotel' => $idHotel,
            'namaHotel' => $namaHotel,
            'fasilitas' => $fasilitas,
            'jumlahKamar' => $jumlahKamar,
            'rating' => $rating,
            'harga' => $harga,
            'lokasi' => $lokasi,
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

    // Delete Hotel
    public function deleteHotel($idHotel)
    {
        $this->db->transBegin();
        $sql = "DELETE FROM hotel WHERE idHotel = :idHotel:";
        $data = [
            'idHotel' => $idHotel
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
