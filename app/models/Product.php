<?php
namespace App\Models;
class Product extends BaseModel{
    protected $table = 'product';
    public function getListProduct() {
        $sql = "select * from $this->table";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    public function addProduct($id, $ten_sp,$gia){
        $sql = "INSERT INTO $this->table VALUES (?,?,?)";
        $this->setQuery($sql);
        return $this->execute([$id,$ten_sp,$gia]);
    }
    public function getDetailProduct($id){
        $sql="SELECT * FROM $this->table where id = ?";
        $this->setQuery($sql);
        return $this->loadRow([$id]);
    }
    public function updateProduct($id, $ten_sp,$gia){
        $sql ="UPDATE $this->table SET ten_sp=?,gia=? where id = ?";
        $this->setQuery($sql);
        return $this->execute([$ten_sp,$gia,$id]);
    }
    public function deleteProduct($id){
        $sql = "DELETE FROM $this->table where id=?";
        $this->setQuery($sql);
        return $this->execute([$id]);
    }
}

?>