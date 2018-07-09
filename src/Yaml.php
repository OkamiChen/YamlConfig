<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace OkamiChen\YamlConfig;

use Symfony\Component\Yaml\Exception\ParseException;
use Symfony\Component\Yaml\Yaml as Basic;

/**
 * Description of Yaml
 *
 * @author Administrator
 */
class Yaml {

    /**
     * 将配置写入到文件
     * @param string $file
     * @param array $data
     * @param string $env
     */
    static public function save($file, $data, $env = 'local') {

        $content = static::load($file, 'all');
        $content[$env] = $data;
        $yaml = Basic::dump($content, 4);
        if (!is_writable($file)) {
            $message = sprintf('File "%s" cannot be write.', $file);
            throw new ParseException($message);
        }

        return file_put_contents($file, $yaml);
    }
    
    /**
     * 读取配置文件
     * @param string $file
     * @param string $env
     */
    static public function load($file, $env='local'){

        $yaml   = Basic::parseFile($file);
        if($env == 'all'){
            return $yaml;
        }
        return array_get($yaml, $env, []);
    }
    
    /**
     * 新增环境
     * @param string $file 文件
     * @param string $from 源环境
     * @param string $to 新环境
     */
    static public function copy($file, $from, $to){
        
        $config = self::load($file, 'all');
        
        if(isset($config[$from])){
            return self::save($file, $config[$from], $to);
        }
        
        return false;
    }

}
