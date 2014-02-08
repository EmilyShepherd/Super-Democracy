<?php

include 'model/database.php';

if ($_POST)
{
    $ldaphost = 'nlbldap.soton.ac.uk';
    $ldapport = 389;

    $ds = ldap_connect($ldaphost, $ldapport);

    if (!$ds) 
    {
        //ERR
    }
    else
    {
        ldap_set_option($ds, LDAP_OPT_PROTOCOL_VERSION, 3);
        ldap_set_option($ds, LDAP_OPT_REFERRALS, 0);

        if (@ldap_bind($ds, $_POST['username'] . '@soton.ac.uk', $_POST['password'])) 
        {
            $username = $db->real_escape_string($_POST['username']);
            $user     = $db->query
            (
                  'SELECT * FROM person '
                . 'WHERE issname=\'' . $username. '\''
            );

            session_start();

            if ($user->num_rows)
            {
                $user = $user->fetch_assoc();
                $_SESSION['user_id'] = $user['id'];
            }
            else
            {
                $db->query
                (
                      'INSERT INTO person(name, issname) '
                    . 'VALUES(\'' . $username . '\', \'' . $username . '\')'
                );
                echo $db->error;
                $_SESSION['user_id'] = $db->insert_id;
            }

            header('Location: /');
            exit;
        }
        else 
        {
            //ERR
        }
    }
}

$title = 'Login';

include 'common/header.php';

?>

<div style="text-align: center;">
  <h1>Login</h1>

  <form method="post">
    <b>Username</b><br />
    <input type="text" name="username" />

    <br /><br />

    <b>Password</b><br />
    <input type="password" name="password" />

    <br /><br />

    <input type="submit" value="Login" class="btn btn-primary btn-lg"/>
  </form>
</div>

<?php include 'common/footer.php';