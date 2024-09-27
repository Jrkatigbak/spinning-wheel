<?php  
if(isset($_SESSION['flash_message'])){
?>
      <script>
          swal(<?= $_SESSION['flash_message']?>);
      </script>
<?php
unset($_SESSION['flash_message']);	
}
?>