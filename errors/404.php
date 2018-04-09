    <h1>404 not found</h1>
<br>
<?php if (file_exists('debug')) : ?>
Error: <br><pre>
<?php
echo 'line:'. $e->getLine()."<br>";
echo 'File:'. $e->getFile() . "<br>";
echo $e->getMessage()."<br>";
echo $e->getTraceAsString();

endif;



