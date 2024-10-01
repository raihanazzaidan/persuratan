<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class FilterAdmin implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (session()->level=='')
        {
            $sessFlashdata = [
                'sweetAlert' => [
                    'message' => 'Anda tidak memiliki akses.',
                    'icon' => 'error'
                ],
            ];
            session()->setFlashdata($sessFlashdata);
            return redirect()->to('/beranda');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        if(session()->level == 2)
        {
            $sessFlashdata = [
                'sweetAlert' => [
                    'message' => 'Anda sudah login, perhatikan hak akses yang dimiliki.',
                    'icon' => 'success'
                ],
            ];
            session()->setFlashdata($sessFlashdata);
            return redirect()->to('/beranda');
        }
    }
}