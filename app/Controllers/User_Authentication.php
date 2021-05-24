<?php

namespace App\Controllers;
use App\Models\login_database;

class User_Authentication extends BaseController {
    
    public function index() {
        echo view('stranice/index');
    }
    
    public function index_noc() {
        echo view('stranice/index_night');
    }
    
    public function registracija() {
        echo view('stranice/registration_form');
    }
        
    public function prijava() {
        echo view('stranice/login_form');
    }
    
    public function prijava_noc() {
        echo view('stranice/login_form_night');
    }
    
    public function registracija_noc() {
        echo view('stranice/registration_form_night');
    }
    
    public function new_user_registration() {
        $messages = [];
        
        $data = array(
            'Ime' => $this->request->getVar('name'),
            'Prezime' => $this->request->getVar('surname'),
            'Email' => $this->request->getVar('email'),
            'Korisnicko_ime' => $this->request->getVar('username'),
            'Lozinka' => $this->request->getVar('password'),
            'Broj_pobeda' => 0,
            'Kategorija_korisnika' => 'K');
        
        if(!$this->validate([
            'name' => 'required'
        ])) {
            $messages['name'] = 'ime';
            $messages['message'] = 'Obavezno:';
        }
        if(!$this->validate([
            'surname' => 'required'
        ])) {
            $messages['surname'] = 'prezime';
            $messages['message'] = 'Obavezno:';
        }
        if(!$this->validate([
            'email' => 'required'
        ])) {
            $messages['email'] = 'email';
            $messages['message'] = 'Obavezno:';
        }
        if(!$this->validate([
            'password' => 'required'
        ])) {
            $messages['username'] = 'korisnicko ime';
            $messages['message'] = 'Obavezno:';
        }
        if(!$this->validate([
            'password' => 'min_length[8]'
        ])) {
            $messages['passwordLen'] = 'Lozinka mora sadržati minimum 8 karaktera!';
        }
        if(!$this->validate([
            'username' => 'required'
        ])) {
            $messages['username'] = 'korisnicko ime';
            $messages['message'] = 'Obavezno:';
        }
        if($this->request->getVar('password')!=$this->request->getVar('passwordcheck')) {
            $messages['passwordDifferent'] = 'Potvrda lozinke nije ista kao lozinka!';
        }
        $loginDatabaseModel = new Login_Database();
        $korIme = $this->request->getVar('username');
        $loginDatabase = $loginDatabaseModel->where('Korisnicko_ime', $korIme)->findAll();
        if ($loginDatabase == null) {
            $loginDatabaseModel->insert($data);
            $data['message'] = 'Uspešna registracija!';
            echo view('stranice/login_form', $data);
        } else {
            $messages['usernameExist'] = 'Korisnicko ime vec postoji';
        }
        
        if ($messages != []) {
            echo view('stranice/registration_form', $messages);
        }
        
    }
    
    public function user_login_process() {
        $messages = [];
        
        $loginDatabaseModel = new Login_Database();
        $korIme = $this->request->getVar('username1');
        
        if($korIme == null) {
            if(!$this->validate([
                'username1' => 'required'
            ])) {
                $messages['username'] = 'korisničko ime';
                $messages['messag'] = 'Obavezno:';
            }
            if(!$this->validate([
                'password1' => 'required'
            ])) {
                $messages['password'] = 'lozinka';
                $messages['messag'] = 'Obavezno:';
            }
        }
        else {
            $korisnik = $loginDatabaseModel->where('Korisnicko_ime', $korIme)->findAll();
            if ($korisnik == null) {
                $messages['messagess'] = "Korisnik ne postoji!";
            }
            else {
                if($korisnik[0]->Lozinka != $this->request->getVar('password1')) {
                    $messages['messagess'] = "Neispravna lozinka!";
                }
                else {
                     
                    $this->session->set('korisnik', $korisnik);
                    //$kor = $this->session->get('korisnik');
                   // print_r($kor);
                    if($korisnik[0]->Kategorija_korisnika == 'K') 
                        return redirect()->to(site_url('User'));
                    else if($korisnik[0]->Kategorija_korisnika == 'M')
                        return redirect()->to(site_url('Moderator'));
                    else if($korisnik[0]->Kategorija_korisnika == 'A') 
                        return redirect()->to(site_url('Administrator'));
                }
            } 
        }
        
        if ($messages != []) {
            echo view('stranice/login_form', $messages);
        }
    }
    
}
