<?php
namespace App\Controllers;

use App\Models\Db_model;

class Reservation extends BaseController
{
    protected $model;

    public function __construct()
    {
        helper('form');
        $this->model = model(Db_model::class);
    }

    // V2.1 - Séances réservées (admin + membre)
    public function afficher_reservations_par_date()
    {
        $session = session();

        // visiteur non connecté -> redirection
        if (! $session->has('user')) {
            return redirect()->to('/compte/connecter');
        }

        // On ne laisse passer que Admin ou Membre
        $role = $session->get('role'); // 'A', 'M', 'I', ...
        if ($role != 'A' && $role != 'M') {
            return redirect()->to('/compte/connecter');
        }

        $date = '';
        $reservations = [];

        if ($this->request->getMethod() == 'post') {
            // nom du champ dans le formulaire HTML
            $date = $this->request->getVar('date_reservation');

            if ($date != '') {
                $reservations = $this->model->get_reservations_by_date($date);
            }
        }

        $data = [
            'titre'               => 'Séances réservées',
            'date_selectionnee'   => $date,
            'reservations'        => $reservations,
            'form_action'         => site_url('reservations/par_date'),
        ];

        // on reste dans le template "haut_admin" car c'est l'espace privé
        return view('templates/haut_admin', $data)
             . view('reservation/reservations_par_date', $data)
             . view('templates/bas_admin');
    }
}
