<!DOCTYPE html>
<html lang="ja">
<head>
<title>10 Questions | by 黒木結</title>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="/10q/10q.css" />

<style type="text/css">
#answer span:first-child:before {
  content:"plants at house around";
}
#answer span:first-child label:after {
  content:"人の家の植物";
}
#answer span:last-child:before {
  content:"window of a house";
}
#answer span:last-child label:after {
  content:"人の家の窓";
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
<form action="" id="10q" method="post">

<div class="question">
<h2>What do you look at when you taking a walk?</h2>
<p>さんぽ中、つい見てしまうのは？</p>

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

</form>
</section>

<div id="enquete">
<?php
$ed = file('enquete.txt');
for ($i = 0; $i < count($answer); $i++) $ed[$i] = rtrim($ed[$i]);
if ($_POST['submit']) {
  $ed[$_POST['answer']]++;
  $fp = fopen('enquete.txt', 'w');
  for ($i = 0; $i < count($answer); $i++) {
    fwrite($fp, $ed[$i] . "\n");
  }
  fclose($fp);
}
for ($i = 0; $i < count($answer); $i++) {
  $w = $ed[$i];
  print "<span>";
  print "<b style='zoom:{$ed[$i]}%;'></b>";
  print "</span>\n";
}
?>
</div>

</body>
</html>
