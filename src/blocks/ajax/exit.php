<?php
   setcookie('loginpreview', '', time() - 60*60*24*365, "/; samesite=strict");
   unset($_COOKIE['loginpreview']);