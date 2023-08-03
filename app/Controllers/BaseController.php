<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */

class BaseController extends Controller
{
	/**
	 * Instance of the main Request object.
	 *
	 * @var IncomingRequest|CLIRequest
	 */
	protected $request;

	/**
	 * An array of helpers to be loaded automatically upon
	 * class instantiation. These helpers will be available
	 * to all other controllers that extend BaseController.
	 *
	 * @var array
	 */
	protected $helpers = [];

	/**
	 * Constructor.
	 *
	 * @param RequestInterface  $request
	 * @param ResponseInterface $response
	 * @param LoggerInterface   $logger
	 */
	public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);

		//--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		//--------------------------------------------------------------------
		// E.g.: $this->session = \Config\Services::session();
		$this->session = session();
		helper('form');
		$this->db = db_connect();
	}

	public function loginValidation()
	{
		return $this->validate([
			'email' => [
				'rules' => 'required|valid_email',
				'errors' => [
					'required' => 'Email field required',
					'valid_email' => 'Please enter a valid email'
				]
			],
			'password' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Password field required',
				]
			]
		]);
	}

	public function registerValidation()
	{
		return $this->validate([
			'nama' => [
				'rules' => 'required|max_length[50]',
				'errors' => [
					'required' => 'Name field required',
					'max_length' => 'Name can only hold up to 50 characters'
				]
			],
			'email' => [
				'rules' => 'required|valid_email',
				'errors' => [
					'required' => 'Email field required',
					'valid_email' => 'Please enter a valid email'
				]
			],
			'password' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Password field required'
				]
			],
			'retypePass' => [
				'rules' => 'required|matches[password]',
				'errors' => [
					'required' => 'Password field required',
					'matches' => 'Password not match'
				]
			],
			'tanggalLahir' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Birth Date field required'
				]
			],
			'nomorTelepon' => [
				'rules' => 'required|integer|min_length[12]|max_length[13]',
				'errors' => [
					'required' => 'Phone Number field required',
					'integer' => 'Phone Number must be fill by number',
					'min_length' => 'Phone Number must be filled in at least 12 digits',
					'max_length' => 'Phone Number can only hold up to 13 numbers'
				]
			],
			// 'fotoUser' => [
			// 	'rules' => 'max_size[fotoUser,1024]|is_image[fotoUser]|mime_in[fotoUser,image/jpg,image/jpeg,image/png]',
			// 	'errors' => [
			// 		'max_size' => 'Ukuran gambar terlalu besar',
			// 		'is_image' => 'File yang dimasukkan harus berupa gambar',
			// 		'mime_in' => 'File yang dimasukkan harus berupa gambar'
			// 	]
			// ]
		]);
	}

	public function addBookingValidation()
	{
		return $this->validate([

			'namaLengkapTamu' => [
				'rules' => 'required|max_length[50]',
				'errors' => [
					'required' => 'Name field is required',
					'max_length' => 'Name field can hold up to 50 characters'
				]
			],
			'nomorTeleponTamu' => [
				'rules' => 'required|integer|min_length[12]|max_length[13]',
				'errors' => [
					'required' => 'Phone Number field is required',
					'integer' => 'Phone Number field must be filled with numbers',
					'min_length' => 'Phone Number field must have at least 12 numbers',
					'max_length' => 'Phone Number field can hold up to 13 numbers'
				]
			],
			'emailTamu' => [
				'rules' => 'required|valid_email',
				'errors' => [
					'required' => 'Email field is required',
					'valid_email' => 'Please enter a valid email address'
				]
			],
			'jumlahKamar' => [
				'rules' => 'required|integer|min_length[1]',
				'errors' => [
					'required' => 'Jumlah Kamar field is required',
					'integer' => 'Jumlah Kamar field must be filled with numbers',
					'min_length' => 'Jumlah Kamar field must have at least 1 numbers'
				]
			],
			'checkIn' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Check In field is required'
				]
			],
			'checkOut' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Check Out field is required'
				]
			]
		]);
	}


	public function bookingValidation()
	{
		return $this->validate([
			'namaLengkapTamu' => [
				'rules' => 'required|max_length[50]',
				'errors' => [
					'required' => 'Name field is required',
					'max_length' => 'Name field can hold up to 50 characters'
				]
			],
			'noTelpTamu' => [
				'rules' => 'required|integer|min_length[12]|max_length[13]',
				'errors' => [
					'required' => 'Phone Number field is required',
					'integer' => 'Phone Number field must be filled with numbers',
					'min_length' => 'Phone Number field must have at least 12 numbers',
					'max_length' => 'Phone Number field can hold up to 13 numbers'
				]
			],
			'emailTamu' => [
				'rules' => 'required|valid_email',
				'errors' => [
					'required' => 'Email field is required',
					'valid_email' => 'Please enter a valid email address'
				]
			],
			'jumlahKamar' => [
				'rules' => 'required|integer|min_length[1]',
				'errors' => [
					'required' => 'Jumlah Kamar field is required',
					'integer' => 'Jumlah Kamar field must be filled with numbers',
					'min_length' => 'Jumlah Kamar field must have at least 1 numbers'
				]
			],
			'checkIn' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Check In field is required'
				]
			],
			'checkOut' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Check Out field is required'
				]
			]
		]);
	}

	public function profileValidation()
	{
		return $this->validate([
			'nama' => [
				'rules' => 'required|max_length[50]',
				'errors' => [
					'required' => 'Nama harus diisi',
					'max_length' => 'Nama hanya dapat menampung hingga 50 karakter'
				]
			],
			'password' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Password harus diisi'
				]
			],
			'tanggalLahir' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Tanggal Lahir harus diisi'
				]
			],
			'nomorTelepon' => [
				'rules' => 'required|integer|min_length[12]|max_length[13]',
				'errors' => [
					'required' => 'Nomor Telepon harus diisi',
					'integer' => 'Nomor Telepon harus diisi dengan angka',
					'min_length' => 'Nomor Telepon minimal harus diisi 12 angka',
					'max_length' => 'Nomor Telepon hanya dapat menampung hingga 13 angka'
				]
			],
			// 'fotoUser' => [
			// 	'rules' => 'max_size[fotoUser,1024]|is_image[fotoUser]|mime_in[fotoUser,image/jpg,image/jpeg,image/png]',
			// 	'errors' => [
			// 		'max_size' => 'Ukuran gambar terlalu besar',
			// 		'is_image' => 'File yang dimasukkan harus berupa gambar',
			// 		'mime_in' => 'File yang dimasukkan harus berupa gambar'
			// 	]
			// ]
		]);
	}

	public function hotelValidation()
	{
		return $this->validate([
			'idHotel' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Hotel ID field is required'
				]
			],
			'namaHotel' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Hotel Name field is required'
				]
			],
			'fasilitas' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Facilities field is required'
				]
			],
			'jumlahKamar' => [
				'rules' => 'required|integer',
				'errors' => [
					'required' => 'Number of Rooms field is required',
					'integer' => 'Number of Rooms field must be filled with numbers'
				]
			],
			'rating' => [
				'rules' => 'required|integer|max_length[1]',
				'errors' => [
					'required' => 'Rating field is required',
					'integer' => 'Rating field must be filled with numbers',
					'max_length' => 'Rating field can hold up to 1 numbers'
				]
			],
			'harga' => [
				'rules' => 'required|integer',
				'errors' => [
					'required' => 'Price field is required',
					'integer' => 'Price field must be filled with numbers'

				]
			],
			'lokasi' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Lokasi field is required'
				]
			],
			// 'fotoHotel' => [
			// 	'rules' => 'uploaded[fotoHotel]|max_size[fotoHotel,1024]|is_image[fotoHotel]|mime_in[fotoHotel,image/jpg,image/jpeg,image/png]',
			// 	'errors' => [
			// 		'uploaded' => 'Image field is required',
			// 		'max_size' => 'Image Size does not match',
			// 		'is_image' => 'The File must be an image',
			// 		'mime_in' => 'The File must be an image'
			// 	]
			// ]
		]);
	}
}
