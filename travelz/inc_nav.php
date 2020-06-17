<ul>
    <li><a href="index.php">Home</a>
    </li>
<?php if(isset($_SESSION['userData'])) {?>
    <li><a href="userpage.php">Profile</a>
    </li>
<?php }?>
</ul>