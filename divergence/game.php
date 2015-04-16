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
welcome.php - Starting point for game
game.php (This file) - The actual game
recap.php - Used to handle replaying the game

-->
<html>
<body>

<h2>Rock, Paper, Scissors Game</h2>

<!-- Begin PHP script -->
<?php 

//$_SESSION['draws']=0;
//$_SESSION['comp_wins']=0;
//$_SESSION['your_Wins']=0;

// Set variables for your response (pulled from form on welcome.php), computer's response
// (random number between 0 and 2) and create an array for the rock, papaer, scissor responses.
$your_response = (int)$_POST["your_guess"];
$comp_response = mt_rand(0,2);

$responses = array("rock","paper","scissors");

// Based on the your response and the computer response, determine who wins the session or 
// if it is a draw.  Add one to the appropriate $_SESSION score variable.
// Display which response wins (who beat whom).
if ( $your_response == $comp_response )
	{
	echo "Draw! <br>";
	echo "Both responses are the same.<br> {$responses[$your_response]} <br> {$responses[$comp_response]} <br>";
	$_SESSION['draws']=$_SESSION['draws']+1;
	}
else if ( $your_response == 0 && $comp_response == 2 )
	{
	echo "You Win! <br>";
	echo "{$responses[$your_response]} beats {$responses[$comp_response]} <br>";
	$_SESSION['your_wins']=$_SESSION['your_wins']+1;
	}
else if ( $your_response == 2 && $comp_response == 0 )
	{
	echo "Computer Wins! <br>";
	echo "{$responses[$comp_response]} beats {$responses[$your_response]} <br>";
	$_SESSION['comp_wins']=$_SESSION['comp_wins']+1;
	}
else if ( $your_response > $comp_response )
	{
	echo "You Win! <br>";
	echo "{$responses[$your_response]} beats {$responses[$comp_response]} <br>";
	$_SESSION['your_wins']=$_SESSION['your_wins']+1;
	}
else if ( $your_response < $comp_response )
	{
	echo "Computer Wins! <br>";
	echo "{$responses[$comp_response]} beats {$responses[$your_response]} <br>";
	$_SESSION['comp_wins']=$_SESSION['comp_wins']+1;
	}
	
//echo "$your_response {$responses[$your_response]} <br>";
//echo "$comp_response {$responses[$comp_response]} <br>";

// Display the current scoreboard, based on the $_SESSION variables
echo "Scores: Wins: {$_SESSION['your_wins']}, Losts: {$_SESSION['comp_wins']}, Draws: {$_SESSION['draws']} <br>";

?>
<!-- End PHP script -->
<br>

<form action="recap.php" method="post">
<p>Would you like to play again?</p>
<input type="radio" name="your_answer" value="yes" checked="checked" /> Yes
<input type="radio" name="your_answer" value="no" /> No
<input type="submit">
</form>

</body>
</html>
