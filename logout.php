<?php 

session_start();

require 'sweetalert.php';

unset($_SESSION['username']);
session_destroy();
echo "<script type='text/javascript'>
setTimeout(function () { 
  swal({
          icon: 'info',
          title: 'Anda berhasil logout!',
          type: 'success',
          timer: 2000,
          showConfirmButton: true,
          confirmButtonColor: '#3085d6'
      });   
},30);  
window.setTimeout(function(){ 
  window.location.replace('index.php');
} ,1500); 
</script>";


?>

