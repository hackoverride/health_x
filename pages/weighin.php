<?php

echo '
<div id="weigh_in" class="element" >
    <form action="" method="POST" autocomplete="off">
    <input type="text" value="'.$_SESSION["user_id"].'" name="user_id" style="display:none;" >
    <input type="date" name="date" id="selectedDate"/>
    <input type="number" placeholder="Weight in KG" name="kilo" step="0.01" min="0" />
    <input type="number" placeholder="Measure Neck in CM" name="neck" step="0.01" min="0" />
    <input type="number" placeholder="Measure Stomach in CM" name="stomach" step="0.01" min="0" />
    <input type="submit" name="logweight" value="Register" class="knapp"/>
    </form>

    <script>
    document.getElementById("selectedDate").valueAsDate = new Date();
    </script>
</div>
';

?>