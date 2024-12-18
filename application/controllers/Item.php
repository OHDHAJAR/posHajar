<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Item extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(['item_m', 'category_m', 'unit_m']);
        check_not_login();
    }

    public function index()
    {
        $data['category'] = $this->category_m->get()->result();
        $data['unit'] = $this->unit_m->get()->result();
        $data['item'] = $this->item_m->get()->result();
        //var_dump($data['category']);
        $this->template->load('template', 'product/item/item_data', $data);
    }

    public function get_data()
    {
        $tabel = '';

        $data = $this->item_m->get()->result();

        foreach ($data as $row) {
            $tabel .= '<tr>';
            $tabel .= '<td>'.$row->barcode.'</td>';
            $tabel .= '<td>'.$row->name.'</td>';
            $tabel .= '<td style="text-align: center;">'.$row->name_unit.'</td>';
            $tabel .= '<td style="text-align: center;">'.indo_currency($row->price).'</td>';
            $tabel .= '<td>'.$row->stock.'</label>';
            $tabel .= '<td style="text-align:center;">';
            $tabel .= '<button class="btn btn-xs btn-info" id="select" data-id="'.$row->item_id.'" data-barcode="'.$row->barcode.'" data-price="'.$row->price.'" data-stock="'.$row->stock.'"><i class="fa fa-check"></i> Select</button>';
            $tabel .= '</td>';
            $tabel .= '</tr>';
        }

        header('Content-Type: application/json');
        echo json_encode($tabel);
    }

    public function cek_barcode()
    {
        $barcode = $this->input->post('data');
        $cek_data = $this->item_m->cek_data($barcode)->row_array();
        $return_data = ($cek_data) ? "Il y a" : "Il n'y en a pas";

        header('Content-Type: application/json');
        echo json_encode($return_data);
    }

    public function save()
    {
        $post = $this->input->post();
        if (!empty($_FILES['gambar']['name'])) {
            $config['upload_path']   = './uploads/product/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']      = 2 * 1024;
            $config['file_name']     = 'Product-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar')) {
                $post['gambar'] =  $this->upload->data('file_name');

                $this->item_m->save($post);
                $this->session->set_flashdata('pesan', 'Données d\'article ajoutées avec succès.');
                redirect('item');
            } else {
                $error = array('error' => $this->upload->display_errors());
                $post['gambar'] = "";
                $this->session->set_flashdata('pesan', 'L\'image que vous avez téléchargée n\'est pas appropriée, veuillez réessayer.');
                redirect('item');
            }
        } else {
            $post['gambar'] = "default.png";
            $this->item_m->save($post);
            $this->session->set_flashdata('pesan', 'Données d\'article ajoutées avec succès.');
            redirect('item');
        }
    }

    public function edit()
    {
        $id = $this->input->post('item_id');
        $data = $this->item_m->get($id)->row_array();
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function update()
    {
        $post = $this->input->post();
        if (!empty($_FILES['gambar']['name'])) {
            $config['upload_path']   = './uploads/product/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']      = 2 * 1024;
            $config['file_name']     = 'Product-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar')) {
                $post['gambar'] =  $this->upload->data('file_name');
                $this->item_m->update($post);
                if ($post['gambar_lama'] != 'default.png') {
                    unlink('./uploads/product/' . $post['gambar_lama']);
                }
                $this->session->set_flashdata('pesan', 'Les données de l\'article ont été mises à jour avec succès.');
                redirect('item');
            } else {
                $error = array('error' => $this->upload->display_errors());
                $post['gambar'] = "";
                $this->session->set_flashdata('error', 'Une erreur s\'est produite lors du téléchargement des photos, veuillez réessayer');
                redirect('item');
            }
        } else {
            $post['gambar'] = "default.png";
            $this->item_m->update($post);
            $this->session->set_flashdata('pesan', 'Les données de l\'article ont été mises à jour avec succès.');
            redirect('item');
        }
    }

    public function delete()
    {
        $id = $this->input->post('item_id');
        $item = $this->item_m->get($id)->row();

        if ($item->gambar != 'default.png') {
            unlink('./uploads/product/' . $item->gambar);
        }
        $this->item_m->delete($id);

        $this->session->set_flashdata('pesan', 'Les données de l\'article ont été supprimées avec succès!');
        redirect('item');
    }

    public function barcode_qrcode($id)
    {
        $data['item'] = $this->item_m->get($id)->row();
        $this->template->load('template', 'product/item/barcode_qrcode', $data);
    }

    public function barcode_print($id)
    {
        $data['item'] = $this->item_m->get($id)->row();
        $html = $this->load->view('product/item/barcode_print', $data, true);
        $this->fungsi->PdfGenerator($html, 'barcode-' . $data['item']->barcode, 'A4', 'landscape');
    }
    public function qrcode_print($id)
    {
        $data['item'] = $this->item_m->get($id)->row();
        $html = $this->load->view('product/item/qrcode_print', $data, true);
        // var_dump($html);
        // die();
        $this->fungsi->PdfGenerator($html, 'qrcode-' . $data['item']->barcode, 'A4', 'potrait');
    }
}
