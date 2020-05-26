<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Form extends Controller
{
    public function index()
    {
        helper(['form', 'url']);

        $val = $this->validate([
            'username' => 'required',
            'password' => 'required',
            'passconf' => 'required|matches[password]',
            'email' => 'required|valid_email',
        ]);

        if (!$val) {
            echo view('FV/Signup', [
                'validation' => $this->validator
            ]);
        } else {
            echo view('FV/Success');
        }
    }
}
