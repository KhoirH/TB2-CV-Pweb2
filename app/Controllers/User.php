<?php

namespace App\Controllers;

class User extends BaseController
{

    public function index()
    {
    
        $user = model("User");
            
        return view('UserView', [
            'data' => $user->findAll()
        ]);
    }


    public function Search()
    {
    
        $user = model("User");
    
        if($this->request->getVar('search') && $this->request->getVar('search') != ''){
            $user = $user->where('username_petugas', $this->request->getVar('search'));
        }
    
        $user = $user->find();
    
        return view('UserView', [
            'data' => $user
        ]);
    }


    public function Tambah()
    {
        return view('TambahUser', [
            'action' => base_url().'/User/DoTambahUser'
        ]);
    }


    public function DoTambahUser()
    {
    
        $data = $this->request->getPost();
        $user = model("User");
    
        if(!$user->where('username_petugas', $this->request->getVar('username_petugas'))->find()) {
            $encrypter = \Config\Services::encrypter();
            $ciphertext = bin2hex($encrypter->encrypt($data['password_petugas']));

            $data['password_petugas'] = $ciphertext; 
            // var_dump($data);
            $user->insert($data);
        }
    
        return redirect()->to(base_url('User'));
    }


    public function HapusUser($id)
    {
        $user = model("User");
        $user->where('id_petugas', $id)->delete();
    
        return redirect()->to(base_url('User'));
    }


    public function EditUser($id)
    {
        $user = model("User");
        $user = $user->where('id_petugas', $id)->first();
    
        return view('TambahUser', [
            'dataUser' => $user,
            'action' => base_url().'/User/DoEdit/'.$id
        ]);
    }


    public function DoEdit($id)
    {
    
        $data = $this->request->getPost();
        $user = model("User");
        $user = $user->where('id_petugas', $id);
        //Encrypt password
        $encrypter = \Config\Services::encrypter();
        $ciphertext = bin2hex($encrypter->encrypt($data['password_petugas']));
        $data['password_petugas'] = $ciphertext; 
        // update data yang ditemukan dengan parameter form 
        $user->update($id, $data);
    
        return redirect()->to(base_url('User'));
    }

}
