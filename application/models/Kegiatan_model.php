<?php

date_default_timezone_set('Asia/Jakarta');
class Kegiatan_model extends CI_model
{
    public function getAllKegiatan()
    {
        $query = $this->db->get('kegiatan');

        return $query->result_array();
    }

    public function getKegiatan($limit, $start, $keyword = null)
    {
        if ($keyword) {
            $this->db->like('nama_keg', $keyword);
            $this->db->or_like('pengusul', $keyword);
            $this->db->or_like('deskripsi_keg', $keyword);
            $this->db->or_like('kategori_keg', $keyword);
            $this->db->or_like('pic_keg', $keyword);
        }
        $this->db->order_by('date_created', 'DESC');
        return $this->db->get('kegiatan', $limit, $start)->result_array();
    }

    public function getKegiatanUser($limit, $start, $keyword = null)
    {
        if ($keyword) {
            $this->db->like('nama_keg', $keyword);
            $this->db->or_like('pengusul', $keyword);
            $this->db->or_like('deskripsi_keg', $keyword);
            $this->db->or_like('kategori_keg', $keyword);
            $this->db->or_like('pic_keg', $keyword);
        }
        $id = $this->session->userdata('id');
        return $this->db->get_where('kegiatan', ['user_id' => $id], $limit, $start)->result_array();
    }
    public function countKegiatan()
    {
        return $this->db->get('kegiatan')->num_rows();
    }

    public function countKegiatanUser()
    {
        $id = $this->session->userdata('id');
        return $this->db->get_where('kegiatan', ['user_id' => $id])->num_rows();
    }


    public function getAllAnggaran($id)
    {

        return $this->db->get_where('anggaran', ['kegiatan_id' => $id])->result_array();
    }

    public function tambahAnggaran()
    {
        // print_r($anggaran);
        // die;


        $data = [
            'kegiatan_id' => $this->input->post('kegiatan_id', true),
            'kebutuhan' => $this->input->post('kebutuhan', true),
            'harga' => $this->input->post('harga', true),
            'jumlah' => $this->input->post('jumlah', true),
            'satuan' => $this->input->post('satuan', true)
        ];

        // print_r($data);
        // die;

        $this->db->insert('anggaran', $data);
    }

    public function tambahKegiatan()
    {
        $upload_file = $_FILES['doc_admin']['name'];

        if ($upload_file != null) {
            $config['allowed_types'] = 'doc|docx|pdf';
            $config['max_size']     = '2048';
            $config['upload_path'] = './assets/uploads';
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('doc_admin')) {
                $post['doc_admin'] = $this->upload->data('file_name');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
            }
        } else {
            $post['doc_admin'] = null;
        }

        $data = [
            'user_id' => $this->session->userdata('id'),
            'nama_keg' => $this->input->post('nama_keg', true),
            'kategori_keg' => $this->input->post('kategori_keg', true),
            'pic_keg' => $this->input->post('pic_keg', true),
            'deskripsi_keg' => $this->input->post('deskripsi_keg', true),
            'pengusul' => $this->input->post('pengusul', true),
            'mengetahui' => $this->input->post('mengetahui', true),
            'output_keg' => $this->input->post('output_keg', true),
            'keterangan' => $this->input->post('keterangan', true),
            'target_waktu_rencana' => $this->input->post('target_waktu_rencana', true),
            'target_waktu_realisasi' => $this->input->post('target_waktu_realisasi', true),
            'catatan_pic' => $this->input->post('catatan_pic', true),
            'doc_admin' => $post['doc_admin'],
            'date_created' => time()



        ];

        $this->db->insert('kegiatan', $data);
    }
    public function updateKegiatan()
    {

        $upload_file = $_FILES['doc_admin']['name'];

        if ($upload_file != null) {
            $config['allowed_types'] = 'doc|docx|pdf';
            $config['max_size']     = '2048';
            $config['upload_path'] = './assets/uploads';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('doc_admin')) {

                $id = $this->input->post('id');
                $data['kegiatan'] = $this->Kegiatan_model->getKegiatanById($id);

                $old_doc = $data['kegiatan']['doc_admin'];
                unlink(FCPATH . 'assets/uploads/' . $old_doc);


                $data['doc_admin'] = $this->upload->data('file_name');
                $this->db->set('doc_admin', $data['doc_admin']);
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                redirect('user');
            }
        } else {
            $post['doc_admin'] = null;

            $data['doc_admin'] = $post['doc_admin'];
        }




        $data = [

            'user_id' => $this->session->userdata('id', true),
            'nama_keg' => $this->input->post('nama_keg', true),
            'kategori_keg' => $this->input->post('kategori_keg', true),
            'pic_keg' => $this->input->post('pic_keg', true),
            'deskripsi_keg' => $this->input->post('deskripsi_keg', true),
            'pengusul' => $this->input->post('pengusul', true),
            'mengetahui' => $this->input->post('mengetahui', true),
            'output_keg' => $this->input->post('output_keg', true),
            'keterangan' => $this->input->post('keterangan', true),
            'target_waktu_rencana' => $this->input->post('target_waktu_rencana', true),
            'target_waktu_realisasi' => $this->input->post('target_waktu_realisasi', true),
            'catatan_pic' => $this->input->post('catatan_pic', true),

        ];


        $id = $this->input->post('id');

        $this->db->where('id', $id);
        $this->db->update('kegiatan', $data);
    }

    public function hapusKegiatan($id)
    {
        $data['nama_file'] = $this->db->get_where('kegiatan', ['id' => $id])->row_array();
        unlink(FCPATH . 'assets/uploads/' . $data['nama_file']['doc_admin']);
        $this->db->where('id', $id);
        $this->db->delete('kegiatan');
    }

    public function hapusRincian($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('anggaran');
    }

    public function getKegiatanById($id)
    {
        return $this->db->get_where('kegiatan', ['id' => $id])->row_array();
    }
}
