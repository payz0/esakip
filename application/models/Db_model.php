<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Db_model extends CI_Model {

    public function __construct()
    {
		date_default_timezone_set('Asia/Jakarta');
		$db = "esakipDB";
        // buat database
		$this->load->dbforge();
		$this->load->dbutil();

		// cek exist database
		if (!$this->dbutil->database_exists($db))
            {
				$this->dbforge->create_database($db);
			}
		
		$this->db->query('use '.$db);
		// buat field dan table
		$pegawai = array(
			'id_peg' => array(
			  'type' => 'INT',
			  'constraint' => 9,
			  'unsigned' => TRUE,
			  'auto_increment' => TRUE
			),
			'nama' => array(
			  'type' => 'VARCHAR',
			  'constraint' => 100
			),
			'nip' => array(
			  'type' => 'VARCHAR',
			  'constraint' => 30,
			  'unique' => TRUE,
			),
			'email' => array(
			  'type' => 'VARCHAR',
			  'constraint' => 60,
			  'unique' => TRUE,
			  'null' => TRUE
			),
			'foto' => array(
			  'type' => 'VARCHAR',
			  'constraint' => 140,
			//   'unique' => TRUE,
			  'null' => TRUE
			),
			'pangkat' => array(
				'type' => 'VARCHAR',
				'constraint' => 40
			),
			'jabatan' => array(
			  'type' => 'VARCHAR',
			  'constraint' => 40
			),
			'password' => array(
				'type' => 'VARCHAR',
				'constraint' => 140
			),
			'id_skpd' => array(
			  'type' => 'VARCHAR',
			  'constraint' => 9
			),
			'id_kabag' => array(
			  'type' => 'VARCHAR',
			  'constraint' => 9,
			  'null' => TRUE,
			),
			'id_kasi' => array(
				'type' => 'VARCHAR',
				'constraint' => 9,
				'null' => TRUE
			),
			'esselon' => array(
				'type' => 'VARCHAR',
				'constraint' => 20,
				'null' => TRUE
			)
		);
		

		$skpd = array(
			'id_skpd' => array(
				'type' => 'INT',
				'constraint' => 9,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			  ),
			  'username' => array(
				'type' => 'VARCHAR',
				'constraint' => 30
			  ),
			  'password' => array(
				'type' => 'VARCHAR',
				'constraint' => 30
			  ),
			  'skpd' => array(
				'type' => 'VARCHAR',
				'constraint' => 100
			  ),
			  'level' => array( //level posisi sebagai admin esakip atau staf skpd, ada 3 skpd
				'type' => 'VARCHAR',
				'constraint' => 40
			  ),
			  'level_lap' => array( //level pemegang laporan esakip kabupaten
				'type' => 'VARCHAR',
				'constraint' => 40
			  ),

			);

		$laporan = array(
			'id_lap' => array(
				'type'=>'INT',
				'constraint' => 9,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'id_skpd' => array(
				'type' => 'VARCHAR',
				'constraint' => 9
			),
			'id_peg' => array(
				'type' => 'VARCHAR',
				'constraint' => 9
			),
			'tahun' => array(
				'type' => 'VARCHAR',
				'constraint' => 14
			),
			'triwulan' => array(
				'type' => 'VARCHAR',
				'constraint' => 2
			),
			// 'level_lap' => array(
			// 	'type' => 'VARCHAR',
			// 	'constraint' => 10
			// ),
			'status' => array( //ajuan, acc, revisi
				'type' => 'VARCHAR',
				'constraint' => 9
			),
			'laporan' => array(
				'type' => 'VARCHAR',
				'constraint' => 150
			),
			'berkas' => array(
				'type' => 'VARCHAR',
				'constraint' => 150,
				'null' => TRUE
			),
			'tgl' => array(
				'type' => 'TIMESTAMP'
				// 'constraint' => 40
			),
			'aksi' => array(
				'type' => 'VARCHAR',
				'constraint' => 200,
				'null' => TRUE
			),
			'capaian' => array(
				'type' => 'VARCHAR',
				'constraint' => 200,
				'null' => TRUE
			),
			'evaluasi' => array(
				'type' => 'VARCHAR',
				'constraint' => 200,
				'null' => TRUE
			),
			'hambatan' => array(
				'type' => 'VARCHAR',
				'constraint' => 200,
				'null' => TRUE
			),
			'strategi' => array(
				'type' => 'VARCHAR',
				'constraint' => 200,
				'null' => TRUE
			)
		);

		$tanggapan = array(
			'id_tanggapan' => array(
				'type' => 'INT',
				'constraint' => 9,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			  ),
			  'tanggapan' => array(
				'type' => 'VARCHAR',
				'constraint' => 150
			  ),
			  'oleh' => array(
				'type' => 'VARCHAR',
				'constraint' => 150
			  ),
			  'jabatan' => array(
				'type' => 'VARCHAR',
				'constraint' => 150
			  ),
			  'tgl' => array(
				'type' => 'TIMESTAMP'
				// 'constraint' => 40
			  ),
			  'id_lap' => array(
				'type' => 'VARCHAR',
				'constraint' => 100
			  ),
			  'id_peg' => array(
				'type' => 'VARCHAR',
				'constraint' => 100
			  )
			);

		
		$laporanSKPD = array(
			'id_lap_skpd' => array(
				'type'=>'INT',
				'constraint' => 9,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'id_skpd' => array(
				'type' => 'VARCHAR',
				'constraint' => 9
			),
			'tahun' => array(
				'type' => 'VARCHAR',
				'constraint' => 14
			),
			// 'triwulan' => array(
			// 	'type' => 'VARCHAR',
			// 	'constraint' => 2
			// ),
			'ringkasan_renstra' => array( // sekaligus untuk rpjmd kabupaten
				'type' => 'VARCHAR',
				'constraint' => 150,
				'null' => TRUE
			),
			'doc_renstra' => array(
				'type' => 'VARCHAR',
				'constraint' => 150,
				'null' => TRUE
			),
			'ringkasan_rkp' => array( //rkpd untuk kab
				'type' => 'VARCHAR',
				'constraint' => 150,
				'null' => TRUE
			),
			'doc_rkp' => array(
				'type' => 'VARCHAR',
				'constraint' => 150,
				'null' => TRUE
			),
			'ringkasan_pk' => array( //pk 
				'type' => 'VARCHAR',
				'constraint' => 150,
				'null' => TRUE
			),
			'doc_pk' => array(
				'type' => 'VARCHAR',
				'constraint' => 150,
				'null' => TRUE
			),
			'ringkasan_lkjip' => array(
				'type' => 'VARCHAR',
				'constraint' => 150,
				'null' => TRUE
			),
			'doc_lkjip' => array(
				'type' => 'VARCHAR',
				'constraint' => 150,
				'null' => TRUE
			),
			'ringkasan_ra' => array(
				'type' => 'VARCHAR',
				'constraint' => 150,
				'null' => TRUE
			),
			'doc_ra' => array(
				'type' => 'VARCHAR',
				'constraint' => 150,
				'null' => TRUE
			),
			'ringkasan_iku' => array(
				'type' => 'VARCHAR',
				'constraint' => 150,
				'null' => TRUE
			),
			'doc_iku' => array(
				'type' => 'VARCHAR',
				'constraint' => 150,
				'null' => TRUE
			),
			'ringkasan_capaian' => array(
				'type' => 'VARCHAR',
				'constraint' => 150,
				'null' => TRUE
			),
			'doc_capaian' => array(
				'type' => 'VARCHAR',
				'constraint' => 150,
				'null' => TRUE
			),
			'jenis_lap' => array( //lap untuk skpd atau kabupaten atau level lap
				'type' => 'VARCHAR',
				'constraint' => 40
			),
			'kirim' => array(
				'type' => 'VARCHAR',
				'constraint' => 20,
				'null' => TRUE
			)

		);

		$history = array(
			'id_history' => array(
				'type' => 'INT',
				'constraint' => 9,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			  ),
			  'history' => array(
				'type' => 'VARCHAR',
				'constraint' => 150
			  ),
			  'tgl' => array(
				'type' => 'TIMESTAMP'
				// 'constraint' => 40
			  ),
			  'id_peg' => array(
				'type' => 'VARCHAR',
				'constraint' => 10
			  ),
			  'id_skpd' => array(
				'type' => 'VARCHAR',
				'constraint' => 10
			  ),
			  'id_pengirim' => array(
				'type' => 'VARCHAR',
				'constraint' => 100
			  ),
			  'oleh' => array(
				'type' => 'VARCHAR',
				'constraint' => 30
			  ),

			);

		$kasi = array(
			'id_kasi' => array(
				'type' => 'INT',
				'constraint' => 9,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			  ),
			  'kasi' => array(
				'type' => 'VARCHAR',
				'constraint' => 150
			  ),
			  'id_skpd' => array(
				'type' => 'VARCHAR',
				'constraint' => 9
			  ),
			  'id_kabag' => array(
				'type' => 'VARCHAR',
				'constraint' => 9
				)

			  );
		$kabag = array(
			'id_kabag' => array(
				'type' => 'INT',
				'constraint' => 9,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			  ),
			  'kabag' => array(
				'type' => 'VARCHAR',
				'constraint' => 150
			  ),
			  'id_skpd' => array(
				'type' => 'VARCHAR',
				'constraint' => 9
				)

			  );
		
		$baca = array(
			'id_peg' => array(
				'type' => 'VARCHAR',
				'constraint' => 100
			),
			'jumlah' => array(
				'type' => 'INT',
				'constraint' => 10
			  )
			);

		$tabel_PK = array(
				'id_pk' => array(
					'type'=>'INT',
					'constraint' => 9,
					'unsigned' => TRUE,
					'auto_increment' => TRUE
				),
				'id_skpd' => array(
					'type' => 'VARCHAR',
					'constraint' => 9
				),
				'id_peg' => array(
					'type' => 'VARCHAR',
					'constraint' => 9
				),
				'sasaran' => array(
					'type' => 'VARCHAR',
					'constraint' => 200
				),
				'indikator' => array(
					'type' => 'VARCHAR',
					'constraint' => 200
				),
				'target1' => array(
					'type' => 'VARCHAR',
					'constraint' => 100
				),
				'target2' => array(
					'type' => 'VARCHAR',
					'constraint' => 100
				),
				'target3' => array(
					'type' => 'VARCHAR',
					'constraint' => 100
				),
				'target4' => array(
					'type' => 'VARCHAR',
					'constraint' => 100
				),
				'berkas' => array(
					'type' => 'VARCHAR',
					'constraint' => 100
				),
				'tahun' => array(
					'type' => 'VARCHAR',
					'constraint' => 14
				)
			);

		$tabel_IKI = array(
				'id_iki' => array(
					'type'=>'INT',
					'constraint' => 9,
					'unsigned' => TRUE,
					'auto_increment' => TRUE
				),
				'id_skpd' => array(
					'type' => 'VARCHAR',
					'constraint' => 9
				),
				'id_peg' => array(
					'type' => 'VARCHAR',
					'constraint' => 9
				),
				'kinerja' => array(
					'type' => 'VARCHAR',
					'constraint' => 200
				),
				'indikator' => array(
					'type' => 'VARCHAR',
					'constraint' => 200
				),
				'formula' => array(
					'type' => 'VARCHAR',
					'constraint' => 200
				),
				'sumber' => array(
					'type' => 'VARCHAR',
					'constraint' => 200
				),
				'berkas' => array(
					'type' => 'VARCHAR',
					'constraint' => 100
				),
				'tahun' => array(
					'type' => 'VARCHAR',
					'constraint' => 14
				)
			);
		$this->dbforge->add_field($pegawai);
		$this->dbforge->add_key('id_peg', TRUE);
		$this->dbforge->create_table('tabel_pegawai',TRUE);

		$this->dbforge->add_field($skpd);
		$this->dbforge->add_key('id_skpd', TRUE);
		$this->dbforge->create_table('tabel_skpd',TRUE);

		$this->dbforge->add_field($laporan);
		$this->dbforge->add_key('id_lap', TRUE);
		$this->dbforge->create_table('tabel_laporan',TRUE);

		$this->dbforge->add_field($tanggapan);
		$this->dbforge->add_key('id_tanggapan', TRUE);
		$this->dbforge->create_table('tabel_tanggapan',TRUE);

		$this->dbforge->add_field($laporanSKPD );
		$this->dbforge->add_key('id_lap_skpd', TRUE);
		$this->dbforge->create_table('tabel_laporan_skpd',TRUE);

		$this->dbforge->add_field($history );
		$this->dbforge->add_key('id_history', TRUE);
		$this->dbforge->create_table('tabel_history',TRUE);

		$this->dbforge->add_field($kasi);
		$this->dbforge->add_key('id_kasi', TRUE);
		$this->dbforge->create_table('tabel_kasi',TRUE);

		$this->dbforge->add_field($kabag);
		$this->dbforge->add_key('id_kabag', TRUE);
		$this->dbforge->create_table('tabel_kabag',TRUE);

		$this->dbforge->add_field($baca);
		// $this->dbforge->add_key('id_kabag', TRUE);
		$this->dbforge->create_table('tabel_baca',TRUE);

		$this->dbforge->add_field($tabel_PK);
		$this->dbforge->add_key('id_pk', TRUE);
		$this->dbforge->create_table('tabel_laporan_pk',TRUE);

		$this->dbforge->add_field($tabel_IKI);
		$this->dbforge->add_key('id_iki', TRUE);
		$this->dbforge->create_table('tabel_laporan_iki',TRUE);
    }
    

}

/* End of file Db_model.php */

?>