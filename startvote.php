<?php

session_start();

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
}
else
{
    header('Location: ./');
}