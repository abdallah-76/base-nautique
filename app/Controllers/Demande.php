<?php
namespace App\Controllers;
use App\Models\Db_model;

class Demande extends BaseController
{
    public function afficher($code = null)
    {
        $model = model(Db_model::class);

        if ($code == null) {
            return redirect()->to('/');
        }

        $data['message'] = $model->get_message($code);
        $data['titre']   = "Demande du visiteur";

        return view('templates/haut', $data)
             . view('templates/menu_visiteur')
             . view('affichage_demande')
             . view('templates/bas');
    }
}
