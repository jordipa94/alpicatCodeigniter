<?php

use App\Models\ConfigModel;

if (!function_exists('get_social_links')) {
    function get_social_links()
    {
        
        // Utilizando el servicio de modelo para cargar ConfigModel
        $model = new ConfigModel();

        // Verificar que el modelo se ha cargado correctamente
        if (!$model) {
            return [
                'facebookLink' => '#',
                'twitterLink'  => '#',
                'instagramLink' => '#',
            ];
        }

        // Obtener los enlaces desde la base de datos
        $links = $model->getSocialLinks();

        // Verificar que se han obtenido los enlaces correctamente
        return [
            'facebookLink' => $links['facebookLink'] ?? '#',
            'twitterLink'  => $links['twitterLink'] ?? '#',
            'instagramLink' => $links['instagramLink'] ?? '#',
        ];
    }
}