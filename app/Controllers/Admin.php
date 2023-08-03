<?php

namespace App\Controllers;

use CodeIgniter\I18n\Time;


class Admin extends BaseController
{
    // Constructor
    public function __construct()
    {
        $this->bookingModel = model('BookingModel');
        $this->hotelModel = model('HotelModel');
        $this->userModel = model('UserModel');
    }


    // --------------------------------- USER ------------------------------------
    // Create
    // function utk tambah user (view)
    // public function addUser()
    // {
    //     $data['validation'] = \Config\Services::validation();
    //     return view(' ', $data); //msh belum fix
    // }

    // // function utk tambah user (model)
    // public function doAddUser()
    // {
    //     if (!$this->registerValidation()) {

    //         $validation = \Config\Services::validation();
    //         return redirect()->to('/Index/addRegister')->withInput()->with('validation', $validation);
    //     }

    //     $path = "assets/images/";
    //     $nama = $this->request->getPost('nama');
    //     $email = $this->request->getPost('email');
    //     $password = md5($this->request->getPost('password'));
    //     $tanggalLahir = $this->request->getPost('tanggalLahir');
    //     $nomorTelepon = $this->request->getPost('nomorTelepon');
    //     $fotoUser = $this->request->getFile('fotoUser');

    //     // jika user tidak memasukkan foto
    //     if ($fotoUser->getError() == 4) {
    //         $alamatFoto = 'default.jpg';
    //     } else {
    //         // untuk nama foto & dipindahkan ke folder img (public)
    //         $fotoUser->move($path);

    //         // untuk mendapatkan alamat foto (db)
    //         $alamatFoto = $path . $fotoUser->getName();
    //     }

    //     // kirim data ke model
    //     $this->userModel->insertDataRegister('user', $nama, $email, $password, $tanggalLahir, $nomorTelepon, $alamatFoto);

    //     // message
    //     $this->session->setFlashdata('message', 'User Berhasil Ditambahkan');

    //     return redirect()->to('/');
    // }

    // // read
    // public function getAllUser()
    // {
    //     $data = [
    //         'result' => $this->userModel->getUser(),
    //         'validation' => \Config\Services::validation()
    //     ];
    //     // return view('/', $data); // belum fix
    // }

    // // update 
    // public function editUser($email)
    // {
    //     $data['validation'] = \Config\Services::validation();
    //     $data['user'] = $this->userModel->getUserByEmail($email);
    //     return view('register', $data); //ke view profile user (masih belum fix)
    // }

    // // edit data user (model)
    // public function doEditUser()
    // {
    //     if (!$this->profileValidation()) {
    //         $validation = \Config\Services::validation();
    //         // return redirect()->to('/Index/editProfile')->withInput()->with('validation', $validation);
    //     }

    //     $path = "assets/images/";
    //     $nama = $this->request->getPost('nama');
    //     $email = $this->request->getPost('email');
    //     $password = md5($this->request->getPost('password'));
    //     $tanggalLahir = $this->request->getPost('tanggalLahir');
    //     $nomorTelepon = $this->request->getPost('nomorTelepon');
    //     $role = $this->request->getPost('role');
    //     $fotoUser = $this->request->getFile('fotoUser');

    //     $fotoLama = NULL;

    //     // jika user tidak memasukkan foto
    //     if ($fotoUser->getError() == 4) {

    //         // untuk mendapatkan foto lama
    //         $dataUser = $this->userModel->getUserByEmail($email);
    //         $fotoLama = $dataUser['foto'];

    //         // hapus foto
    //         if (is_file($fotoLama)) {
    //             unlink($fotoLama);
    //         }

    //         // untuk nama foto & dipindahkan ke folder img (public)
    //         $fotoUser->move($path);

    //         // untuk mendapatkan alamat foto (db)
    //         $alamatFoto = $path . $fotoUser->getName();
    //     }

    //     // kirim data ke model
    //     $this->userModel->insertDataRegister($nama, $email, $password, $tanggalLahir, $nomorTelepon, $alamatFoto, $role);

    //     // message
    //     $this->session->setFlashdata('message', 'Data user berhasil diubah');

    //     return redirect()->to('/');
    // }

    // // delete
    // public function deleteUser($email)
    // {
    //     $this->userModel->deleteUser($email);
    //     $this->session->setFlashdata('message', 'User berhasil di hapus');

    //     // redirect()->to('/');(belum fix)
    // }

    // --------------------------------- BOOKING ------------------------------------
    // create

