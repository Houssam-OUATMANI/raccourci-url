



<?php

use App\Config\Session;



$user = new Session()->get("user");

?>

<pre>
     <?= json_encode($_SESSION, JSON_PRETTY_PRINT);?>
</pre>

<?php 

?>
<h1>Home page</h1>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates nam mollitia facere repellendus doloremque rem cupiditate pariatur repudiandae molestias at?</p>