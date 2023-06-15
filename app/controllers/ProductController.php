<?php
namespace App\Controllers;

use App\Models\Product;

class ProductController extends BaseController{
    public $product;
    public function __construct()
    {
        $this->product = new Product();
    }
    function getProduct() {
        // $products = getListProduct();
        $products = $this->product->getListProduct();
        return $this->render('product.index',compact('products'));
       
    }
    function add(){
        return $this->render('product.add');
    }
    public function postProduct(){
        if(isset($_POST['submit'])){
            $errors = [];
            if(empty($_POST['ten_sp'])){
                $errors['ten_sp'] = "Tên sản phẩm không được để trống";
            }
            if(empty($_POST['gia'])){
                $errors['gia']="Gía sản phẩm không được để trống";
            }
            if(count($errors)>0){
                redirect('errors',$errors,'add-product');
            }else{
                $result = $this->product->addProduct(Null,$_POST['ten_sp'],$_POST['gia']);
                if($result){
                    redirect('success',"Them san pham thanh cong",'add-product');
                }
            }
        }
    }
    public function detail($id){
        $products = $this->product->getDetailProduct($id);
        return $this->render('product.edit',compact('products'));
    }
    public function editProduct($id){
        if(isset($_POST['submit'])){
            $result =$this->product->updateProduct($id,$_POST['ten_sp'],$_POST['gia']);
            if($result){
                redirect('success',"Sửa thành công",'list-product');
            }
          
        }
    }
    public function delete($id){
        $result=$this->product->deleteProduct($id);
        if($result){
            redirect('success',"Xóa thành công",'list-product');
        }
    }   
}
