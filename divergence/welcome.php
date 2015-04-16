<?php session_start(); ?>
<!--
Author: Stanley Hammond - Spring 2013

PHP Assignment Rock, Paper, Scissors Game
Purpose:
This program is a set of 3 PHP pages for a game of rock, 
paper, scissors where you select which guess you want to 
play and the computer will randomly select a response and 
based on the two responses will declare a winner.
You have the option to play multiple times and a score is
tallied and displayed at the end of the round and the game.

The 3 PHP pages that make up this game are:
welcome.php (This file) - Starting point for game
game.php - The actual game
recap.php - Used to handle replaying the game

-->
<html>
<body>

<?php

// If the $_SESSION variables for the score are not set/empty (New Game),
// then assign them a value of "0"
if( is_null($_SESSION['draws']) && is_null($_SESSION['comp_wins']) && is_null($_SESSION['your_wins']) )
	{
	$_SESSION['draws']=0;
	$_SESSION['comp_wins']=0;
	$_SESSION['your_Wins']=0;
	}

?>

<h2>Welcome!</h2>
<h3>Rock, Paper, Scissors Game</h3>

<p>Select your guess below. Can you outsmart the computer?</p>

<form action="game.php" method="post">

<input type="radio" name="your_guess" value="0" checked="checked" /> Rock
<input type="radio" name="your_guess" value="1" /> Paper
<input type="radio" name="your_guess" value="2" /> Scissors</p>

<input type="submit">
</form>

</body>
</html>
