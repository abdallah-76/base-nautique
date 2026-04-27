<?php
namespace App\Controllers;

class Apropos extends BaseController
{
    public function afficher()
    {
        return  view('templates/menu_visiteur')
             . view('templates/haut')
             . view('affichage_apropos')
             . view('templates/bas');
    }
}
