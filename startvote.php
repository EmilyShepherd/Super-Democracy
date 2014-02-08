<?php

session_start();

if (!isset($_SESSION))
{
    $_SESSION = array( );
}

if ($_POST && isset($_POST['vote_in']))
{
    foreach ($_POST['vote_in'] as $vote)
    {
        $_SESSION['votes'][] = explode('_', $vote);
    }
}

if (count($_SESSION['votes']))
{
    header('Location: vote.php?step=0');
    //header('Location: vote.php?position=' . $_SESSION['votes'][0][0] .  '&election=' . $_SESSION['votes'][0][1]);
}
else
{
    header('Location: ./');
}