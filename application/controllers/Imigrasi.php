<?php
	class Imigrasi extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->model('m_imigrasi');
		}
			
		public function index(){
				$tbl = $this->db->get('paspor');
		
				$config['base_url'] = base_url().'index.php/Imigrasi/index/';

				$config['total_rows'] = $tbl->num_rows();
				$config['per_page'] = 10; #jumlah data dipanggil perhalaman
				$config['uri_segment'] = 3; #data selanjutnya di parse di urisegmen 3
				$choice = $config["total_rows"] / $config["per_page"];
				$config["num_links"] = floor($choice);
				/* Atur class bootstrap yang digunakan */
				$config['full_tag_open'] 	= '<div class="pagging text-center"><nav><ul class="pagination">';
				$config['full_tag_close'] 	= '</ul></nav></div>';
				$config['num_tag_open'] 	= '<li class="page-item"><span class="page-link">';
				$config['num_tag_close'] 	= '</span></li>';
				$config['cur_tag_open'] 	= '<li class="page-item active"><span class="page-link">';
				$config['cur_tag_close'] 	= '<span class="sr-only">(current)</span></span></li>';
				$config['next_tag_open'] 	= '<li class="page-item"><span class="page-link">';
				$config['next_tagl_close'] 	= '<span aria-hidden="true">&raquo;</span></span></li>';
				$config['prev_tag_open'] 	= '<li class="page-item"><span class="page-link">';
				$config['prev_tagl_close'] 	= '</span></li>';
				$config['first_tag_open'] 	= '<li class="page-item"><span class="page-link">';
				$config['first_tagl_close'] = '</span></li>';
				$config['last_tag_open'] 	= '<li class="page-item"><span class="page-link">';
				$config['last_tagl_close'] 	= '</span></li>';

				$this->pagination->initialize($config);

				$data['halaman'] = $this->pagination->create_links();
				/* Membuat variable halaman untuk dipanggil di view */
				$page = $this->uri->segment(3,0);

				$data['paspor'] = $this->m_imigrasi->tampil_paspor($config['per_page'], $page);
				$this->load->view('home',$data);
		}
		
		public function tambah_paspor(){
			$this->load->view('tambah_paspor');
		}
		
		public function tambah_paspor_aksi(){
			
				$no_paspor = $this->input->post('no_paspor');
				$no_ktp = $this->input->post('no_ktp');
				$nama = $this->input->post('nama');
				$tempat_lahir = $this->input->post('tempat_lahir');
				$tgl_lahir = $this->input->post('tgl_lahir');
				$alamat = $this->input->post('alamat');
				$kebangsaan = $this->input->post('kebangsaan');
				$tgl_keluar = $this->input->post('tgl_keluar');
				$tgl_berlaku = $this->input->post('tgl_berlaku');
			
		 
				$data = array(
					'no_paspor' => $no_paspor,
					'no_ktp' => $no_ktp,
					'nama' => $nama,
					'tempat_lahir' => $tempat_lahir,
					'tgl_lahir' => $tgl_lahir,
					'alamat' => $alamat,
					'kebangsaan' => $kebangsaan,
					'tgl_keluar' => $tgl_keluar,
					'tgl_berlaku' => $tgl_berlaku
					);
				
				$where = $no_paspor;
				
				$this->m_imigrasi->input_paspor($data,'paspor');
				redirect('Imigrasi/index');
		
		}
		
		public function edit($no_paspor){
				$where = $no_paspor;
				$data['paspor'] = $this->m_imigrasi->edit_paspor($where,'paspor')->result();
				$this->load->view('edit_paspor',$data);
		}
		
		public function update($no_paspor){
			if($this->input->post('perbarui')){
				$no_ktp = $this->input->post('no_ktp');
				$nama = $this->input->post('nama');
				$tempat_lahir = $this->input->post('tempat_lahir');
				$tgl_lahir = $this->input->post('tgl_lahir');
				$alamat = $this->input->post('alamat');
				$kebangsaan = $this->input->post('kebangsaan');
				$tgl_keluar = $this->input->post('tgl_keluar');
				$tgl_berlaku = $this->input->post('tgl_berlaku');
			
		 
				$data = array(
					'no_ktp' => $no_ktp,
					'nama' => $nama,
					'tempat_lahir' => $tempat_lahir,
					'tgl_lahir' => $tgl_lahir,
					'alamat' => $alamat,
					'kebangsaan' => $kebangsaan,
					'tgl_keluar' => $tgl_keluar,
					'tgl_berlaku' => $tgl_berlaku
					);
				
				$where = $no_paspor;
				$this->m_imigrasi->update_paspor($where,$data,'paspor');
				redirect('Imigrasi/index');
			}
			else{
				redirect('Imigrasi/index');
				}
		
		}
		
		public function hapus($no_paspor){
				$where = array('no_paspor' => $no_paspor);
				$this->m_imigrasi->hapus_paspor($where,'paspor');
				redirect('Imigrasi/index');
		}
		
		private function _gen_pdf($html,$paper='A4')
		{
		 ob_end_clean();
		 $CI =& get_instance();
		 $CI->load->library('MPDF56/mpdfi');
		 $mpdfi=new mPDF('utf-8', $paper );
		 $mpdfi->debug = true;
		 $mpdfi->WriteHTML($html);
		 $mpdfi->Output();
		 }
		 
		public function doprint($pdf=false)
		{
		 $data['paspor'] = 'ini print dari HTML ke PDF'
		 $output = $this->load->view('page_prints',$data, true);
		 return $this->_gen_pdf($output);
		}
		
		
	}
?>