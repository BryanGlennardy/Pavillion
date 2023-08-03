<?php

namespace App\Controllers;

use CodeIgniter\Debug\Toolbar\Collectors\Views;
use CodeIgniter\I18n\Time;


class Index extends BaseController
{

    // Constructor
    public function __construct()
    {
        $this->bookingModel = model('BookingModel');
        $this->hotelModel = model('HotelModel');
        $this->userModel = model('UserModel');
    }

    public function index()
    {
        return view('user/index');
    }

    // function register (view)
    public function addRegister()
    {
        $data['validation'] = \Config\Services::validation();
        return view('user/register', $data); //msh belum fix
    }

    // function utk register (model)
    public function registerUser()
    {
        if (!$this->registerValidation()) {

            $validation = \Config\Services::validation();
            return redirect()->to('/Index/addRegister')->withInput()->with('validation', $validation);
        }

        $path = "assets/images/";
        $nama = $this->request->getPost('nama');
        $email = $this->request->getPost('email');
        $password = md5($this->request->getPost('password'));
        $tanggalLahir = $this->request->getPost('tanggalLahir');
        $nomorTelepon = $this->request->getPost('nomorTelepon');
        $fotoUser = $this->request->getFile('fotoUser');

        // jika user tidak memasukkan foto
        if ($fotoUser->getError() == 4) {
            $alamatFoto = $path . 'default.jpg';
        } else {
            // untuk nama foto & dipindahkan ke folder img (public)
            $fotoUser->move($path);

            // untuk mendapatkan alamat foto (db)
            $alamatFoto = $path . $fotoUser->getName();
        }

        // kirim data ke model
        $this->userModel->insertDataRegister('user', $nama, $email, $password, $tanggalLahir, $nomorTelepon, $alamatFoto);

        // message
        $this->session->setFlashdata('message', 'Registrasi Berhasil');

        return redirect()->to('/');
    }

    // login user (view)
    public function login()
    {
        $data['validation'] = \Config\Services::validation();
        return view('user/login', $data);
    }

    // login user
    public function loginUser()
    {
        if (!$this->loginValidation()) {

            $validation = \Config\Services::validation();
            return redirect()->to('/Index/login')->withInput()->with('validation', $validation);
        }

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $loginSuccess = $this->userModel->verifyLogin($email, $password);

        // error tak terduga
        if (!$loginSuccess) {
            $this->session->setFlashdata('message', 'Terjadi suatu masalah, silahkan coba lagi');
            return redirect()->to('/index/login')->withInput();
        }

        // jika email pw tidak ada di db
        if (is_null($loginSuccess)) {
            $this->session->setFlashdata('message', 'Email atau Password yang anda masukkan salah');
            return redirect()->to('/index/login')->withInput(); //msh blum fix
        }

        // message
        $this->session->setFlashdata('message', 'Login Berhasil');

        $data = $loginSuccess;
        $data['log_sess'] = TRUE;

        $this->session->set($data);

        // untuk login admin
        if ($loginSuccess['role'] === 'admin') {
            $this->session->setFlashdata('message', 'Login admin berhasil');
            return redirect()->to('/index/adminPage')->withInput(); //msh blum fix
        }

        return redirect()->to('/');
    }

    // Logout, session destroyed
    public function logoutUser()
    {
        $this->session->destroy();
        $this->session->set('log_sess', 'false');
        return redirect()->to('/');
    }

    public function showAllHotel()
    {
        $data['result'] = $this->hotelModel->getDataHotel();
        return view('user/hotel', $data);
    }

    // search & filter (belum kelar)
    public function searchFilter($rating = NULL, $hargaLebihBesar = NULL, $hargaLebihKecil = NULL, $lokasi = NULL)
    {
        // untuk sort by rating
        $getRatingHotel = [];
        $getHargaHotel = [];
        $getLokasiHotel = [];
        $allHotel = [];

        // function untuk filter by rating
        if (!is_null($rating)) {
            $getRatingHotel = $this->hotelModel->getRatingHotel($rating);
        }

        // function untuk filter by harga
        if (!is_null($hargaLebihKecil) || !is_null($hargaLebihBesar)) {

            if (is_null($hargaLebihKecil)) $hargaLebihKecil = 0;
            if (is_null($hargaLebihBesar)) $hargaLebihBesar = 0;

            if (is_null($hargaLebihKecil > $hargaLebihBesar)) {
                $t = $hargaLebihKecil;
                $hargaLebihKecil = $hargaLebihBesar;
                $hargaLebihBesar = $t;
            }

            $getHargaHotel = $this->hotelModel->getHargaHotel($hargaLebihBesar, $hargaLebihKecil);
        }

        // function untuk filter by lokasi
        if (!is_null($lokasi)) {
            $getLokasiHotel = $this->hotelModel->getLokasiHotel($lokasi);
        }

        // untuk melakukan irisan
        $allHotel = array_intersect($getRatingHotel, $getHargaHotel, $getLokasiHotel);

        // return() (belum fix)
    }

    // do booking (view)
    public function addBooking($idHotel)
    {
        $data['validation'] = \Config\Services::validation();
        $data['hotel'] = $this->hotelModel->getHotelById($idHotel);
        return view('booking', $data);
    }

