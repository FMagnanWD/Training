<?php

namespace App\Repository;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class MediaRepository {

    /**
     * Retoune toutes les Media de la table avec leur categorie
     * @return mixed
     */
    public function getMediaList()
    {
        return DB::table('media')->pluck('name', 'id')->join('categories_media');
    }

  
}