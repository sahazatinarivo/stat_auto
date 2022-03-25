<?php 
defined('BASEPATH') OR exit('No direct script access allowed');  
include_once 'Afficher.php';
class Import extends Afficher {  
 
	function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->database();
		$this->load->model('excels','_excel');
		$this->load->library('session');
	}
	
	public function index(){
		if (!isset($this->session->id_admin)) redirect('login.html');
		$cLnne =  $this->_excel->findAll('champs_block'); 
		if (is_array($cLnne)) { $data['colonne'] = $cLnne; }
		$data['clnTbl'] = $this->_excel->champStock("st_liste_evalue");
		$this->affiche('creation_table',$data);
	}

	public function database($table){
		if (!isset($this->session->id_admin)) redirect('login.html');
		$cLnne =  $this->_excel->findAll('champs_block'); 
		if (is_array($cLnne)) { $data['colonne'] = $cLnne; }
		$tables = "st_".$table;
		$data['clnTbl'] = $this->_excel->champStock($tables);
		$data['table'] = $table;
		$this->affiche('database',$data);
	}

	public function import(){
		if (!isset($this->session->id_admin)) redirect('login.html');
		$dPrg = isset($_GET['dePg']) ? $_GET['dePg'] : 0;
		$cLnne =  $this->_excel->findAll('champs_block'); 
		if (is_array($cLnne)) { $data['colonne'] = $cLnne; }
		$data['clnTbl'] = $this->_excel->champStock("st_liste_evalue");
		$data['lsteAl'] = $this->_excel->findAll("liste_evalue");
		$data['lsteIp'] = $this->_excel->findLimite("liste_evalue",$dPrg);
		$this->affiche('import_donne',$data);
	}

	public function create_table(){
		$data['nbrChmp'] = isset($_POST['idChm']) ? $_POST['idChm']: 0;
		$data['table'] = isset($_POST['table']) ? $_POST['table']: "";

		$this->load->view('block_modal/creation_table',$data);
	}

	public function drop_column_table(){
		$nomCln = isset($_GET['{n}']) ? $_GET['{n}']: "";
		$tables = isset($_GET['{t}']) ? $_GET['{t}']: "";
		if ($nomCln !=="") {
			$this->dbforge->drop_column("st_".$tables, $nomCln);
			if ($table == "datas_uns") {
				$this->dbforge->drop_column("st_datas_deuxs",$nomCln);
			}
			redirect('database.html/'.$tables);
		}
	}

	public function edite_table(){
		$nomCln = isset($_POST['nChmp']) ? $_POST['nChmp'] : null;
		$data = array();
		if ($nomCln !== null) {
			$sChmp = $this->_excel->selectColonne($nomCln,"st_liste_evalue");
			foreach ($sChmp as $sChmps => $s) {
				$data['nom'] = $s->nom;
				$data['nul'] = $s->nulls;
				$data['typ'] = $s->type;
				$types = $s->type;
				$limit = $s->limits;
				$sType = str_replace($types,"", $limit);
  				$data['lmts'] = (int)str_replace("(","", $sType);
			}
 		}
 		$this->load->view('block_modal/edite_table',$data);
	}

	public function edite_table_datas(){
		$nomCln = isset($_POST['nChmp']) ? $_POST['nChmp'] : null;
		$data = array();
		if ($nomCln !== null) {
			$sChmp = $this->_excel->selectColonne($nomCln,"st_datas_uns");
			foreach ($sChmp as $sChmps => $s) {
				$data['nom'] = $s->nom;
				$data['nul'] = $s->nulls;
				$data['typ'] = $s->type;
				$types = $s->type;
				$limit = $s->limits;
				$sType = str_replace($types,"", $limit);
  				$data['lmts'] = (int)str_replace("(","", $sType);
			}
 		}
 		$this->load->view('block_modal/edite_table_datas',$data);
	}


	public function save_table(){
		$nbrChmp = isset($_POST['nbrChmp']) ? $_POST['nbrChmp'] : null;
		$nChmp = isset($_POST['nChmp']) ? $_POST['nChmp'] : null;
		$tChmp = isset($_POST['tChmp']) ? $_POST['tChmp'] : null;
		$lChmp = isset($_POST['lChmp']) ? $_POST['lChmp'] : null;
		$oChmp = isset($_POST['oChmp']) ? $_POST['oChmp'] : null;		
		$table = isset($_POST['table']) ? $_POST['table'] : null;
		$fields = [];
        for ($i=1; $i <= $nbrChmp ; $i++) { 
        	if ((int)$oChmp[$i] == 0) { $trFls = FALSE; }else{ $trFls = TRUE;}
	        $fields[''.$nChmp[$i].''] = array(
	                'type' => $tChmp[$i],
	                'constraint' => $lChmp[$i],
	                'unique' => false,
	                'null' => $trFls,
	        );
        }

		$this->dbforge->add_column("st_".$table,$fields);
		if ($table == "datas_uns") {
			$this->dbforge->add_column("st_datas_deuxs",$fields);
		}
	}

	public function save_modif_table(){
		$onChp = isset($_POST['onChp']) ? $_POST['onChp'] : null;
		$nChmp = isset($_POST['nChmp']) ? $_POST['nChmp'] : null;
		$tChmp = isset($_POST['tChmp']) ? $_POST['tChmp'] : null;
		$lChmp = isset($_POST['lChmp']) ? $_POST['lChmp'] : null;
		$oChmp = isset($_POST['oChmp']) ? $_POST['oChmp'] : null;
		$table = isset($_POST['table']) ? $_POST['table'] : null;

    	if ((int)$oChmp == 0) { $trFls = FALSE; }else{ $trFls = TRUE;}
        $fields[''.$onChp.''] = array(
        		'name' => $nChmp,
                'type' => $tChmp,
                'constraint' => $lChmp,
                'unique' => false,
                'null' => $trFls,
        );

		$this->dbforge->modify_column("st_".$table,$fields);
		if ($table == "datas_uns") {
			$this->dbforge->modify_column("st_datas_deuxs",$fields);
		}
	}

	public function modal_import(){
		$data['clnTbl'] = $this->_excel->champStock("st_liste_evalue");
		$this->load->view('block_modal/import_donne',$data);
	}

	public function init_table(){
		$init = $this->db->truncate('st_liste_evalue');
		if ($init) {
			redirect("import-donne.html");
		}else{
			echo "Error! Veillez ressayer plus tard";
		}
	}

	public function run_import_donne(){         
		$path = 'upload/';
		$this->load->library('excel');
		$config['upload_path'] = $path;
		$config['allowed_types'] = 'xlsx|xls|csv';
		$config['remove_spaces'] = TRUE;
		$this->load->library('upload', $config);
		$this->upload->initialize($config);            
		if (!$this->upload->do_upload('file_Excel_importer')) {
			$error = array('error' => $this->upload->display_errors());
		} else {
			$data = array('upload_data' => $this->upload->data());
		}
		if(empty($error)){
		   	if (!empty($data['upload_data']['file_name'])) {
		 		$import_xls_file = $data['upload_data']['file_name'];
			} else {
				$import_xls_file = 0;
			}
		 	$inputFileName = $path . $import_xls_file;
		 
			try {
				$inputFileType = PHPExcel_IOFactory::identify($inputFileName);
				$objReader = PHPExcel_IOFactory::createReader($inputFileType);
				$objPHPExcel = $objReader->load($inputFileName);
				$allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
				$flag = true;
				$ii=0;
				$inserdata = [];
				$count = (int)$this->input->post('nombre_table');
				$date = date('Ymdhi');
				$uniques = mt_rand(0,mt_getrandmax());
				foreach ($allDataInSheet as $value) {
					$uniques++; $date++;
					$slug = $uniques.$date;
				   	if($flag){
				 		$flag = false;
			 			continue;
			   		}
			   		$inserdata[$ii]['slug'] =$slug;
			   		for ($i = 3; $i <= $count ; $i++) { 
			   			$cellul = $this->input->post("cellule_".$i."");
			   			$champs = $this->input->post("champ_".$i."");

			   			$inserdata[$ii][$champs] = $value[$cellul];
			   		}
				    $ii++;
				}    

				$result = $this->_excel->import_data($inserdata);   
				if(!$result){
				   echo "IMPORTATION ERROR! VEILLEZ RESSAYER PLUS TARD";
				}             
			}catch(Exception $e) {
			    die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME)
			 . '": ' .$e->getMessage());
			}
		}else{
		   	echo "Fichier introuvable";
		}         
	}
}