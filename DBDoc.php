<?php
require_once "DB.php";

    class DBDoc
    {
        private $table = "document";
        public function getDocument()
        {
            $sql="SELECT * FROM $this->table";
            $stmt=DB::prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        }
        public function getDocumentByKey($key)
        {
            $sql="SELECT * FROM $this->table where nid like :nid or drivingLicense like :drivingLicense or vehicleLicense like :vehicleLicense";
            $stmt=DB::prepare($sql);
            $key='%'.$key.'%';
            $stmt->bindParam(':nid',$key);
            $stmt->bindParam(':drivingLicense',$key);
            $stmt->bindParam(':vehicleLicense',$key);
            $stmt->execute();
            return $stmt->fetchAll();
        }
    }
?>