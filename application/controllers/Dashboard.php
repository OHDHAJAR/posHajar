<?php
defined('BASEPATH') or exit('Accès direct interdit.');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model(['user_m', 'item_m', 'supplier_m', 'customer_m', 'sale_m']);
    }

    public function index()
    {
        $data = [
            'product' => [],
            'item' => 0,
            'supplier' => 0,
            'user' => 0,
            'customer' => 0,
        ];
    
        try {
            $data['product'] = $this->sale_m->sale_detail()->result();
            $data['item'] = $this->item_m->get()->num_rows();
            $data['supplier'] = $this->supplier_m->get()->num_rows();
            $data['user'] = $this->user_m->getAllUsers()->num_rows();
            $data['customer'] = $this->customer_m->get()->num_rows();
        } catch (Exception $e) {
            log_message('error', $e->getMessage());
        }
    
        $this->template->load('template', 'dashboard', $data);
    }
    
}
