<?php 
    $conn = mysqli_connect('localhost','root', '', 'people_tracer');
    if (!$conn) {
        ?>
            <!-- <script> -->
                <!-- /alert("Connection Successful"); -->
            <!-- </script> -->
        <?php
    // }else {
        ?>
            <script>
                alert("Connection Failed");
            </script>
        <?php
    }
?>
