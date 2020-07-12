<?php

echo '
<div id="weigh_in">
    <form action="" method="POST" autocomplete="off">
    <input type="text" value="'.$_SESSION["user_id"].'" name="user_id" style="display:none;" >
    <input type="date" name="date" />
    <input type="number" placeholder="Weight in whole kilo" name="kilo" />
    <input type="number" placeholder="Decimal (2) if any" name="decimal" />
    <input type="number" placeholder="Measure Neck" name="neck" />
    <input type="number" placeholder="Measure Stomach" name="stomach" />
    <input type="submit" name="logweight" value="Register" class="knapp"/>
    </form>
</div>
';

?>