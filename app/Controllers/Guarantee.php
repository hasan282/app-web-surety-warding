<?php

namespace App\Controllers;

class Guarantee extends BaseController
{
    public function index()
    {
        if (!is_login())
            return login_page(full_url(false));
        $data['title'] = 'Data Jaminan';
        $data['jscript'] = 'all/tables';
        $this->plugin->setup('scrollbar');
        return $this->view('guarantee/index', $data, true);
    }

    public function detail()
    {
        if (!is_login())
            return login_page(full_url(false));
        $data['title'] = 'Detail Jaminan';
        $data['bread'] = array('Data Jaminan|guarantee', 'Detail');
        $this->plugin->setup('scrollbar');
        $this->view('guarantee/detail', $data);
    }

    public function add_phase1()
    {
        if (!is_login())
            return login_page(full_url(false));
        $data['title'] = 'Tambah Data Jaminan';
        $data['bread'] = array('Jaminan|guarantee', 'Tambah Baru');
        $this->plugin->setup('scrollbar');
        $this->view('guarantee/add/phase1', $data);
    }

    public function add_phase2($param)
    {
        if (!is_login())
            return login_page(full_url(false));
        $data['title'] = 'Lengkapi Data Jaminan';
        $data['bread'] = array('Jaminan|guarantee', 'Lengkapi Data');
        $this->plugin->setup('scrollbar');
        $this->view('guarantee/add/phase2', $data);
    }

    public function print($param)
    {
        if (!is_login())
            return login_page(full_url(false));
        $data['title'] = 'Cetak Jaminan';
        $data['bread'] = array('Jaminan|guarantee', 'Detail|guarantee/detail', 'Cetak');
        $this->plugin->setup('scrollbar|jspdf');
        $this->view('guarantee/print/index', $data);
    }

    public function table($section, $page)
    {
        $functions = array(
            'draft' => 'guaranteeDraft',
            'issued' => 'guaranteeIssued'
        );
        if (in_array($section, array_keys($functions))) {
            $tables = new \App\Libraries\Tables;
            return $this->response->setJSON($tables->{$functions[$section]}($page));
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
}
