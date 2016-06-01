<?php
include 'connectdb.php';
$msg='';
if(!empty($_GET['code']) && isset($_GET['code']))
{
$code=mysql_real_escape_string($_GET['code']);
$c=mysql_query("SELECT uid FROM registered_users WHERE activation='$code'",$con);

if(mysql_num_rows($c) > 0)
{
$count=mysql_query("SELECT uid FROM registered_users WHERE activation='$code' and status='0'",$con);

if(mysql_num_rows($count) == 1)
{
mysql_query("UPDATE registered_users SET status='1' WHERE activation='$code'",$con);
header("Location: ../signIn.php?status=active");
}
else
{
echo "Your account is already active, no need to activate again";
}

}
else
{
echo "Wrong activation code.";
}

}
?>