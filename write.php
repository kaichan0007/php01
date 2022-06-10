<?php

require_once 'C:/xampp/vendor/autoload.php';

use PHPHtmlParser\Dom;
use PHPHtmlParser\Options;

// 文字コードを設定する。
// 日本語だと文字コードの自動解析がうまく動かないようなので、
// ページに合わせて設定する必要があります
$options = new Options();
$options->setEnforceEncoding('utf8');

// 文字化けする場合は Shift JIS を試してみてください
// $options->setEnforceEncoding('sjis');

// ページを解析
$url = 'https://www.release.tdnet.info/inbs/I_list_001_'.$_POST["date"].'.html';
$dom = new Dom();
$dom->loadFromUrl($url, $options);

$c_code = $_POST["company_code"];

// 商品名を取得
$aaa = $dom->find('td');
// $even_name = $dom->find('.evennew-M kjName');
// $odd_name = $dom->find('.oddnew-M kjName');

// $even_title = $dom->find('.evennew-M kjTitle');
// $odd_title = $dom->find('.oddnew-M kjTitle');

// echo $even_name[0];

//File書き込み
$file = fopen("data/data.csv","a");	// ファイル読み込み

for($i=0; $i<count($aaa); $i++)
{
    //echo $aaa[$i]."\n";
    if(strcmp($aaa[$i]->text,$c_code)==0){
        //echo "見つけました！";
        //echo $aaa[$i+1];
        //echo $aaa[$i+2];
        //echo $aaa[$i+2]->firstChild()->getAttribute("href");

        $str = $aaa[$i+1]->text.",".$aaa[$i+2]->firstChild()->text.",".$aaa[$i+2]->firstChild()->getAttribute("href")."\n";

        fwrite($file, mb_convert_encoding($str, 'SJIS-win', 'UTF-8'));
    }
}

fclose($file);
?>

<?php
ini_set('display_errors', 'On'); // エラーを表示させるようにしてください
error_reporting(E_ALL); // 全てのレベルのエラーを表示してください
?>


<html>
<head>
<meta charset="utf-8">
<title>File書き込み</title>
</head>
<body>

<h1>書き込みしました。</h1>

<ul>
<li><a href="input.php">戻る</a></li>
</ul>
</body>
</html>