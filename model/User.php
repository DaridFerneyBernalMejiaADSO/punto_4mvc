<?php
require_once "../libs/Database.php";
class User
{
    protected $db;

    public function __construct(PDO $connection)
    {
        $this->db = $connection;
    }

    private  $nombre;
    private $venta1;
    private $venta2;
    private $venta3;
    private $ganvend;
    private $ganemp;






    function setNombre($nombre)
    {
        $this->nombre =  $nombre;
    }
    function getNombre()
    {
        return $this->nombre;
    }


    function setVenta1($venta1)
    {
        $this->venta1 = $venta1;
    }
    function getVenta1()
    {
        return $this->venta1;
    }


    function setVenta2($venta2)
    {
        $this->venta2 = $venta2;
    }
    function getVenta2()
    {
        return $this->venta2;
    }


    function setVenta3($venta3)
    {
        $this->venta3 = $venta3;
    }
    function getVenta3()
    {
        return $this->venta3;
    }

    function getAll()
    {
        $stm = $this->db->prepare("SELECT * FROM usuarios");
        $stm->execute();
        return $stm->fetchAll();
    }


    
    function obtener_valor($ven1,$ven2,$ven3){
        if (is_numeric($ven1) && is_numeric($ven2) && is_numeric($ven3)) {
            $ventastotales = $ven1 + $ven2 + $ven3;
            if ($ventastotales >= 3000){
                $total = $ventastotales * 0.15;
                $comision = $total + 500;
            }
            else{
                $comision=500;
            }
            return $comision;
        }

    }


    function ganacias_empresa($ven1,$ven2,$ven3){
        if (is_numeric($ven1) && is_numeric($ven2) && is_numeric($ven3)) {
            $empresa = $ven1 + $ven2 + $ven3;
            return $empresa;
        }

        }
        
    function guardar()
    {
        $this->ganvend = $this->obtener_valor($this->venta1, $this->venta2, $this->venta3);
        $this->ganemp= $this->ganacias_empresa($this->venta1, $this->venta2, $this->venta3);
      
        // Verificamos si hay algo en la base de datos
        $stm = $this->db->prepare("INSERT INTO usuarios(Nombre, venta1, venta2, venta3,	ganvend,ganemp) VALUES (:nom, :ven1, :ven2, :ven3,:ganvend,:ganemp)");
        $marcadores = [
            ":nom" => $this->nombre,
            ":ven1" => $this->venta1,
            ":ven2" => $this->venta2,
            ":ven3" => $this->venta3,
            ":ganvend" => $this->ganvend,
            ":ganemp" => $this->ganemp
        ];
    
        
        $stm->execute($marcadores);
    }

}
        
// // $insertar = $con->prepare("INSERT INTO usuarios(Nombre,venta1,venta2,venta3,ganvend,ganemp)values ('$nombre','$venta1','$venta2','$venta3', '$valor','$e')");
// //     $insertar->execute();



//         // if ($guardar->execute($marcadores)) {
//         //     echo "El nuevo dato se ha guardado correctamente.";
//         // } else {
//         //     echo "Error al guardar el nuevo dato.";
//         // }

//     }
//     function guardar(){
//         $stm = $this->db->prepare("INSERT INTO usuarios(Nombre,venta1,venta2,venta3)values (':nom',':ven1',':ven2',:ven3')");
//         $stm->bindValue(':nom', $this->nombre);
//         $stm->bindValue(':ven1', $this->venta1);
//         $stm->bindValue(':ven2', $this->venta2);
//         $stm->bindValue(':ven3',$this->venta3);  
//         $stm->execute();
//     }
    
// }
 


    //     function guardar(){
    // //verificamos si hay algo eb la base de dar
        
    //     $consulta=$this->db->prepare("SELECT * FROM users WHERE cedula=:cedula");
    //     $consulta->bindValue(":cedula", $this->cedula);
    //     $consulta->execute();
    //     $cantidad=$consulta->fetchColumn();
    //     if($cantidad>0){
    //         echo"error no se guardaron en la base de datos";
    //     return false;
    //     }
    //     else{

    //         $base = $this->db;
    //         $guardar = $base->prepare("INSERT INTO users(firs_name,last_name,email,cedula) values (:nom, :appe, :ema,:cedula) ");
    
    //         $marcadores =[
    //             ":nom" => $this->nombre , 
    //             ":appe" => $this->apellido,
    //             ":ema" => $this->email,
    //             ":cedula"=> $this-> cedula
    //         ];

    //         $guardar -> execute($marcadores);
    //         echo"guardando ";
    //         echo"<br>";
    //         echo"<br>";
    //         return true;
            
    
    //         // if ($guardar->execute($marcadores)) {
    //         //     echo "El nuevo dato se ha guardado correctamente.";
    //         // } else {
    //         //     echo "Error al guardar el nuevo dato.";
    //         // }

    //     }

        
        
    // }
