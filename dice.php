<?php

// ROLL THE FUCKING DICE


if( $_GET['roll'] )
{
	$attack = $_GET['attack'];
	$defend = $_GET['defend'];

	$rolls = array('attack' => array(), 'defend' => array());

	for( $i = 0; $i < $attack; $i++)
	{
		$rolls['attack'][] = rand(1, 6);
	}

	for( $i = 0; $i < $defend; $i++)
	{
		$rolls['defend'][] = rand(1, 6);
	}
	rsort($rolls['attack']);
	rsort($rolls['defend']);
	$loss = array('attack' => 0, 'defend' => 0);
	foreach($rolls['defend'] as $key => $val)
	{
		if( $val >= $rolls['attack'][$key] )
		{
			$loss['attack']--;
		}
		else
		{
			$loss['defend']--;
		}
	}
	
}

?>
<html>
<head>
<style type="text/css">
body
{
	font-size: 25px;
}

.dice
{
	border: 1px solid black;
	display: inline-block;
	width: 30px;
	text-align:center;
}

#container
{
	margin-top:100px;
	width:500px;
}

.attack
{
	color: #FF0000;
}

#attack
{
	width: 30%;
	display: inline-block;
	text-align: center;
}

#defend
{
	width: 30%;
	display: inline-block;
	text-align: center;
}

#roll
{
	display: inline-block;
	vertical-align:top;
}

.banner
{
	height: 30px;
}
</style>
</head>
<body>
<div id="container">
	<form method="GET" action="dice.php">
	<div id="attack">
		<div class="banner">
		
		<select id="attack" name="attack">
			<?php
			for( $i = 3; $i >= 1; $i-- )
			{
				if( $i == $attack )
				{
				?>
			<option value="<?php echo $i; ?>" selected="selected"><?php echo $i; ?></option>
				<?php
				}
				else
				{
				?>
			<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
				<?php
				}
			}
			?>
		</select>
		<img src="assets/glyphicons_281_bullets.png">
		</div>
		<?php
		foreach($rolls['attack'] as $roll)
		{
			?>
			<div class="dice"><?php echo $roll; ?></div>
			<?php
		}
		?>
		<div class="banner attack"><?php echo $loss['attack']; ?></div>
	</div>
	<div id="roll">
		<button type="submit" id="roller" name="roll" value="fuckyoufuckers">Roll! <img src="assets/glyphicons_290_skull.png"></button>
	</div>
	<div id="defend">
		<div class="banner">
		<img src="assets/glyphicons_270_shield.png">
		<select id="defend" name="defend">
			<?php
			for( $i = 2; $i >= 1; $i-- )
			{
				if( $i == $defend )
				{
				?>
			<option value="<?php echo $i; ?>" selected="selected"><?php echo $i; ?></option>
				<?php
				}
				else
				{
				?>
			<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
				<?php
				}
			}
			?>
		</select>
		</div>
		<?php
		foreach($rolls['defend'] as $roll)
		{
			?>
			<div class="dice"><?php echo $roll; ?></div>
			<?php
		}
		?>
		<div class="banner attack"><?php echo $loss['defend']; ?></div>
	</div>
	</form>
</div>
</body>
</html>
