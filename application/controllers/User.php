<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Kegiatan_model');
    }

    public function index()
    {
        $data['title'] = 'Proposal Kegiatan';
        $limit = 5;
        $totalpages = $this->Kegiatan_model->countKegiatanUser();

        // pagination
        $this->load->library('pagination');

        // searching
        if ($this->input->post('submit')) {
            $data['keyword'] = $this->input->post('keyword');
        } else {
            $data['keyword'] = null;
        }


        // config
        $config['base_url'] = 'http://localhost/wpu-login/user/index';
        $config['total_rows'] = $totalpages;
        $config['per_page'] = $limit;

        // style
        $config['full_tag_open'] = '<nav><ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul></nav>';

        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';


        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="page-item active"> <a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';

        $config['attributes'] = array('class' => 'page-link');

        // initialize
        $this->pagination->initialize($config);




        // $data['kegiatan'] = $this->Kegiatan_model->getAllKegiatan();
        $data['start'] = $this->uri->segment(3);
        $data['kegiatan'] = $this->Kegiatan_model->getKegiatanUser($config['per_page'], $data['start'], $data['keyword']);
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer', $data);
    }
    public function tambah_u()
    {
        $data['title'] = 'Tambah Proposal Kegiatan';

        $data['kegiatan'] = $this->Kegiatan_model->getAllKegiatan();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama_keg', 'Nama Kegiatan', 'required');
        $this->form_validation->set_rules('kategori_keg', 'Kategori Kegiatan', 'required');
        $this->form_validation->set_rules('pic_keg', 'PIC Kegiatan', 'required');
        $this->form_validation->set_rules('deskripsi_keg', 'Deskripsi Kegiatan', 'required');
        $this->form_validation->set_rules('mengetahui', 'Mengetahui Kegiatan', 'required');
        $this->form_validation->set_rules('output_keg', 'Luaran Kegiatan', 'required');
        $this->form_validation->set_rules('target_waktu_rencana', 'Target Waktu Rencana', 'required');
        $this->form_validation->set_rules('target_waktu_realisasi', 'Target Waktu Realisasi', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('kegiatan/tambah', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Kegiatan_model->tambahKegiatan();

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Proposal berhasil ditambahkan!
          </div>');
            redirect('user');
        }
    }

    public function detail($id)
    {

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['subtitle'] = 'Anggaran';
        $data['title'] = 'Detail Proposal Kegiatan';

        $data['kegiatan'] = $this->Kegiatan_model->getKegiatanById($id);
        $data['anggaran'] = $this->Kegiatan_model->getAllAnggaran($id);




        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kegiatan/detail', $data);
        $this->load->view('templates/footer', $data);
    }

    public function hapus($id)
    {
        $this->Kegiatan_model->hapusKegiatan($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Proposal berhasil dihapus!
          </div>');
        redirect('user');
    }
    public function update_f($id)
    {
        $data['title'] = 'Update Proposal Kegiatan';

        $data['kegiatan'] = $this->Kegiatan_model->getKegiatanById($id);
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kegiatan/update', $data);
        $this->load->view('templates/footer', $data);
    }

    public function update_s()
    {
        $data['title'] = 'Update Proposal Kegiatan';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama_keg', 'Nama Kegiatan', 'required');
        $this->form_validation->set_rules('kategori_keg', 'Kategori Kegiatan', 'required');
        $this->form_validation->set_rules('pic_keg', 'PIC Kegiatan', 'required');
        $this->form_validation->set_rules('deskripsi_keg', 'Deskripsi Kegiatan', 'required');
        $this->form_validation->set_rules('mengetahui', 'Mengetahui Kegiatan', 'required');
        $this->form_validation->set_rules('output_keg', 'Luaran Kegiatan', 'required');
        $this->form_validation->set_rules('target_waktu_rencana', 'Target Waktu Rencana', 'required');
        $this->form_validation->set_rules('target_waktu_realisasi', 'Target Waktu Realisasi', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('kegiatan/update', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Kegiatan_model->updateKegiatan();

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Proposal berhasil diupdate!
          </div>');
            redirect('user');
        }
    }

    public function tambah_a()
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['subtitle'] = 'Anggaran';
        $data['title'] = 'Detail Proposal Kegiatan';
        $id = $this->input->post('kegiatan_id');

        $data['kegiatan'] = $this->Kegiatan_model->getKegiatanById($id);

        $this->form_validation->set_rules('kebutuhan', 'Kebutuhan', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required|numeric');
        $this->form_validation->set_rules('satuan', 'Satuan', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('kegiatan/detail', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Kegiatan_model->tambahAnggaran();

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Anggaran berhasil ditambahkan!
              </div>');
            $id = $this->input->post('kegiatan_id');
            $data['kegiatan'] = $this->Kegiatan_model->getKegiatanById($id);
            redirect('user/detail/' . $this->input->post('kegiatan_id'));
        }
    }

    public function hapus_r($id, $id2)
    {
        $this->Kegiatan_model->hapusRincian($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Rincian berhasil dihapus!
          </div>');
        redirect('user/detail/' . $id2);
    }

    public function print($id_kegiatan)
    {
        $data['kegiatan'] = $this->Kegiatan_model->getKegiatanById($id_kegiatan);
        $data['anggaran'] = $this->Kegiatan_model->getAllAnggaran($id_kegiatan);
        $this->load->view('print_proposal', $data);
    }

    public function edit()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');

            // cek jika ada gambar
            $upload_img = $_FILES['image']['name'];

            if ($upload_img) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048';
                $config['upload_path'] = './assets/img/profile';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_img = $data['user']['image'];
                    if ($old_img != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_img);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                    redirect('user/edit');
                }
            }


            $this->db->set('name', $name);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            your profile has been updated!
          </div>');
            redirect('user/edit');
        }
    }
}
