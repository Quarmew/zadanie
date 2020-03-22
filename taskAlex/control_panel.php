<?php
session_start();
if(isset($_SESSION['user_id'])){ echo "You're autorized.";} else {header('Location: autorization.php');}
?>    
</body>