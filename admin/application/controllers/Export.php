
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once 'Afficher.php';

class Export extends Afficher {
	public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('excel');
        $this->load->model('excels','_exc');
        $this->load->library('session');

    }    
	public function donne() {
        if (!isset($this->session->id_admin)) redirect('login.html');
        $Qst = $this->_exc->distQest();
        $lst = $this->_exc->distIdliste();
        $cln = isset($_GET['c']) ? $_GET['c'] : "";
        $data = array();
        
        $pSearch = $this->db->from('st_recherche')->limit('1')->get()->result();
        $clnAct = "";
        if (is_array($pSearch)) {
            foreach ($pSearch as $pSearchs => $p) {
                $clnAct = $p->colonne;
            }
        }
        $data['nChamp'] = $this->_exc->champDatas();
        if ($cln !== "") {
            $type = $this->_exc->getColDatas($cln);
            if ($type !== "int") {
                $data["donne"] = $this->_exc->queryExports($Qst,$cln,$lst,$clnAct);
            }else{
                $data["donne"] = $this->_exc->queryExport($Qst,$cln,$lst,$clnAct);
            }
            $data['type'] = $type;
            $data["quest"] = $Qst;
            $data['gClnne'] = $cln;
        }

		$this->affiche('export_donne',$data);
    }

    public function stat(){
        if (!isset($this->session->id_admin)) redirect('login.html');
        $Qst = $this->_exc->distQest();
        $cln = isset($_GET['{c}']) ? $_GET['{c}'] : null;
        $data = array();
        $data['nChamp'] = $this->_exc->champDatas();
        if (!is_null($cln)) {
            $data["clnn"] = $this->_exc->getColonneStat($cln);
            $data['qust'] = $Qst;
            $data["lign"] = $lst = $this->_exc->distIdliste();
            $data['clne'] = $cln;
        }

        $this->affiche('export_stat',$data);
    }

    public function stat_graph(){
        $data = array();
        $this->affiche('stat_graph',$data);
    }

    public function excelData(){
        $Qst = $this->_exc->distQest();
        $lst = $this->_exc->distIdliste();
        $cln = isset($_GET['cln']) ? $_GET['cln'] : "";
        $pSearch = $this->db->from('st_recherche')->limit('1')->get()->result();
        $clnAct = "";
        if (is_array($pSearch)) {
            foreach ($pSearch as $pSearchs => $p) {
                $clnAct = $p->colonne;
            }
        }
        $type = $this->_exc->getColDatas($cln);
        // load excel library
        $this->load->library('excel');
        // $empInfo = $this->export->employeeList();
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        if ($type !== "int") {
            $listInfo =  $this->_exc->queryExports($Qst,$cln,$lst,$clnAct);
        }else{
            $listInfo =  $this->_exc->queryExport($Qst,$cln,$lst,$clnAct);
        }

        $objPHPExcel->getActiveSheet()->setCellValue('A1', 'Nom et prénom');
        $Clhead = "A";
        foreach ($Qst as $Qsts => $q) {
            $Clhead++;
            $objPHPExcel->getActiveSheet()->setCellValue($Clhead.'1', str_replace("_"," ",explode("]", $q->lgne)[1]));
        }
        // set Header
        $rowCount = 2; 
        foreach ($listInfo as $list) {
            $clnData = "A";
            $objPHPExcel->getActiveSheet()->setCellValue($clnData.$rowCount, $list->nom);
            foreach ($Qst as $Qsts => $q) {
                $clnData++;
                if ($type !== "int") {
                    $objPHPExcel->getActiveSheet()->setCellValue($clnData.$rowCount, str_replace("0,","",str_replace(",0","",$list->{$q->lgne} )));
                }else{
                    $objPHPExcel->getActiveSheet()->setCellValue($clnData.$rowCount, $list->{$q->lgne} );
                }
            }
            $rowCount++;
        }     
        // create file name
        $fileName = 'EXPORT_DATA_STAT_AUTO.xlsx';  
        $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
        $objWriter->save("upload/".$fileName);
        // download file
        header("Content-Type: application/vnd.ms-excel");
        redirect(base_url()."/upload/".$fileName);        
    }

    public function excelStat(){
        $cln = isset($_GET['{c}']) ? $_GET['{c}'] : null;
        $Qst = $this->_exc->distQest();
        $lst = $this->_exc->distIdliste();
        $dgr = $this->_exc->getColonneStat($cln);
        
        // load excel library
        $this->load->library('excel');
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        // set Header
        $objPHPExcel->getActiveSheet()->setCellValue('A2', 'QEST/GEGRE');
        $Clhead = "A";
        foreach ($dgr as $dgrs => $d) {
            $Clhead++;
            $objPHPExcel->getActiveSheet()->setCellValue($Clhead.'2', $d->{$cln});
        }
        
        // set Row
        $rowCount = 3; 
        foreach ($Qst as $Qsts) {
            $clnData = "A";
            $objPHPExcel->getActiveSheet()->setCellValue($clnData.$rowCount, str_replace("_", " ", explode("]", $Qsts->lgne)[1]));
            foreach ($dgr as $dgrs => $d) {
                $clnData++;
                $cgbl = (int)$this->_exc->getCnQst($Qsts->lgne);
                $cont = (int)$this->_exc->getCountQst($cln,$d->{$cln},$Qsts->lgne);
                $prcn = ($cont*100)/$cgbl;
                $objPHPExcel->getActiveSheet()->setCellValue($clnData.$rowCount, $prcn."%");
            }
            $rowCount++;
        }

        $filename='EXPORT_STATISTIQUE_STAT_AUTO.xlsx';
        $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
        $objWriter->save("upload/".$filename);
        // download file
        header("Content-Type: application/vnd.ms-excel");
        redirect(base_url()."/upload/".$filename);     
    }
}
?>