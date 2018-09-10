<?php
$file = $_FILES['files'];
//formData传过来的参数param1和param2
$param1 = $_POST['param1'];
$param2 = $_POST['param2'];
//ajax返回数组
$data = array('sta'=>TRUE,'msg'=>'上传成功！');
//检查是否为图片
$ext = getExt($file['name']);
$arrExt = array('3gp','rmvb','flv','wmv','avi','mkv','mp4','mp3','wav');
if(!in_array($ext,$arrExt)) {
    $data['sta'] = FALSE;
    $data['msg'] = '不支持此类型文件的上传！';
}
//设置预览目录
$previewPath = 'upload/preview/';
creatDir($previewPath);
    
if($file['error'] == 0) {   
    if(isset($param1) && isset($param2)) {
        //需要用到$param1和$param2的一些其他操作...
        
        //文件上传到预览目录
        $previewName = 'pre_'.md5(mt_rand(1000,9999)).time().'.'.$ext;
        $previewSrc = $previewPath.$previewName;
        if(!move_uploaded_file($file['tmp_name'],$previewSrc)) {
            $data['sta'] = FALSE;
            $data['msg'] = '上传失败！';
        } else {
            $data['previewSrc'] = $previewSrc;
        }
        
    } 
} 
echo json_encode($data);
//获取文件扩展名
function getExt($filename) {
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    return $ext;
}
//创建目录并赋权限
function creatDir($path) {
    $arr = explode('/',$path);
    $dirAll = '';
    $result = FALSE;
    if(count($arr) > 0) {
        foreach($arr as $key=>$value) {
            $tmp = trim($value);
            if($tmp != '') {
                $dirAll .= $tmp.'/';
                if(!file_exists($dirAll)) {
                    mkdir($dirAll,0777,true);                   
                }
            }
        }
    }
}
