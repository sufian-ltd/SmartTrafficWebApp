<?php
require_once "DB.php";

class DBPunishment
{
    private $table = "punishment";
    public function getInvoiceList($id)
    {
        $sql="SELECT * FROM $this->table where userId=:userId";
        $stmt=DB::prepare($sql);
        $stmt->bindParam(':userId',$id);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function setCaseStatus($msg,$id)
    {
    	$sql="UPDATE $this->table set case_status=:case_status where id=:id";
            $stmt=DB::prepare($sql);
            $stmt->bindParam(':case_status',$msg);
            $stmt->bindParam(':id',$id);
            return $stmt->execute();
    }
    public function getInvoice($caseId)
    {
        $sql="SELECT * FROM $this->table where id=:id";
        $stmt=DB::prepare($sql);
        $stmt->bindParam(':id',$caseId);
        $stmt->execute();
        return $stmt->fetch();
    }
}
?>