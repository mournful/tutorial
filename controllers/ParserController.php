<?php

namespace app\controllers;

use yii\web\Controller;

class ParserController extends Controller
{
    public function actionIndex()
    {
        $html = file_get_contents('http://tutorial.loc/db_tutorial/cars');
        $doc = new \DOMDocument();
        $res = @$doc->loadHTML($html);
        $paramNameArr = array();
        $resultArr = array();
        $row = array();
        if ($res) {
            $trTags = $doc->getElementsByTagName('tr');
            foreach($trTags as $trTag) {
                $paramCounter = 0;
                foreach ($trTag->childNodes as $tag) {
                    if ($tag->nodeName == 'th') {
                        $paramNameArr[] = $tag->nodeValue;
                    }
                }
                foreach ($trTag->childNodes as $tag) {
                    if ($tag->nodeName == 'td'){
                        $row[$paramNameArr[$paramCounter]] = $tag->nodeValue;
                    }
                    $paramCounter++;
                }
                if(!empty($row)) {
                    $resultArr[] = $row;
                }
            }
            var_dump($resultArr);
        }
    }
}