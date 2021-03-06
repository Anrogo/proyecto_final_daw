<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class LoginModel extends CI_Model
{
    # Variable donde se guarda la conexión a la base de datos
    private $db = null;

    function __construct()
    {

        parent::__construct();

        # Cargamos la conexión a la base de datos
        $this->db = $this->load->database('default', true);
    }

   # Ejecuta consultas y devuelte los resultados en un array
   public function ExecuteArrayResults( $sql)
   {
     $query = $this->db->query( $sql);
     $rows = $query->result_array();
     $query->free_result();
 
     return ( $rows);
   }
  # Ejecuta consultas, con los valores pasados por separado,
  # y devuelte los resultados en un array
   public function ExecuteResultsParamsArray( $sql, $params)
   {
 
     $query = $this->db->query( $sql, $params);
     $rows['data'] = $query->result_array();
     $query->free_result();
 
     return ( $rows);
   } 
   public function Execute( $sql)
   {
     $this->db->query( $sql);
   }
 
  # Método para validar el email y contraseña que nos han pasado desde el formulario
  public function comprobar_usuario( $datos)
  {
    $sql = "SELECT * FROM usuarios WHERE username =  ?  AND password =  ? ";
    $params = array( $datos['username'],$datos['password']);

    return ( $this->ExecuteResultsParamsArray( $sql, $params ));

  }
}
