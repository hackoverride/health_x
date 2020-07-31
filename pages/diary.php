<?php
echo '
<div id="diaryholder" class="element" >
    <form action="" method="POST" autocomplete="off">
        <input type="text" value="'.$_SESSION["user_id"].'" name="user_id" style="display:none;" >
        <input type="date" name="date" id="diaryDate" />
        <label for="diary">Dear Diary:</label>
        <textarea name="tanker"></textarea>
        <input type="submit" name="newDiary" value="Submit" class="knapp" />
    </form>

    <script>
    document.getElementById("diaryDate").valueAsDate = new Date();
    </script>
</div>
';


?>