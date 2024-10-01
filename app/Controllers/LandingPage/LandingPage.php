<?php

namespace App\Controllers\LandingPage;

use App\Controllers\BaseController;
use Google_Client;
use CodeIgniter\HTTP\ResponseInterface;

class LandingPage extends BaseController
{
    protected $googleClient;
    protected $googleService;

    function __construct()
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
}