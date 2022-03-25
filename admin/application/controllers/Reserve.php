<?php 
 /*controller*/
defined('BASEPATH') OR exit('No direct script access allowed');  
  
class Import extends CI_Controller {  
 
 function __construct() {
 parent::__construct();
 $this->load->database();
 $this->load->model('import_model');


     public function excelData(){
        // create file name
        $fileName = 'data-'.time().'.xlsx';  
        // load excel library
        $this->load->library('Excel');
        // $this->load->library('PHPExcel');
        // $listInfo = $this->export->exportList();
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        // set Header
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'meeting_id');
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'title');
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'place');
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'datebegin');
        $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'timebegin');
        $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'dateend');
        $objPHPExcel->getActiveSheet()->SetCellValue('G1', 'timeend');  
        
        // set Row
        // $rowCount = 2;
        // foreach ($listInfo as $meeting) {
        //     $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $meeting->meeting_id);
        //     $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $meeting->title);
        //     $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $meeting->place);
        //     $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $meeting->datebegin);
        //     $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $meeting->timebegin);
        //     $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $meeting->dateend);
        //     $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $meeting->timeend);
        //     $rowCount++;
        // }
        $filename = "Liste_des_sessions_LocalForm-". date("d-m-Y-H-i-s").".csv";
        header('Content-Type: application/vnd.ms-excel'); 
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0'); 
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');  
        $objWriter->save('php://output'); 
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

                // create file name
        $fileName = 'data-'.time().'.xlsx';  
        // load excel library
        $this->load->library('Excel');
        // $this->load->library('PHPExcel');
        // $listInfo = $this->export->exportList();
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        
        $type = $this->_exc->getColDatas($cln);
        // create file name
        $fileName = 'data-'.time().'.xlsx';  
        // load excel library
        $this->load->library('excel');
        if ($type !== "int") {
            $listInfo =  $this->_exc->queryExports($Qst,$cln,$lst,$clnAct);
        }else{
            $listInfo =  $this->_exc->queryExport($Qst,$cln,$lst,$clnAct);
        }

        // $this->excel->setActiveSheetIndex(0);
        // set Header
        $this->excel->getActiveSheet()->setCellValue('A2', 'Nom et prénom');
        $Clhead = "A";
        foreach ($Qst as $Qsts => $q) {
            $Clhead++;
            $this->excel->getActiveSheet()->setCellValue($Clhead.'2', str_replace("_"," ",explode("]", $q->lgne)[1]));
        }
        
        // set Row
        $rowCount = 3; 
        foreach ($listInfo as $list) {
            $clnData = "A";
            $this->excel->getActiveSheet()->setCellValue($clnData.$rowCount, $list->nom);
            foreach ($Qst as $Qsts => $q) {
                $clnData++;
                if ($type !== "int") {
                    $this->excel->getActiveSheet()->setCellValue($clnData.$rowCount, str_replace(",","",str_replace("0","",$list->{$q->lgne} )));
                }else{
                    $this->excel->getActiveSheet()->setCellValue($clnData.$rowCount, str_replace(",","",str_replace("0","",$list->{$q->lgne} )));
                }
            }
            $rowCount++;
        }
        $filename='ST_EXPORT_DATA.csv'; //save our workbook as this file name
        header('Content-Type: application/vnd.ms-excel'); 
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0'); 
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');  
        $objWriter->save('php://output'); 
                    
        //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
        // //if you want to save   it as .XLSX Excel 2007 format
        // $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');  
        // //force user to download the Excel file without writing it to server's HD
        // $objWriter->save('php://output');
    }

    }
 public function index(){
	 $query =  $this->db->query('SELECT * from register ORDER BY id desc'); 
	 $records = $query->result_array();
	 $data['user_data'] = $records;
	 $this->load->view('excel_file_upload',$data);
	 }
 public function uploadData()
 	{
 				if ($this->input->post('submit'))  {            
			$path = 'uploads/';
			require_once APPPATH . "/third_party/PHPExcel.php";
			$config['upload_path'] = $path;
			$config['allowed_types'] = 'xlsx|xls';
			$config['remove_spaces'] = TRUE;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);            
			if (!$this->upload->do_upload('uploadFile')) {
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
					$i=0;
					foreach ($allDataInSheet as $value) {
					   	if($flag){
					 		$flag =false;
				 			continue;
				   		}

					    $inserdata[$i]['first_name'] = $value['A'];
					    $inserdata[$i]['last_name'] = $value['B'];
					    $inserdata[$i]['address'] = $value['C'];
					    $inserdata[$i]['email'] = $value['D'];
					    $inserdata[$i]['mobile'] = $value['E'];
					    $i++;
					}    

					$result = $this->import_model->importdata($inserdata);   
					if($result){
					   echo "Imported successfully";
					}else{
					   echo "ERROR !";
					}             
			 
				}catch(Exception $e) {
				    die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME)
				 . '": ' .$e->getMessage());
				}
			}else{
			   	echo $error['error'];
			}         
			 	
			$this->load->view('excel_file_upload');
		}
	}

/*fin controller*/

/*model*/
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
 
class Import_model extends CI_Model {
 
    public function importData($data) {
 
        $res = $this->db->insert_batch('register',$data);
        if($res){
            return TRUE;
        }else{
            return FALSE;
        }
 
    }
 
}
?>
/*Fin model*/

/*views*/
<!DOCTYPE html>
<html lang="en">
<head>
  <title>How To Import Excel and CSV File Using CodeIgniter - XpertPhp</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
 
<div class="container" style="margin-top:50px;">
  <div class="row">
 <div class="col-lg-10"><h2>codeigniter excel Import</h2></div>
 <div class="col-lg-1">&nbsp;</div>
 <div class="col-lg-1"><button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#importModal">Import</button></div>
  </div>  
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Id</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Address</th>
        <th>Email</th>
        <th>Mobile</th>
      </tr>
    </thead>
    <tbody>
 <?php
 foreach($user_data as $row) {
 ?>
      <tr>
        <td><?php echo $row['id'];?></td>
        <td><?php echo $row['first_name'];?></td>
        <td><?php echo $row['last_name'];?></td>
        <td><?php echo $row['email'];?></td>
        <td><?php echo $row['phone'];?></td>
        <td><?php echo $row['created'];?></td>
      </tr>
 <?php 
 } ?> 
    </tbody>
  </table>
</div>
 
<!-- Modal -->
  <div class="modal fade" id="importModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Upload Csv file</h4>
        </div>
        <div class="modal-body">
          <form action="<?php echo base_url();?>import/uploadData" method="post" enctype="multipart/form-data">
 <div class="col-lg-12">
 <div class="form-group">
 <input type="file" name="uploadFile" id="uploadFile" class="filestyle" data-icon="false">
 </div>
 </div> 
 <div class="col-lg-12">
 <input type="submit" value="Upload file" id="upload_btn">
 </div> 
   </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
</body>
</html>
/*Fin views*/