<?php
    #   Mục đích file:  trang hiển thi ra ngoài brower  
    
    
    #   require_once file init.php - kết nối database và các thông tin chung
    require_once "core/init.php";

    #   require_once file header.php - hiển thị phần header
    require_once "includes/header.php";

    #   require_once file slidebar.php    -   hiển thi sliderbar
    //require_once "templates/slidebar.php";

    #   require_once file content.php    -   hiển thi content
     require_once "templates/content.php";

    #   require_once file footer.php - hiển thị phần footer
    require_once "includes/footer.php";
?>