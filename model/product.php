<?php
require_once 'pdo.php';

function addProduct($category,$product_name,$product_price,$product_desc,$product_quantity,$product_avatar, $matsan){
    $sql="INSERT INTO `sanpham`(`id_dm`, `name_sp`, `price_sp`, `desc_sp`, `soluong`, `image_sp`,`matsan`) VALUES ('$category','$product_name','$product_price','$product_desc','$product_quantity','$product_avatar',' $matsan')";
    return pdo_execute($sql);
}
function delete_pro($id_sp){
    $sql="DELETE FROM `sanpham` WHERE id_sp= $id_sp";
    pdo_query_one($sql);
}
function LoadProById($id_sp){
    $sql="SELECT * FROM `sanpham` WHERE id_sp = $id_sp";
    $info = pdo_query_one($sql);
    return $info;
}
function   updateProduct($id_sp,$category,$product_name,$product_price,$product_desc,$product_quantity,$product_avatar){
    $sql="UPDATE `sanpham` SET `id_dm`='$category',`name_sp`='$product_name',`price_sp`='$product_price',`desc_sp`='$product_desc',`soluong`='$product_quantity',`image_sp`='$product_avatar' WHERE id_sp = $id_sp";
    pdo_execute($sql);
}
function search($content){
    $sql= "SELECT * FROM `sanpham` WHERE name_sp LIKE '%$content%'";
    $result = pdo_query($sql);
    return $result;
}
function searchnbyid_dm($id_dm){
    $sql="SELECT * FROM `sanpham` WHERE id_dm = $id_dm";
    $Product = pdo_query($sql);
    return $Product;
}
function load(){
    $sql = "SELECT * FROM `sanpham`";
    $list = pdo_query($sql);
    return $list;
}
function loadAllProduct_admin($page, $soSp) {
    if (empty($page) || $page == 0) {
        $page = 1;
    }

    $batdau = ($page - 1) * $soSp;
    // Sửa lại cách nối chuỗi trong truy vấn
    $sql = "SELECT * FROM `sanpham` LIMIT ".$batdau.",".$soSp;
    $list = pdo_query($sql);
    return $list;
}

function hien_thi_so_trang($total,$soSp){
    $product = count($total);
    $number = ceil($product / $soSp);
    $html = ""; 
    for($i=1; $i <= $number; $i++){
        $html .= ' <a class="page-link text-black" href="index.php?act=list-products&page='.$i.'">'.$i.'</a>';
    }
    return $html;
}


?>