    // do booking (view)
    public function addBookingAdmin($idHotel)
    {
        if ($this->session->get('log_sess')) {

            $hotel = $this->hotelModel->getHotelById($idHotel);
            $hotel['emailUser'] = session()->get('email');
            $hotel['validation'] = \Config\Services::validation();
            return view('user/bookingform', $hotel);
        }
        return view('user/index');
    }

    // do Booking (model) 
    public function doBookingAdmin()
    {
        if (!$this->addBookingValidation()) {

            $validation = \Config\Services::validation();
            return redirect()->to('/Admin/addBookingAdmin')->withInput()->with('validation', $validation);
        }

        $idBooking = $this->request->getPost('idBooking');
        $idHotel = $this->request->getPost('idHotel');
        $hotel = $this->hotelModel->getHotelById($idHotel);
        $namaHotel = $hotel['namaHotel'];
        $emailUser = $this->request->getPost('emailUser');
        $namaLengkapTamu = $this->request->getPost('namaLengkapTamu');
        $nomorTeleponTamu = $this->request->getPost('nomorTeleponTamu');
        $emailTamu = $this->request->getPost('emailTamu');
        $jumlahKamar = $this->request->getPost('jumlahKamar');
        $checkIn = $this->request->getPost('checkIn');
        $checkOut = $this->request->getPost('checkOut');
        $harga = $this->request->getPost('hargaTotal');
        $jamTanggalBooking = Time::now('Asia/Jakarta');
        // kirim data ke model
        $this->bookingModel->insertBooking($idBooking, $idHotel, $namaHotel, $emailUser, $namaLengkapTamu, $nomorTeleponTamu, $emailTamu, $jumlahKamar, $checkIn, $checkOut, $harga, $jamTanggalBooking);

        // message
        $this->session->setFlashdata('message', 'Berhasil Booking');

        return redirect()->to('/index/hotelPage');
    }

    // read
    public function getAllBooking()
    {
        $data = [
            'result' => $this->bookingModel->getDetailBookingAll(),
            'validation' => \Config\Services::validation()
        ];
        return view('admin/adminbooktable', $data);
    }

    // update

    // edit booking (view)
    // public function editBooking($idBooking)
    // {
    //     $data['validation'] = \Config\Services::validation();
    //     $data['booking'] = $this->bookingModel->getDetailBookingUserById($idBooking);
    //     // return view('', $data); belum fix
    // }

    // // edit booking (model)
    // public function doEditBooking()
    // {
    //     if (!$this->bookingValidation()) {
    //         $validation = \Config\Services::validation();
    //         // return redirect()->to('/Index/addBooking')->withInput()->with('validation', $validation); blm fix
    //     }

    //     $idBooking = $this->request->getPost('idBooking');
    //     $idHotel = $this->request->getPost('idHotel');
    //     $emailUser = $this->session->get('email');
    //     $namaLengkapTamu = $this->request->getPost('namaLengkapTamu');
    //     $nomorTeleponTamu = $this->request->getPost('nomorTeleponTamu');
    //     $emailTamu = $this->request->getPost('emailTamu');
    //     $jumlahKamar = $this->request->getPost('jumlahKamar');
    //     $checkIn = $this->request->getPost('checkIn');
    //     $checkOut = $this->request->getPost('checkOut');
    //     $harga = $this->request->getPost('harga');
    //     $jamTanggalBooking = $this->request->getPost('jamTanggalBooking');

    //     // kirim data ke model
    //     $this->bookingModel->editBooking($idBooking, $idHotel, $emailUser, $namaLengkapTamu, $nomorTeleponTamu, $emailTamu, $jumlahKamar, $checkIn, $checkOut, $harga, $jamTanggalBooking);

    //     // message
    //     $this->session->setFlashdata('message', 'Update Booking Berhasil');

    //     // redirect()->to('/');(belum fix)
    // }

    // delete
    public function deleteBooking($idBooking)
    {
        $this->bookingModel->deleteBooking($idBooking);
        $this->session->setFlashdata('message', 'Booking berhasil di hapus');

        return redirect()->to('/admin/getAllBooking');
    }

    // --------------------------------- HOTEL ------------------------------------
    // create
    // function utk tambah hotel (view)
    public function addHotel()
    {
        $data['validation'] = \Config\Services::validation();
        return view('admin/addhotel', $data);
    }

