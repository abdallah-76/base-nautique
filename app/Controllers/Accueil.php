<?php
namespace App\Controllers;
use App\Models\Db_model;

class Accueil extends BaseController
{
    public function afficher($donnee = null)
    {
        $model = model(Db_model::class);

        $data['actualites'] = $model->actualite();

        $data['parametre_url'] = $donnee;

        return view('templates/menu_visiteur')
            . view('templates/haut', $data)
            . view('affichage_accueil')
            . view('templates/bas');
    }
}
