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
game.php - The actual game
recap.php (This file) - Used to handle replaying the game

-->
<html>
<body>

<h2>Rock, Paper, Scissors Game</h2>

<!-- Start PHP script -->
<?php 

// Based on the selection from game.php, if "yes", go back to welcome.php and exit this script.
// Or if "no", display the final score tally for the variables in $_SESSION and then destroy 
// the session.
if ( $_POST["your_answer"] == "yes" )
	{
	//header("Location: welcome.php");
	echo "<script>window.location = 'welcome.php'</script>";
	exit();
	}
else if ( $_POST["your_answer"] == "no" )
	{
	echo "<h3>Final Score</h3>";
	echo "Scores: Wins: {$_SESSION['your_wins']}, Losts: {$_SESSION['comp_wins']}, Draws: {$_SESSION['draws']} <br><br>";
	echo "<a href='welcome.php'>Return Home</a>";
	session_destroy();
	}

?>
<!-- End PHP script -->

</body>
</html>
