<!DOCTYPE html>
<html lang="ja">
<head>
<title>10 Questions | by ソウ</title>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="/10q/10q.css" />

<style type="text/css">
#answer span:first-child:before {
  content:"yes";
}
#answer span:first-child label:after {
  content:"目指せ香川〇之、さ〇なクン！";
}
#answer span:last-child:before {
  content:"no";
}
#answer span:last-child label:after {
  content:"そもそも、TVに出るなんてありえない。";
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
</style>
</head>
<body>

<section id="main" class="questionnaire">
<form action="answer.php" id="10q" method="post">

<div class="question">
<h2>Do you want to appear on TV program or something and being said "you are weird" by celebrity?</h2>
<p>TVとかに出演して、マ〇コデラックスに「あんた、変態ねぇ。」と言われてみたいですか？</p>

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

<p id="start">
<input type="submit" name="submit" value="Answer">
</p>

</form>
</section>

</body>
</html>
