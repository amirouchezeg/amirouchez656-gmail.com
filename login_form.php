<?php

$page_title = "Authentification";

include("header.php");

if ($badlogin) {
?>

<span class=title2><center>Login ou mdp incorrect! </span>
<span class=title3>Réessayez s'il vous plaît</center></span>

<?php
}
?>

<p class='center'>Introduisez votre login:

<div class='center'>
<form method="POST" name="loginform">
  <table class='center' border =0>
    <tr>
      <td class='left'>login: </td>
      <td class='right' ><input type="text" name="login" size="20" value="<?php if(isset($login)) echo $login;?>"></td>
    </tr>
    <tr>
      <td class='left'>mot de passe:</td>
      <td class='right'><input type="password" name="password" size="20"></td>
    </tr>
  </table>
<table cellspacing=5 class=right border =0>
 <tr>
  <td class='left'><input type="submit" value="Login" /></td>
  <td class='right'><input type="reset" value="Recommencer" /></td>
 </tr>
</table>

<a href="new_user.php">S'enregistrer</a>

</form>
</div>

<?php
  include("footer.php");
?>  