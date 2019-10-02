<?php

namespace probyte\omegalog;

use probyte\omegalog\OmegaCore;


/*
 * @author Jorge Perez <jorge.perez@sisma.cl>
 * @copyright 2019
 * @license MIT
 */

class OmegaLog implements LoggerInterface
{
    private $prefix;
    private $folder;

   
    /**
     * __construct
     *
     * @param  mixed $prefix
     * @param  mixed $folder
     *
     * @return void
     */
    function __construct($prefix='omega',$folder='/var/log/omega') 
    {
        $this->prefix = $prefix;
        $this->folder = $folder;
        $this->path = $this->folder.'/'.$this->prefix.'_';
    }

   
    /**
     * error
     *
     * @param  mixed $message
     * @param  mixed $params
     *
     * @return void
     */
    public function error($message=null, array $params = array())
    {   
        
        return OmegaCore::showMessage('error',$message,$params,$this->path);
    
    } 

    /**
     * emergency
     *
     * @param  mixed $message
     * @param  mixed $params
     *
     * @return void
     */
    public function emergency($message, array $params = array())
    {

        return OmegaCore::showMessage('emergency',$message,$params,$this->path);

    }

    /**
     * alert
     *
     * @param  mixed $message
     * @param  mixed $params
     *
     * @return void
     */
    public function alert($message=null, array $params = array())
    {
    
        return OmegaCore::showMessage('alert',$params,$this->path);

    }

    /**
     * critical
     *
     * @param  mixed $message
     * @param  mixed $params
     *
     * @return void
     */
    public function critical($message=null, array $params = array())
    {

        return OmegaCore::showMessage('critical',$message,$params,$this->path);

    }
    
    /**
     * warning
     *
     * @param  mixed $message
     * @param  mixed $params
     *
     * @return void
     */
    public function warning($message=null, array $params = array())
    {

        return OmegaCore::showMessage('warning',$message,$params,$this->path);

    }
    
    /**
     * notice
     *
     * @param  mixed $message
     * @param  mixed $params
     *
     * @return void
     */
    public function notice($message=null, array $params = array())
    {

        return OmegaCore::showMessage('notice',$message,$params,$this->path);

    }

    /**
     * info
     *
     * @param  mixed $message
     * @param  mixed $params
     *
     * @return void
     */
    public function info($message=null, array $params = array())
    {
        return OmegaCore::showMessage('info',$message,$params,$this->path);

    }

    /**
     * debug
     *
     * @param  mixed $message
     * @param  mixed $params
     *
     * @return void
     */
    public function debug($message=null, array $params = array())
    {

        return OmegaCore::showMessage('debug',$message,$params,$this->path);

    }

    /**
     * log
     *
     * @param  mixed $level
     * @param  mixed $message
     * @param  mixed $params
     *
     * @return void
     */
    public function log($level, $message=null, array $params = array())
    {

        return OmegaCore::showMessage($level,$message,$params,$this->path);

    }

}

