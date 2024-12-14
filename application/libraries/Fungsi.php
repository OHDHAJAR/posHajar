<?php

use Dompdf\Dompdf;


class Fungsi
{
    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
    }

    function user_login()
    {
        $this->ci->load->model('user_m');
        $user_id = $this->ci->session->userdata('userid');
        $user_data = $this->ci->user_m->get($user_id)->row();
        return $user_data;
    }

    public function PdfGenerator($html, $filename, $paper, $orientation)
    {
        // Initialize Dompdf
        $dompdf = new Dompdf();

        // Load HTML content
        $dompdf->loadHtml($html);

        // Set paper size and orientation
        $dompdf->setPaper($paper, $orientation);

        // Render the PDF
        $dompdf->render();

        // Stream the PDF to the browser
        $dompdf->stream($filename, ["Attachment" => 0]);
    }
}
