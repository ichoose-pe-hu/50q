<?php

function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

$name = (string)filter_input(INPUT_POST, 'name'); // $_POST['name']
$link = (string)filter_input(INPUT_POST, 'link'); // $_POST['link']
$tag = (string)filter_input(INPUT_POST, 'tag'); // $_POST['tag']

$fp = fopen('10q.csv', 'a+b');
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
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="/styles.css" />
<link rel="stylesheet" type="text/css" href="/10q/list.css" />
<link rel="stylesheet" type="text/css" href="/50q/play.css" />
<link rel="stylesheet" type="text/css" href="http://creative-community.pe.hu/coding/css/popup.css" />
<script type="text/javascript" src="http://www.google.com/jsapi"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript">
$(function(){
$("#top").load("/top.html");
})
</script>
<title>i choose | The Answers are always inside of you</title>
</head>
<body>
<div id="top"></div>
<h2 class="today"><u><a href="/collection/">Create</a></u></h2>

<div id="main">
<div id="ichoose">
<div id="play">
<h3><u>These 50 questions were created by</u></h3>
これは、 <a href="/50q/cc2020/max/">大大大 chotto crazy 2020 MAX</a>
<p>が考えた 50の質問 です。</p>
これは、 <a href="/50q/cc2020/main/">暗室とステージ</a>
<p>が考えた 50の質問 です。</p>
これは、 <a href="/50q/cc2020/beta/">アクティブパーク</a>
<p>が考えた 50の質問 です。</p>
これは、 <a href="/50q/cc2020/pre-event/">こす</a>
<p>が考えた 50の質問 です。</p>
</div>
</div>
<div id="ichoose">
<div id="howto">
<h3>This is the Collection of <br/><i>10 Questions</i>
<br>Created by Chotto Crazy Mate.</h3>
</div>
</div>
<ul class="list">
<?php if (!empty($rows)): ?>
<?php foreach ($rows as $row): ?>
<li class="list_item list_toggle" data-language="<?=h($row[2])?>">
<span><?=h($row[0])?></span>
<a href="<?=h($row[1])?>"></a>
</li>
<?php endforeach; ?>
<?php else: ?>
<li class="list_item list_toggle">
<span>coming soon</span>
<a></a>
</li>
<?php endif; ?>
</ul>
<h1>by <a href="http://chottocrazy.pe.hu/ccm/" target="_parent">Chotto Crazy Mates</a></h1>
</div>
</body>
</html>
