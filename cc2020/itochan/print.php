<?php

function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

$en = (string)filter_input(INPUT_POST, 'en'); // $_POST['en']
$jp = (string)filter_input(INPUT_POST, 'jp'); // $_POST['jp']
$a_l_en = (string)filter_input(INPUT_POST, 'a_l_en'); // $_POST['a_l_en']
$a_l_jp = (string)filter_input(INPUT_POST, 'a_l_jp'); // $_POST['a_l_jp']
$a_r_en = (string)filter_input(INPUT_POST, 'a_r_en'); // $_POST['a_r_en']
$a_r_jp = (string)filter_input(INPUT_POST, 'a_r_jp'); // $_POST['a_r_jp']
$a_l = (string)filter_input(INPUT_POST, 'a_l'); // $_POST['a_l']
$a_r = (string)filter_input(INPUT_POST, 'a_r'); // $_POST['a_r']

$fp = fopen('list.csv', 'a+b');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    flock($fp, LOCK_EX);
    fputcsv($fp, [$en, $jp, $a_l_en, $a_l_jp, $a_r_en, $a_r_jp, $a_l, $a_r,]);
    rewind($fp);
}

flock($fp, LOCK_SH);
while ($row = fgetcsv($fp)) {
    $rows[] = $row;
}
flock($fp, LOCK_UN);
fclose($fp);

?>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="http://ichoose.pe.hu/styles.css" />
<link rel="stylesheet" type="text/css" href="http://ichoose.pe.hu/10q/10q.css" />
<link rel="stylesheet" type="text/css" href="/10q/print.css" />
<title>10 Questions | by ︎イトウヒロキ</title>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
</head>
<body>
<a href="http://ichoose.pe.hu/" target="_parent"><h1 id="headline">ichoose.pe.hu</h1></a>

<div id="main">
<div id="ichoose">
<h3><u>This question was created by</u></h3>
これは、 <b>Hiroki Ito</b>
<p>が考えた 質問 です。</p>
</div>

<div id="10q">
<?php if (!empty($rows)): ?>
<?php foreach ($rows as $row): ?>
<div class="question">
<hr>
<h2><?=h($row[0])?></h2>
<p><?=h($row[1])?></p>
<div id="answer">
<span class="left">
<p><u><?=h($row[2])?></u></p>
<p><?=h($row[3])?></p>
</span>
<span class="or"><p><i>or</i></p></span>
<span class="right">
<p><u><?=h($row[4])?></u></p>
<p><?=h($row[5])?></p>
</span>
</div>
</div>
<?php endforeach; ?>
<?php else: ?>
<?php endif; ?>
</div>
<h3 class="more"><i><a onclick="window.location.reload();">Next Question</a></i></h3>
<h3 class="collection">We create a collection of <i><u><a href="http://ichoose.pe.hu/10q/" target="_parent">10 Questions</a></u></i></h3>
</div>

<div id="credit">
<div id="who">
<p class="name">
<br>︎イトウヒロキ<br>Hiroki Ito</p>
<div class="message">
<h2>Hi ☀︎ , I'm Ito Hiroki from Okayama born in 1996</h2>
こんにちはです☀︎イトウ ヒロキです。
1996年生まれの岡山県出身です。
</div>
<p class="link">
<a href="https://www.twitter.com/kirohitooo/" target="_blank">Twitter</a>
<a href="https://www.instagram.com/takapop_1996/" target="_blank">Instagram</a>
</p>
<h3 class="letsplay"><i><a href="index.html" target="_parent">View All the 10Q</a></i></h3>
</div>

<div id="back">
<h1>by creative, community space <b><a href="http://vg.pe.hu/jp/" target="_blank">∧°┐</a></b></h1>
</div>
</div>
<script type="text/javascript" src="http://www.google.com/jsapi"></script>
<script type="text/javascript" src="http://ichoose.pe.hu/js/10q.js"></script>
<script type="text/javascript" src="http://ichoose.pe.hu/js/main.js"></script>
<script type="text/javascript" src="http://ichoose.pe.hu/js/jquery.arctext.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>
</html>