    // function utk tambah hotel (model)
    public function doAddHotel()
    {
        if (!$this->hotelValidation()) {

            $validation = \Config\Services::validation();
            return redirect()->to('/Admin/addHotel')->withInput()->with('validation', $validation);
        }

        $path = "assets/images/";
        $idHotel = $this->request->getPost('idHotel');
        $namaHotel = $this->request->getPost('namaHotel');
        $fasilitas = $this->request->getPost('fasilitas');
        $jumlahKamar = $this->request->getPost('jumlahKamar');
        $rating = $this->request->getPost('rating');
        $harga = $this->request->getPost('harga');
        $lokasi = $this->request->getPost('lokasi');
        $fotoHotel = $this->request->getFile('fotoHotel');

        // jika user tidak memasukkan foto
        if ($fotoHotel->getError() == 4) {
            $alamatFoto = 'defaultHotel.jpg';
        } else {
            // untuk nama foto & dipindahkan ke folder img (public)
            $fotoHotel->move($path);

            // untuk mendapatkan alamat foto (db)
            $alamatFoto = $path . $fotoHotel->getName();
        }

        // kirim data ke model
        $this->hotelModel->insertHotel($idHotel, $namaHotel, $fasilitas, $jumlahKamar, $rating, $harga, $lokasi, $alamatFoto);

        // message
        $this->session->setFlashdata('message', 'Hotel Berhasil di tambahkan');

        return redirect()->to('/index/adminPage');
    }

    // read
    public function getAllHotel()
    {
        $data['validation'] = \Config\Services::validation();
        $data['result'] = $this->hotelModel->getDataHotel();
        return view('admin/adminhoteltable.php', $data);
    }

    // update
    // function utk update hotel (view)
    public function editHotel($idHotel)
    {
        $data['validation'] = \Config\Services::validation();
        $data['hotel'] = $this->hotelModel->getHotelById($idHotel);
        return view('admin/edithotel', $data);
    }

    // function utk update hotel (model)
    public function doEditHotel()
    {
        if (!$this->hotelValidation()) {

            $validation = \Config\Services::validation();
            return redirect()->to('/Admin/editHotel' . $this->request->getPost('idHotel'))->withInput()->with('validation', $validation);
        }

        $path = "assets/images/";
        $idHotel = $this->request->getPost('idHotel');
        $namaHotel = $this->request->getPost('namaHotel');
        $fasilitas = $this->request->getPost('fasilitas');
        $jumlahKamar = $this->request->getPost('jumlahKamar');
        $rating = $this->request->getPost('rating');
        $harga = $this->request->getPost('harga');
        $lokasi = $this->request->getPost('lokasi');
        $fotoHotel = $this->request->getFile('fotoHotel');

        $fotoLama = NULL;
        $alamatFoto = '';

        if ($fotoHotel->getError() == 4) {
            $dataUser = $this->hotelModel->getHotelById($idHotel);
            $fotoLama = $dataUser['fotoHotel'];

            $alamatFoto = $fotoLama;
        } else {
            $dataUser = $this->hotelModel->getHotelById($idHotel);
            $fotoLama = $dataUser['fotoHotel'];
            // hapus foto
            if (is_file($fotoLama)) {
                unlink($fotoLama);
            }
            // untuk nama foto & dipindahkan ke folder img (public)
            $fotoHotel->move($path);

            // untuk mendapatkan alamat foto (db)
            $alamatFoto = $path . $fotoHotel->getName();
        }

        // jika user memasukkan foto baru
        // if ($fotoHotel->getError() !== 4) {

        //     // untuk mendapatkan foto lama
        //     $dataUser = $this->hotelModel->getHotelById($idHotel);
        //     $fotoLama = $dataUser['fotoHotel'];

        //     // hapus foto
        //     if (is_file($fotoLama)) {
        //         unlink($fotoLama);
        //     }

        //     // untuk nama foto & dipindahkan ke folder img (public)
        //     $fotoHotel->move($path);

        //     // untuk mendapatkan alamat foto (db)
        //     $alamatFoto = $path . $fotoHotel->getName();
        // }
        // dd($path . $fotoHotel->getName());

        // kirim data ke model
        $this->hotelModel->editHotel($idHotel, $namaHotel, $fasilitas, $jumlahKamar, $rating, $harga, $lokasi, $alamatFoto);

        // message
        $this->session->setFlashdata('message', 'Data Hotel Berhasil diubah');

        return redirect()->to('/index/adminPage');
    }

    // delete
    public function deleteHotel($idHotel)
    {
        // untuk mendapatkan foto lama
        $dataUser = $this->hotelModel->getHotelById($idHotel);

        $fotoLama = $dataUser['fotoHotel'];

        // hapus foto
        unlink($fotoLama);

        $this->hotelModel->deleteHotel($idHotel);
        $this->session->setFlashdata('message', 'Hotel berhasil di hapus');

        return redirect()->to('/index/adminPage');
    }
}
