<?php 

    echo "ERROR!"
    
?>
<html>
<body onload = "close()">

</body>
</html>

<script>
    function close(){
        setTimeout(() => {
        window.location.href = "../index.php"
        }, 3000);
    }
</script>