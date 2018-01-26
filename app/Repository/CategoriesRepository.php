<?php

namespace App\Repository;

use Illuminate\Support\Facades\DB;

class CategoriesRepository {

    /**
     * Retoune toutes les catégories de la table categories
     * @return mixed
     */
    public function getCategoriesList()
    {
        return DB::table('categories')->pluck('name', 'id');
    }
}