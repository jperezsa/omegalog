<?php
namespace probyte\omegalog;

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

        if(is_array($message) or \is_object($message)){
            $params = array($message);
            $message = '';
        }

        return error_log("[".self::datetimeFormat()."][".self::getIpClient()."][$level] {$message}\n".self::showArray($params),3,self::fileNameForLog($path));
        
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
        $param = '';
   
        foreach ($array as $value) {
            $type = gettype($value);
            switch ($type) {
                case 'string':
                    $param .= $value ."\n";
                    break;
                case 'object':
                    $param .= print_r($value,TRUE);
                    break;
                case 'array':
                    $param .= print_r($value,TRUE);
                    break;
                default:
                    $param .= print_r($value,TRUE);
                break;
            }

        }

        if(empty($param)){
            
            return null;
        }

        return $param;

    }


    /**
     * showObject
     *
     * @param  mixed $object
     *
     * @return void
     */
    public function showObject($object)
    {
        if(empty($object)){
            return null;
        }else{
            if(\is_object($object)){

                return print_r($object,true);
            }
        }

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