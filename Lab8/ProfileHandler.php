<?php

namespace App;

use App\FileUtility;
use App\Outputs\DisplayFactory;

class ProfileHandler
{
    public static function display($request)
    {
        
        $json_file = $_ENV['PROFILE_JSON_FILE'];

        $params = $request->params();
       
        $format = 'text';
        if (isset($params['format'])) {
            $format = $params['format'];
        }

       
        $data = FileUtility::openJson($json_file);

        
        $profile = new Profile($data);

        
        $output = DisplayFactory::getInstance($format);
        $output->setData($profile);
        return $output->render();
    }
}
