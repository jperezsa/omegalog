<?php
namespace omega\omegalog;

use \DateTimeZone;
use \Datetime;

class OmegaCore {

    

    /**
     * showMessage
     *
     * @param  mixed $level
     * @param  mixed $message
     * @param  mixed $params
     * @param  mixed $path
     *
     * @return void
     */
    public function showMessage($level,$message,$params,$path)
    {
        
        return error_log("[".self::datetimeFormat()."] [".self::getIpClient()."] [$level] - {$message}\n".self::showArray($params),3,self::fileNameForLog($path));

    }

    /**
     * showArray
     *
     * @param  mixed $array
     *
     * @return void
     */
    public function showArray(Array $array)
    {

        return print_r($array,true);

    }

    /**
     * getDatetimeWithTimezone
     *
     * @return void
     */
    public function getDatetimeWithTimezone()
    {
       return new DateTime(strtotime(time()), new DateTimeZone(date_default_timezone_get()));
    }


    /**
     * datetimeFormat
     *
     * @param  mixed $microtime
     *
     * @return void
     */
    public function datetimeFormat(bool $microtime=true)
    {
    
        if($microtime){

            return self::getDatetimeWithTimezone()->format('Y-m-d H:i:s.u');

        }else{

            return self::getDatetimeWithTimezone()->format('Y-m-d H:i:s');
        
        }
    }

    /**
     * dateFormatFile
     *
     * @return void
     */
    public function dateFormatFile(){

        return self::getDatetimeWithTimezone()->format('Ymd');

    }

    /**
     * fileNameForLog
     *
     * @param  mixed $path
     *
     * @return void
     */
    public function fileNameForLog($path)
    {   
        
        $filename = explode('/',$_SERVER['SCRIPT_NAME']);
        $filename = array_pop($filename);
        
        return $path.$filename."_".self::dateFormatFile().".log";
    }

    /**
     * getIpClient
     *
     * @return void
     */
    public function getIpClient()
    {
        return $_SERVER['REMOTE_ADDR'];
    }
}