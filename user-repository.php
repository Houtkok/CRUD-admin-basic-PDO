<?php 

class UserRepository {
    private $db;

    public function __construct(PDO $db){
        $this->db = $db;
    }

    public function create($fname,$lname,$gender,$email,$address,$tel){
        try{
            $cr = $this->db->prepare("INSERT INTO `student`(`id`, `fname`, `lname`, `gender`, `email`, `address`, `tel`) 
                  VALUES (NULL,:fname, :lname, :gender, :email, :address, :tel)");
            $cr -> bindParam(':fname', $fname);
            $cr -> bindParam(':lname', $lname);
            $cr -> bindParam(':gender', $gender);
            $cr -> bindParam(':email', $email);
            $cr -> bindParam(':address', $address);
            $cr -> bindParam(':tel', $tel);
            $cr -> execute();
            return true;
        }
        catch(PDOException $e){
            echo "Error : " . $e -> getMessage();
            return false;
        }
    }
    public function read(){
        try{
            $cr = $this->db->prepare("SELECT * FROM `student`");
            $cr -> execute();
            $result = $cr -> fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
        catch(PDOException $e){
            echo "Error : " . $e -> getMessage();
            return false;
        }
    }
    public function getUserById($id){
        try{
            $cr = $this->db->prepare("SELECT * FROM `student` WHERE `id`=?");
            // $cr->bindParam(':id',$id);
            $cr->execute([$id]);
            $result = $cr -> fetch(PDO::FETCH_ASSOC);
            return $result;
        }
        catch(PDOException $e){
            echo "Error : " . $e -> getMessage();
            return false;
        }
    }
    public function update($id, $fname, $lname, $gender, $email, $address, $tel){
        try {
            $cr = $this->db->prepare("UPDATE `student` SET 
                                        `fname`=:fname, `lname`=:lname, `gender`=:gender, `email`=:email, 
                                        `address`=:address, `tel`=:tel WHERE `id`=:id");
            $cr->bindParam(':id', $id);
            $cr->bindParam(':fname', $fname);
            $cr->bindParam(':lname', $lname);
            $cr->bindParam(':gender', $gender);
            $cr->bindParam(':email', $email);
            $cr->bindParam(':address', $address);
            $cr->bindParam(':tel', $tel);
            $cr->execute();
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function delete($id){
        try{
            $cr = $this->db->prepare("DELETE FROM `student` WHERE `id`=:id");
            $cr->bindParam(':id', $id);
            $cr->execute();
            return true;
        }
        catch(PDOException $e){
            echo "Error : " . $e -> getMessage();
            return false;
        }
    }
}
?>