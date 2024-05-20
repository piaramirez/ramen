<?php
class Roles extends Controllers {
    public function __construct() {
        parent::__construct();
    }   

    public function Roles() {
        $data['page_id'] = 3;
        $data['tag_page'] = "Roles de usuarios | Sora Ramen";
        $data['page_title'] = "Agrega a tu Akatsuki";
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
            $statusaTrabajo = $value['statusaTrabajo'];
            if ($statusaTrabajo == 1) {
                $response['data'][$key]['statusaTrabajo'] = '<span class="badge badge-success">Activo</span>';
            } else {
                $response['data'][$key]['statusaTrabajo'] = '<span class="badge badge-danger">Inactivo</span>';
            }
            $response['data'][$key]['Opciones'] = '<button class="btnpermisos" rl="'.$response['data'][$key]['idaTrabajo'].'" title="Permisos">Edit </button>
            <button class="btnEditar" rl="'.$response['data'][$key]['idaTrabajo'].'" title="Editar">Edit </button>
            <button class="btnEliminar" rl="'.$response['data'][$key]['idaTrabajo'].'" title="Eliminar">Eliminar </button>';
        }
        //echo format($data);
        header('Content-Type: application/json');
        echo json_encode($response, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function setRol(){
        try {
            if(!isset($_POST['textNrol'], $_POST['descripcionRol'], $_POST['idEstatus'])) {
                throw new Exception("Todos los campos son obligatorios");
            }
            $strRol = strClean($_POST['textNrol']);
            $strDescripcion = strClean($_POST['descripcionRol']);
            $intStatus = intval($_POST['idEstatus']);
            //var_dump($strRol, $strDescripcion, $intStatus);
            if(empty($strRol) || empty($strDescripcion) || $intStatus == "") {
                throw new Exception("Datos inválidos o incompletos");
            }
            $resq_rol = $this->model->insertRol($strRol, $strDescripcion, $intStatus);
            //var_dump("Dartos:", $resq_rol);
            if ($resq_rol > 0) {
                $arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
            } elseif ($resq_rol == 'exist') {
                $arrResponse = array('status' => false, 'msg' => 'Atención! El rol ya existe.');
            } else {
                $arrResponse = array('status' => false, 'msg' => 'No es posible almacenar los datos.');
            }
        } catch (Exception $e) {
            $arrResponse = array('status' => false, 'msg' => $e->getMessage());
        }
        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        die();
    }
    
}
?>
