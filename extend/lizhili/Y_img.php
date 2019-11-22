<?php
namespace lizhili;
/**
 * 用于远程下载图片下载到本地，
 * 下面是使用方法
 * use lizhili\Y_img;   //需要远程下载图片时候在用
 * $y_img=new Y_img();
 * $y_img->downloadImage('http://img.lanrentuku.com/img/allimg/1905/15590128104735.jpg');
 */
class Y_img {

    public function downloadImage($url, $path='images/')
      {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
        $file = curl_exec($ch);
        curl_close($ch);
        $this->saveAsImage($url, $file, $path);
      }
    
      private function saveAsImage($url, $file, $path)
      {
        $filename = pathinfo($url, PATHINFO_BASENAME);
        $resource = fopen($path . $filename, 'a');
        fwrite($resource, $file);
        fclose($resource);
      }
    
}

