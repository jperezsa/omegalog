<?php

namespace omega\omegalog;

use omega\omegalog\OmegaCore;


/**
 * OmegaLog guarda logs de tus proyectos en php, en archivos de texto.
 * Puede recibir un prefijo personalizado y un directorio personalizado.
 * Los archivos se guardan con el nombre del archivo donde se utilice OmegaLog y La fecha en formato Ymd.
 * 
 * Ideal para imprimir texto plano, variables, arreglos u objetos en PHP.
 * 
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
    public function alert($message, array $params = array())
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
    public function critical($message, array $params = array())
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
    public function warning($message, array $params = array())
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
    public function notice($message, array $params = array())
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
    public function info($message, array $params = array())
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
    public function debug($message, array $params = array())
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
    public function log($level, $message, array $params = array())
    {

        return OmegaCore::showMessage($level,$message,$params,$this->path);

    }

}

