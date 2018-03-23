<?php

namespace common\components;


use common\models\Instances;
use Symfony\Component\Translation\Dumper\PhpFileDumper;
use yii\web\BadRequestHttpException;
use yii\web\NotFoundHttpException;

class Main
{
    public static function detect_links($text){
//        $dom = new \DOMDocument();
//        $dom->loadHTML($text);
//        $xPath = new \DOMXPath($dom);
//        $texts = $xPath->query(
//            '/html/body//text()[
//        not(ancestor::a) and (
//        contains(.,"http://") or
//        contains(.,"https://") or
//        contains(.,"ftp://") )]'
//        );
//        foreach ($texts as $text) {
//            $fragment = $dom->createDocumentFragment();
//            $fragment->appendXML(
//                preg_replace(
//                    "~((?:http|https|ftp)://(?:\S*?\.\S*?))(?=\s|\;|\)|\]|\[|\{|\}|,|\"|'|:|\<|$|\.\s)~ui",
//                    '<a href="$1">$1</a>',
//                    $text->data
//                )
//            );
//            $text->parentNode->replaceChild($fragment, $text);
//        }
//        return utf8_decode($dom->saveXML($dom->documentElement));
//        $m = "~((?:http|https|ftp)://(?:\S*?\.\S*?))(?=\s|\;|\)|\]|\[|\{|\}|,|\"|'|:|\<|$|\.\s)~ui";
//        $r = '$1 <a href="$2">$2</a>';
//        return  preg_replace($m,$r,$text);
        return $text;

    }
    public static function checkSubdomain($event){
        
        return true;
        $domainArr = explode('.',$_SERVER['HTTP_HOST']);
        $subdomain = ((!empty($domainArr[0]) && ($domainArr[0] != 'clientpad') && count($domainArr) == 3) ? $domainArr[0] : false);
        if(!empty($subdomain)){
            $connect = \Yii::$app->clientpad_db;
            $sql = "SELECT * FROM instances WHERE subdomain = ".$connect->quoteValue($subdomain);
            $instance = $connect->createCommand($sql)->queryAll();
            if(!empty($instance)){
                if(!$instance[0]['status']) {
                    if($event->action->id != 'error'){
                        throw new BadRequestHttpException("This subdomain is not active. Please write a letter to info@clientpad.ru");
                    }
                }
            } else {
                \Yii::$app->controller->layout = false;
                if($event->action->id != 'error'){
                    throw new NotFoundHttpException("Requested subdomen does not exist");
                }

            }
            return $subdomain;
        }  else {
            \Yii::$app->controller->layout = false;
            if($event->action->id != 'error'){
                throw new NotFoundHttpException("Requested subdomen does not exist");
            }


        }
    }

    //Получаем текущий инстанс
    public static function GetDomain(){
        $domainArr = explode('.',$_SERVER['HTTP_HOST']);
        $subdomain = ((!empty($domainArr[0]) && ($domainArr[0] != 'clientpad') && count($domainArr) == 3) ? $domainArr[0] : false);

        $connect = \Yii::$app->clientpad_db;
        $sql = "SELECT * FROM instances WHERE subdomain = ".$connect->quoteValue($subdomain);
        $instance = $connect->createCommand($sql)->queryAll();
        if(!empty($instance)){
            if(!$instance[0]['status']) {
                if($event->action->id != 'error'){
                    throw new BadRequestHttpException("This subdomain is not active. Please write a letter to info@clientpad.ru");
                }
            }
            return $instance[0];
        } else {
            \Yii::$app->controller->layout = false;
            if($event->action->id != 'error'){
                throw new NotFoundHttpException("Requested subdomen does not exist");
            }

        }
    }
}
