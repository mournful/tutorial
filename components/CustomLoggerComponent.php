<?php

namespace app\components;

use yii\base\Component;

class CustomLoggerComponent extends Component
{
    public function add(Array $param = array())
    {
        $logFile = $_SERVER['DOCUMENT_ROOT'] . '/log.txt';

        $logString = '-= ';
        $logString .= 'Параметры{';
        foreach($param as $name => $value) {
            $logString .= $name;
            $logString .= ': ';
            $logString .= $value;
            $logString .= ' || ';
        }

        $logString .= 'Дата и время: ';
        $logString .= date(DATE_RSS);
        $logString .= '} =-';
        $logString .= PHP_EOL;
        file_put_contents($logFile, $logString, FILE_APPEND);
    }
}