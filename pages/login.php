<?php


echo '<div id="newuser" style="display: none;">
            <form action="" method="POST">
                <h2>Register New User</h2>
                <input type="text" name="firstname" placeholder="Firstname" />
                <input type="text" name="lastname" placeholder="Lastname" />
                <input type="text" name="user" placeholder="Username" />
                <input type="text" name="password" placeholder="Password" />
                <input type="text" name="email" placeholder="Email" />
                <input name="newuser" type="submit" value="Register" class="knapp">
                <div class="knapp">Back</div>

            </form>

        </div>
        <div id="login">
            <form action="" method="POST">
                <h2>Login:</h2>
                <input type="text" name="user" placeholder="Username" />
                <input type="password" name="password" placeholder="Password" />
                <input type="submit" name="login" value="Login" class="knapp" />
                <div class="knapp">New User</div>
            </form>

        </div>
        <script>
            $(document).ready(function () {
                $(".knapp").on("click", function () {
                    $("#newuser").toggle();
                    $("#login").toggle();
                })
            })
        </script>';

?>