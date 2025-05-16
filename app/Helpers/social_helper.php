<?php

use App\Models\ConfigModel;

if (!function_exists('get_social_links')) {
    function get_social_links()
    {
        
        $model = new ConfigModel();

        if (!$model) {
            return [
                'facebookLink' => '#',
                'twitterLink'  => '#',
                'instagramLink' => '#',
            ];
        }

        $links = $model->getSocialLinks();
        
        return [
            'facebookLink' => $links['facebookLink'] ?? '#',
            'twitterLink'  => $links['twitterLink'] ?? '#',
            'instagramLink' => $links['instagramLink'] ?? '#',
        ];
    }
}