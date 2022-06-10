<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <table border='1'>
    <tr><th>会社名</th><th>適時開示情報タイトル</th><th>適時開示情報URL</th></tr>
    
    <?php
    
    if( ($fp = fopen("data/data.csv","r"))=== false ){
        die("CSVファイル読み込みエラー");
    }
    
    while (($array = fgetcsv($fp)) !== FALSE) {
        
        //空行を取り除く
        if(!array_diff($array, array(''))){
            continue;
        }
        
        echo "<tr>";
        for($i = 0; $i < count($array); ++$i ){
            $elem = nl2br(mb_convert_encoding($array[$i], 'UTF-8', 'SJIS'));
            $elem = $elem === "" ?  "&nbsp;" : $elem;
            echo("<td>".$elem."</td>");
        }
        echo "</tr>";
        
    }
    
    fclose($fp);
    ?>
    
    </table>
    
</body>
</html>