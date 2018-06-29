<?php

if(!function_exists('yml_read')){
    
    /**
     * 读取yaml配置
     * @param string $file
     * @param string $env
     */
    function yml_read($file, $env=null){
        if(!$env){
            $env    = env("APP_ENV");
        }
        $yaml   = \Symfony\Component\Yaml\Yaml::parseFile($file);
        if($env == 'all'){
            return $yaml;
        }
        return array_get($yaml, $env, []);
    }
}

if(!function_exists('yml_write')){
    
    /**
     * 读取yaml配置
     * @param string $file
     * @param array $data
     * @param string $env
     */    
    function yml_write($file, $data, $env=null){
        
        if(!$env){
            $env    = env("APP_ENV");
        }
        
        $content    = yml_read($file, 'all');
        $content[$env] = $data;
        $yaml = \Symfony\Component\Yaml\Yaml::dump($content, 4);
        if(!is_writable($file)){
            $message    = sprintf('File "%s" cannot be write.', $file);
            throw new \Symfony\Component\Yaml\Exception\ParseException($message);
        }
        
        return file_put_contents($file, $yaml);
    }
}

