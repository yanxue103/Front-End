<?php

header("Content-type: text/html; charset=utf-8");

$username = $_POST['username'];
$content = $_POST['content'];

if($username == '' || $content == ''){
//    echo '用户名或评论内容不能为空，<a href="commentBook.php">返回评论区</a>';
    echo json_encode(array('code'=>1,'msg'=>'用户名或评论内容不能为空'));
    //{'code':1,'msg':'用户名或评论内容不能为空'}
}else{
    $comment = array('username'=>$username,'content'=>$content);

    $filePath = 'commentBook.txt';
    $commentList = json_decode(file_get_contents($filePath));

    if(is_array($commentList)){
        array_unshift($commentList,$comment);
    }else{
        $commentList = array($comment);
    }

    // file_put_contents($filePath,json_encode($commentList));
    $commentFile = fopen($filePath,'w');
    fwrite($commentFile,json_encode($commentList));
    fclose($commentFile);

//    echo '评论成功，<a href="commentBook.php">返回评论区</a>';
    echo json_encode(array('code'=>0,'msg'=>'评论成功'));
    //{'code':0,'msg':'评论成功'}

}