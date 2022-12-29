<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {   
        if(session()->has('loggedComp')){
            return redirect()->to('/page/compProfile');
        }
        if(!session()->has('loggedUser')){
            return redirect()->to('/auth')->with('fail', 'You must be logged in!');
        }
        
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}
