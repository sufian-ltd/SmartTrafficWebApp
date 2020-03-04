<?php
require_once "DB.php";

class DBThana
{
    private $table = "thana";
    public function getAllCaseId($thanaId)
    {
        $sql="SELECT * FROM $this->table where thanaId=:thanaId";
        $stmt=DB::prepare($sql);
        $stmt->bindParam(':thanaId',$thanaId);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function addCase($password, $thanaId, $caseId)
    {
        $sql="INSERT into $this->table(password,thanaId,caseId) values (:password,:thanaId,:caseId)";
        $stmt=DB::prepare($sql);
        $stmt->bindParam(':password',$password);
        $stmt->bindParam(':thanaId',$thanaId);
        $stmt->bindParam(':caseId',$caseId);
        return $stmt->execute();
    }
    
}
?>