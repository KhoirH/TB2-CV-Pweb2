<?php

namespace App\Controllers;

class Login extends BaseController
{
    public function index()
    {
        return view('LoginView');
    }

    public function save()
    {
        $petugas = model("User");
        $data = $this->request->getVar();

        $user = $petugas->where('username_petugas', $data['user'])->first();
        $encrypter = \Config\Services::encrypter();
        if ($user) {
            $ciphertext = $encrypter->decrypt(hex2bin($user->password_petugas));
            if ($ciphertext === $data['password']) {
                session()->set([
                    'islogin' => true,
                    'dataUser' => $user,
                ]);
                return redirect()->to(base_url('dashboard'));
            }
        }
        session()->setFlashdata('item', 'value');
        return redirect()->to(base_url('login'));
    }
}
