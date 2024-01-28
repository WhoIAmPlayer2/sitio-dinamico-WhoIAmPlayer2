<?php
    class crud{
        //Objeto de base de datos privado
        private $db;
        //Constructor para inicializar variable privada para la conexion a la base de datos
        function __construct($conn){
            $this->db=$conn;
        }

        //Funcion para insertar un nuevo registro dentro de la base de datos asistencia
        public function insert($fname,$lname,$dob,$email,$contact,$specialty){
            try {
                //Define consulta sql para ser evaluada
                $sql="INSERT INTO asistentes (firstname,lastname,dateofbirth,emailaddress,contactnumber,specialty_id)VALUES(:fname,:lname,:dob,:email,:contact,:specialty)";
                $stmt = $this->db->prepare($sql);

                $stmt->bindparam(':fname',$fname);
                $stmt->bindparam(':lname',$lname);
                $stmt->bindparam(':dob',$dob);
                $stmt->bindparam(':email',$email);
                $stmt->bindparam(':contact',$contact);
                $stmt->bindparam(':specialty',$specialty);
                //Executa consulta
                $stmt->execute();
                return true;
            } catch (PDOException $e) {               
                echo $e->GetMessage();
                return false;
            }
        }
        public function editAttendee($id,$fname,$lname,$dob,$email,$contact,$specialty){
            try {
                //Define consulta sql para ser evaluada            
                $sql="UPDATE asistentes SET firstname= :fname ,lastname= :lname ,dateofbirth= :dob ,emailaddress= :email ,contactnumber= :contact, specialty_id = :specialty WHERE asistencia_id= :id ";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id',$id);
                $stmt->bindparam(':fname',$fname);
                $stmt->bindparam(':lname',$lname);
                $stmt->bindparam(':dob',$dob);
                $stmt->bindparam(':email',$email);
                $stmt->bindparam(':contact',$contact);
                $stmt->bindparam(':specialty',$specialty);
                //Executa consulta
                $stmt->execute();
                return true;
            } catch (PDOException $e) {               
                echo $e->GetMessage();
                return false;
            }
        }        
        public function getAttendees(){
            try{
                $sql="SELECT * FROM Asistentes a inner join specialties b on a.specialty_id=b.specialty_id";
                $result=$this->db->query($sql);
                return $result;
            }catch (PDOException $e) {               
                    echo $e->GetMessage();
                    return false;
            }
        }
        public function getAttendeesDetails($id){
            try{
                $sql="SELECT * FROM Asistentes a inner join specialties b on a.specialty_id=b.specialty_id where a.asistencia_id=:id";
                $stmt=$this->db->prepare($sql);
                $stmt->bindparam(':id',$id);
                $stmt->execute();
                $result=$stmt->fetch();
                return $result;
            }catch (PDOException $e) {               
                echo $e->GetMessage();
                return false;
            }
        }
        public function deleteAttendee($id){
            try {
                //Define consulta sql para ser evaluada            
                    $sql="DELETE from asistentes  WHERE asistencia_id= :id ";
                    $stmt = $this->db->prepare($sql);
                    $stmt->bindparam(':id',$id);
                    //Executa consulta
                    $stmt->execute();
                    return true;
                } catch (PDOException $e) {               
                    echo $e->GetMessage();
                    return false;
                }
        }
        public function getSpecialties(){
            try{
                $sql="SELECT * FROM specialties";
                $result=$this->db->query($sql);
                return $result;
            } catch (PDOException $e) {               
                echo $e->GetMessage();
                return false;
            }
            
        }
    }
?>