<?php
//加载视图
function view($file, $data = [])
{
    // 压缩数组
    extract($data);
    include(ROOT . 'view/'.$file.'.html');
} 

function redirect($url)
{
    header('Location:'.$url);
    exit;
}