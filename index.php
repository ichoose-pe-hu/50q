<?php

function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-16');
}

$name = (string)filter_input(INPUT_POST, 'name'); // $_POST['name']
$link = (string)filter_input(INPUT_POST, 'link'); // $_POST['link']
$tag = (string)filter_input(INPUT_POST, 'tag'); // $_POST['tag']

$fp = fopen('50q.csv', 'a+b');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    flock($fp, LOCK_EX);
    fputcsv($fp, [$name, $link, $tag]);
    rewind($fp);
}

flock($fp, LOCK_SH);
while ($row = fgetcsv($fp)) {
    $rows[] = $row;
}
flock($fp, LOCK_UN);
fclose($fp);

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-16" />
<link rel="stylesheet" type="text/css" href="/styles.css" />
<link rel="stylesheet" type="text/css" href="/50q/50q.css" />
<script type="text/javascript" src="http://www.google.com/jsapi"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript">
$(function(){
$("#top").load("http://ichoose.pe.hu/top.html");
$("#inside").load("http://ichoose.pe.hu/50q/tips.html");
})
</script>
<title>Answer 50 Questions | The Answers are always inside of you</title>
</head>
<body>
<div id="top"></div>
<h2 class="today"><u><a onclick="obj=document.getElementById('today').style; obj.display=(obj.display=='block')?'none':'block';">Tips</a></u></h2>

<div id="main">
<div id="ichoose">
<h1><i>Play</i></h1>
<div id="howto">
<h3>We create a collection of<br/><i>50 Questions</i></h3>
<h3>Let's enjoy 50 Questions by varaious peoples here.</h3>
<p>50の質問のコレクションを作成します。<br/>
さまざまな人が考えた50の質問をお楽しみください。</p>
</div>
<div id="play">
<h3><u>These 50 questions were created by</u></h3>
<?php if (!empty($rows)): ?>
<?php foreach ($rows as $row): ?>
これは、 <b><a href="<?=h($row[1])?>"><?=h($row[0])?></a></b>
<p>が考えた 50の質問 です。</p>
<?php endforeach; ?>
<?php else: ?>
<p>coming soon</p>
<?php endif; ?>
</div>
<h1>by creative, community space <a class="pehu" href="http://vg.pe.hu/jp/">∧°┐</a></h1>
</div>
</div>

<div id="today">
<div id="inside">
</div>
</div>
</body>
</html>
