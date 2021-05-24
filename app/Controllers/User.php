<?php

namespace App\Controllers;
use App\Models\login_database;

class User extends BaseController
{
    public function promena_lozinke()
    {
        echo view('stranice/change_password_form', ['controller' => 'user']);
    }
    
    public function promena_lozinke_noc()
    {
        echo view('stranice/change_password_form_night', ['controller' => 'user']);
    }
    
    public function change_password() {
        $messages = [];
        //echo view('stranice/change_password_form', ['controller' => 'user']);
        
        $old_pass = $this->request->getVar('oldpassword');
        $new_pass = $this->request->getVar('newpassword');
        $new_pass_check = $this->request->getVar('newpasswordcheck');
        //print_r($old_pass);
        //print_r($new_pass);
        //print_r($new_pass_check);
        if(!$this->validate([
            'oldpassword' => 'required'
        ])&& $old_pass == null) {
            $messages['old_pass'] = 'stara lozinka';
            $messages['message'] = 'Obavezno:';
        }
        if(!$this->validate([
            'newpassword' => 'required'
        ]) && $new_pass == null) {
            $messages['new_pass'] = 'nova lozinka';
            $messages['message'] = 'Obavezno:';
        }
        if(!$this->validate([
            'newpasswordcheck' => 'required'
        ])&& $new_pass_check == null) {
            $messages['new_pass_check'] = 'potvrda nove lozinke';
            $messages['message'] = 'Obavezno:';
        }
        if(!$this->validate([
            'newpassword' => 'min_length[8]'
        ]) && $new_pass != null) {
            $messages['passLen'] = 'Lozinka mora sadržati minimum 8 karaktera!';
        }
        if(!$this->validate([
            'newpasswordcheck' => 'min_length[8]'
        ]) && $new_pass_check != null) {
            $messages['newpasscheckLen'] = 'Potvrda nove lozinke mora sadržati minimum 8 karaktera!';
        }
        if($old_pass != null) {
           // $this->session->destroy();
            $korisnik = $this->session->get('korisnik');
            print_r($korisnik);
            if($korisnik[0]->Lozinka != $old_pass) {
                $messages['messageOld'] = "Stara lozinka nije ispravna!";
            }
            else {
                if($new_pass != $new_pass_check) {
                    $messages['newpasswordDifferent'] = "Potvrda lozinke nije ista kao lozinka!";
                }
                else {
                    $loginDatabaseModel = new Login_Database();
                   // $kor = $loginDatabaseModel->find($korisnik[0]->ID_korisnik);
                    $korisnik[0]->Lozinka = "";
                    $korisnik[0]->Lozinka = $new_pass;
                    print_r($korisnik);
                    $loginDatabaseModel->update($korisnik[0]->ID_korisnik, $korisnik[0]);
                    echo view('stranice/login_form');
                }
            }
        } 
        
        //print_r($messages);
       if ($messages != []) {
            echo view('stranice/change_password_form', $messages);
        }
    }

}
