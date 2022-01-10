<!DOCTYPE html>
<html lang="ja">
<head>
<title>10 Questions | by Yuto Ohashi</title>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="/10q/10q.css" />

<style type="text/css">
#answer span:first-child:before {
  content:"the sky";
}
#answer span:first-child label:after {
  content:"空がみえる";
}
#answer span:last-child:before {
  content:"some people";
}
#answer span:last-child label:after {
  content:"人がみえる";
}
#enquete span {
  display:inline-block;
}

#answer:after {
  position:absolute;
  margin:1.5vw 0; padding:1.5vw 0;
	display:block;
	content:'or';
	-webkit-transform:translate(-50%,-50%);
	transform:translate(-50%,-50%);
	top:50%; left:50%;
}

#image {
  position:absolute;
  text-align:center;
	-webkit-transform:translate(-50%,-50%);
	transform:translate(-50%,-50%);
	top:50%; left:50%;
  width:100vw;
  z-index:-1;
  overflow:hidden;
}
#image img {
  width:100%;
}
</style>
</head>
<body>

<section id="main" class="questionnaire">
<form action="answer.php" id="10q" method="post">

<div class="question">
<h2>When you open your eyes you will see</h2>
<p>目を開くと</p>

<div id="answer">
<?php
$answer = array('left', 'right');
for ($i = 0; $i < count($answer); $i++) {
  print "<span>\n";
  print "<input id='{$answer[$i]}' type='radio' name='answer' value='$i'>\n";
  print "<label for='{$answer[$i]}'></label>\n";
  print "</span>\n";
}
?>
</div>

</div>

<div id="image">
<img src="000.png">
</div>

<p id="start">
<input type="submit" name="submit" value="Answer">
</p>

</form>
</section>

</body>
</html>
