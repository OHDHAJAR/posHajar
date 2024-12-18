<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function login()
    {
        check_already_login();
        $this->load->view('home/login');
    }

    public function proses()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($post['login'])) {
            $this->load->model('user_m');
            $query = $this->user_m->login($post);
            if ($query->num_rows() > 0) {
                $row = $query->row();
                $sesi = [
                    'userid'    => $row->user_id,
                    'level'     => $row->level
                ];
                // var_dump($row);
                // die();
                $this->session->set_userdata($sesi);
                $this->session->set_flashdata('pesan', 'Connexion réussie');
                redirect('home');
            } else {
                echo "<script>
                alert('Échec de la connexion, nom d'utilisateur ou mot de passe incorrect !');
                window.location='" . site_url('login') . "';
            </script>";
            }
        }
    }

    public function logout()
    {
        $sesi = ['userid', 'level'];
        $this->session->unset_userdata($sesi);
        $this->session->set_flashdata('pesan', 'J\'ai réussi !');
        redirect('login');
    }
}