    // do Booking (model) 
    public function doBooking()
    {
        if (!$this->bookingValidation()) {

            $validation = \Config\Services::validation();
            return redirect()->to('/Index/addBooking')->withInput()->with('validation', $validation);
        }

        $idBooking = $this->request->getPost('idBooking');
        $idHotel = $this->request->getPost('idHotel');
        $emailUser = $this->session->get('email');
        $namaLengkapTamu = $this->request->getPost('namaLengkapTamu');
        $nomorTeleponTamu = $this->request->getPost('nomorTeleponTamu');
        $emailTamu = $this->request->getPost('emailTamu');
        $jumlahKamar = $this->request->getPost('jumlahKamar');
        $checkIn = $this->request->getPost('checkIn');
        $checkOut = $this->request->getPost('checkOut');
        $harga = $this->request->getPost('harga');
        $jamTanggalBooking = Time::now('Asia/Jakarta');

        // kirim data ke model
        $this->userModel->insertBooking($idBooking, $idHotel, $emailUser, $namaLengkapTamu, $nomorTeleponTamu, $emailTamu, $jumlahKamar, $checkIn, $checkOut, $harga, $jamTanggalBooking);

        // message
        $this->session->setFlashdata('message', 'Booking Berhasil');

        return redirect()->to('/');
    }

    // edit profile user (view)
    public function editProfile()
    {

        $data['validation'] = \Config\Services::validation();
        return view('user/editProfile', $data);
    }

    // edit profile (model)
    public function doEditProfile()
    {
        if (!$this->profileValidation()) {
            $validation = \Config\Services::validation();
            return redirect()->to('/Index/editProfile')->withInput()->with('validation', $validation);
        }

        $path = "assets/images/";
        $nama = $this->request->getPost('nama');
        $email = session()->get('email');
        $password = md5($this->request->getPost('password'));
        $tanggalLahir = $this->request->getPost('tanggalLahir');
        $nomorTelepon = $this->request->getPost('nomorTelepon');
        $fotoUser = $this->request->getFile('fotoUser');

        $fotoLama = NULL;
        $alamatFoto = '';

        if ($fotoUser->getError() == 4) {
            $dataUser = $this->userModel->getUserByEmail($email);
            $fotoLama = $dataUser['foto'];

            $alamatFoto = $fotoLama;
        } else {
            $dataUser = $this->userModel->getUserByEmail($email);
            $fotoLama = $dataUser['foto'];

            // hapus foto
            if (is_file($fotoLama)) {
                unlink($fotoLama);
            }

            // untuk nama foto & dipindahkan ke folder img (public)
            $fotoUser->move($path);

            // untuk mendapatkan alamat foto (db)
            $alamatFoto = $path . $fotoUser->getName();
        }
        // // jika user memasukkan foto
        // if ($fotoUser->getError() == 4) {

        //     // untuk mendapatkan foto lama
        //     $dataUser = $this->userModel->getUserByEmail($email);
        //     $fotoLama = $dataUser['foto'];

        //     // hapus foto
        //     if (is_file($fotoLama)) {
        //         unlink($fotoLama);
        //     }

        //     // untuk nama foto & dipindahkan ke folder img (public)
        //     $fotoUser->move($path);

        //     // untuk mendapatkan alamat foto (db)
        //     $alamatFoto = $path . $fotoUser->getName();
        // }

        // kirim data ke model
        $this->userModel->editProfile($nama, $email, $password, $tanggalLahir, $nomorTelepon, $alamatFoto, 'user');

        // message
        $this->session->setFlashdata('message', 'Data Profile berhasil diubah');

        return redirect()->to('/');
    }

    // untuk booking history  
    public function bookingHistory()
    {
        $emailUser = session()->get('email');
        $data = [
            'result' => $this->bookingModel->getDetailBookingUser($emailUser),
            'validation' => \Config\Services::validation()
        ];
        return view('user/history', $data);
    }

    // function untuk invoice
    public function invoice($idBooking)
    {

        $booking = $this->bookingModel->getDetailBookingUserById($idBooking);
        $hotel =  $this->hotelModel->getHotelById($booking['idHotel']);

        $data['booking'] = $booking;
        $data['hotel'] = $hotel;

        return view('user/invoice', $data);
    }

    // booking->hotel->gambar
    public function gambardribooking($idbooking)
    {

        $result = $this->bookingModel->getDetailBookingUserById($idbooking);
        $hotel = $this->hotelModel->getHotelById($result['idHotel']);

        return $hotel;
    }

    // ------------------------------------------- ADMIN --------------------------------

    public function adminPage()
    {
        $data['validation'] = \Config\Services::validation();
        $data['result'] = $this->hotelModel->getDataHotel();
        return view('admin/adminhoteltable', $data);
    }
    // ------------------------------------------ View Index ----------------------------------

    public function hotelPage()
    {
        $data['result'] = $this->hotelModel->getDataHotel();
        return view('user/hotel', $data);
    }

    public function aboutusPage()
    {
        return view('user/aboutus');
    }
}
