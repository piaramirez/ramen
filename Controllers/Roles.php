<?php
class Roles extends Controllers {
    public function __construct() {
        parent::__construct();
    }   

    public function Roles() {
        $data['page_id'] = 3;
        $data['tag_page'] = "Roles de usuarios | Sora Ramen";
        $data['page_title'] = "Akatsuki te está buscando";
        $data['page_name'] = "Roles";
        $this->view->getView($this, "Roles/Roles", $data);
    }

    public function getRoles() {
        $draw = isset($_GET['draw']) ? intval($_GET['draw']) : 0;
        $start = isset($_GET['start']) ? intval($_GET['start']) : 0;
        $length = isset($_GET['length']) ? intval($_GET['length']) : 10;
        $roles = $this->model->selectRoles();
        
        $data = array_slice($roles, $start, $length);
        $response = array(
            "draw" => $draw,
            "recordsTotal" => count($roles),
            "recordsFiltered" => count($roles),
            "data" => $data
        );
        foreach ($response['data'] as $key => $value) {
            
            $response['data'][$key]['Opciones'] = '
            <button class="btnEditarRol" idEditarE="'.$response['data'][$key]['idaTrabajo'].'" title="Editar">Edit </button>';
        }
        //echo format($data);
        header('Content-Type: application/json');
        echo json_encode($response, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function getRole(int $idrol){
        $intIdRol= intval(strClean($idrol));
        if($intIdRol > 0){
            $arradata = $this->model->selectRol($intIdRol);
            if(empty($arradata)){
                $arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
        }else{
            $arrResponse = array('status' => true, 'data' => $arradata);
        
        }
        header('Content-Type: application/json');
        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    }
    die();
    }
    public function setRol(){
        try {
            
            if(!isset($_POST['textNrol'], $_POST['descripcionRol'], $_POST['idEstatus'], $_POST['mentores'])){
                throw new Exception("Datos incompletos");
            }
            
            $strRol = strClean($_POST['textNrol']);
            $strDescripcion = strClean($_POST['descripcionRol']);
            $strAldea = strClean($_POST['idEstatus']);
            $strMentor = strClean($_POST['mentores']);
        
            if($intIdRol == 0){
                $resq_rol = $this->model->insertRol($strRol, $strDescripcion, $strAldea, $strMentor);
                $option = 1;
            }else{
                $resq_rol = $this->model->updateRol($intIdRol,$strRol, $strDescripcion, $strAldea, $strMentor);
                $option = 2;
            }

            if ($resq_rol > 0) {
                if($option==1){
                    $arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
                }else{
                    $arrResponse = array('status' => true, 'msg' => 'Datos actualizados correctamente.');
                }
                
            } elseif ($resq_rol == 'exist') {
                $arrResponse = array('status' => false, 'msg' => 'Atención! El rol ya existe.');
            } else {
                $arrResponse = array('status' => false, 'msg' => 'No es posible almacenar los datos.');
            }
        } catch (Exception $e) {
            $arrResponse = array('status' => false, 'msg' => $e->getMessage());
        }
       // echo "<script>document.getElementById('respuestaServidor').innerText = '" . $arrResponse['msg'] . "';</script>";
        header('Content-Type: application/json');
        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function setUpdate(){

        try {
            
            if(!isset($_POST['idRolE'],$_POST['textNrolE'], $_POST['mentoresE'], $_POST['idEstatusE'], $_POST['descripcionRolE'])){
                throw new Exception("Datos incompletos");
            }

            $intIdRol = intval(strClean($_POST['idRolE']));
            $strRol = strClean($_POST['textNrolE']);
            $strMentor = strClean($_POST['mentoresE']);
            $strAldea = strClean($_POST['idEstatusE']);
            $strDescripcion = strClean($_POST['descripcionRolE']);
            //var_dump("datos de setUpdate",$intIdRol, $strRol, $strMentor, $strAldea, $strDescripcion);
            $resq_rol = $this->model->updateRol($intIdRol,$strRol, $strMentor, $strAldea, $strDescripcion);


            if ($resq_rol > 0) {   
                 $arrResponse = array('status' => true, 'msg' => 'Datos actualizados correctamente.');
            } elseif ($resq_rol == 'exist') {
                $arrResponse = array('status' => false, 'msg' => 'Atención! El rol ya existe.');
            } else {
                $arrResponse = array('status' => false, 'msg' => 'No es posible almacenar los datos.');
            }
        } catch (Exception $e) {
            $arrResponse = array('status' => false, 'msg' => $e->getMessage());
        }
       
        header('Content-Type: application/json');
        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        die();
    }
    
}
?>
