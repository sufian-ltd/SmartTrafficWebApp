<?php
require_once "DB.php";

class DBUser
{
    private $table = "users";

    public function isUser($email,$password)
    {
        $sql = "SELECT * FROM $this->table where email=:email and password=:password";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        if ($stmt->rowCount()>0)
            return "exist";
        else
            return "not exist";
    }
    public function registerUser($name,$email,$password,$contact,$address){
        $sql="INSERT into $this->table(name,email,password,contact,address) values (:name,:email,:password,:contact,:address)";
        $stmt=DB::prepare($sql);
        $stmt->bindParam(':name',$name);
        $stmt->bindParam(':email',$email);
        $stmt->bindParam(':password',$password);
        $stmt->bindParam(':contact',$contact);
        $stmt->bindParam(':address',$address);
        return $stmt->execute();
    }
    public function getUser($id)
    {
        $sql="SELECT * FROM $this->table where id=:id";
        $stmt=DB::prepare($sql);
        $stmt->bindParam(':id',$id);
        $stmt->execute();
        return $stmt->fetch();
    }
    public function getUserByEmailPass($email,$password)
    {

    }
    public function getPendingRequest()
    {
        $request="pending";
        $sql="SELECT * FROM $this->table where request=:request";
        $stmt=DB::prepare($sql);
        $stmt->bindParam(':request',$request);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function acceptRequest($id)
    {
        $sql="UPDATE $this->table set userNotice=:userNotice,policeNotice=:policeNotice,
            request=:request where id=:id";
        $userNotice="No Notice";
        $policeNotice="No Notice";
        $request="success";
        $stmt=DB::prepare($sql);
        $stmt->bindParam(':userNotice',$userNotice);
        $stmt->bindParam(':policeNotice',$policeNotice);
        $stmt->bindParam(':request',$request);
        $stmt->bindParam(':id',$id);
        return $stmt->execute();
    }
    public function rejectRequest($id)
    {
        $sql="DELETE from $this->table where id=:id";
        $stmt=DB::prepare($sql);
        $stmt->bindParam(':id',$id);
        return $stmt->execute();
    }
    public function getApprovedUser()
    {
        $request="success";
        $sql="SELECT * FROM $this->table where request=:request";
        $stmt=DB::prepare($sql);
        $stmt->bindParam(':request',$request);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function getUserReport()
    {
        $sql="SELECT * FROM $this->table where userNotice!=:userNotice and request=:request";
        $userNotice="No Notice";
        $request="success";
        $stmt=DB::prepare($sql);
        $stmt->bindParam(':userNotice',$userNotice);
        $stmt->bindParam(':request',$request);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function getPunishedUser()
    {
        $sql="SELECT * FROM $this->table where policeNotice!=:policeNotice and request=:request";
        $policeNotice="No Notice";
        $request="success";
        $stmt=DB::prepare($sql);
        $stmt->bindParam(':policeNotice',$policeNotice);
        $stmt->bindParam(':request',$request);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}

?>