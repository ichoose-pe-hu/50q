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
<html lang="ja">
<head>
<title>50 Questions | The Answers are always inside of you</title>

<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="50の質問のコレクションを作成しています。さまざまな人が考えた50の質問をお楽しみください。">

<link rel="stylesheet" type="text/css" href="../10q/list.css" />
<link rel="stylesheet" type="text/css" href="../10q/styles.css" />

<style>
#today {
  position:fixed;
  z-index:10;
  top:0; left:0;
  width:100%;
  height:100vh;
  display:none;
}
#inside {
  top: 50%;
  left: 50%;
  z-index:25;
  z-index:100;
  height: 75vh;
  width: 75%;
  position:absolute;
  margin:0; padding:0;
  -webkit-transform:translate(-50%,-50%);
  transform:translate(-50%,-50%);
}
</style>

</head>
<body>
<div id="top"></div>
<h2 class="today"><u><a onclick="obj=document.getElementById('today').style; obj.display=(obj.display=='block')?'none':'block';">Tips</a></u></h2>

<div id="main">
<div id="ichoose">
<h1><i>Play</i></h1>
<div id="howto">
<h3>We create a collection of</h3>
<h3><i>50 Questions</i></h3>
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
<h1>by creative, community space <a class="pehu" href="https://creative-community.space/pehu/">∧°┐</a></h1>
</div>
</div>

<div id="today">
<div id="inside">
<iframe src="tips.html" frameborder="0">読み込んでいます…</iframe>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript">
  $(function(){
  $("#top").load("../10q/howto.html");
  })
</script>
</body>
</html>
