<?php

namespace App\Controllers\Authentication;

use App\Controllers\BaseController;
use App\Models\Authentication\AuthenticationModel;
use CodeIgniter\HTTP\ResponseInterface;
use Google\Service\ServiceConsumerManagement\Authentication;
use Google_Client;

class Login extends BaseController
{
    protected $googleClient;
    protected $googleService;
    protected $users;

    public function __construct()
    {
        $client_id_env = $_ENV['OAUTH_CLIENT_ID'];
        $client_secret_env = $_ENV['OAUTH_CLIENT_SECRET'];
        $redirect_url_env = $_ENV['OAUTH_CLIENT_CALLBACK'];
        helper('form');
        helper('cookie');
        $this->googleClient = new Google_Client();
        $this->googleClient->setClientId($client_id_env);
        $this->googleClient->setClientSecret($client_secret_env);
        $this->googleClient->setRedirectUri($redirect_url_env);
        $this->googleClient->addScope('email');
        $this->googleClient->addScope('profile');
    }

    function index()
    {
        $data['link'] = $this->googleClient->createAuthUrl();
        return view('landingpage/login', $data);
    }

    public function callback()
    {
        $token = $this->googleClient->fetchAccessTokenWithAuthCode($this->request->getVar('code'));

        if (!isset($token['error'])) {
            $this->googleClient->setAccessToken($token['access_token']);
            $googleService = new \Google_Service_Oauth2($this->googleClient);
            $data = $googleService->userinfo->get();
            // print_r($data);
            $AuthenticationModel = new  AuthenticationModel();
            $user = $AuthenticationModel->cek_user_login($data['email']);
            // print_r($user);
            if ($user == null) 
            {
                echo "<script>
                    alert('Akun Anda Tidak Aktif. Silahkan Hubungi Administrator.');
                    window.location='" . site_url('/') . "';
                    </script>";
            }else
            {
                if($user[0]->status_user == 'Y')
                {
                    $row = $user[0];
                    $params = array(
                        'id' => $row->id,
                        'nama_lengkap' => $row->nama_lengkap,
                        'email' => $row->email,
                        'jenis_kelamin' => $row->jenis_kelamin,
                        'user_nip' => $row->user_nip,
                        'status_user' => $row->status_user,
                        'level' => $row->level,
                        'nama_hakakses' => $row->nama_hakakses,
                        'jabatan_id' => $row->jabatan_id,
                        'nama_jabatan' => $row->nama_jabatan,
                        'grupjabatan_id' => $row->grupjabatan_id,
                        'nama_grupjabatan' => $row->nama_grupjabatan,
                        'tipeuser_id' => $row->tipeuser_id,
                        'nama_tipeuser' => $row->nama_tipeuser,
                        'subsatker_id' => $row->subsatker_id,
                        'nama_subsatker' => $row->nama_subsatker
                    );
                    session()->set($params);
                    return redirect()->to('/beranda');
                }else
                {
                    echo "<script>
                    alert('Akun Anda Tidak Aktif. Silahkan Hubungi Administrator.');
                    window.location='" . site_url('/') . "';
                    </script>";
                }
            }
        }
    }

    function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
