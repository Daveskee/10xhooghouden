<?php
/**
 * Created by PhpStorm.
 * User: stijn versluis
 * Date: 8/27/2019
 * Time: 4:16 PM
 */



require "header.php";

?>
<form action="includes/controller.php" method="post" style="text-align: center">
    <input type="hidden" value="delete" name="type">
    <input type="submit" value="Leegmaken" style="width: 100px; height: 100px;">
</form>
<button class="cancelBtn" style="width: 100px; height: 100px; margin: 0 auto;">Cancel</button>

<?php require "footer.php"?>