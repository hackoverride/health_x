<?php
echo '
<div id="diaryholder">
    <form action="" method="POST" autocomplete="off">
        <input type="text" value="'.$_SESSION["user_id"].'" name="user_id" style="display:none;" >
        <input type="date" name="date" />
        <label for="diary">Dear Diary:</label>
        <textarea id="diary name="diary"></textarea>
        <input type="submit" name="newDiary" value="Submit" />
    </form>
</div>
';


?>