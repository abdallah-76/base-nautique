<?php
namespace App\Controllers;
use App\Models\Db_model;

class Admin extends BaseController
{
    protected $model;

    public function __construct()
    {
        helper('form');              // ✅ pour form_open(), etc.
        $this->model = model(Db_model::class);
    }

    // ===== Accueil (admin OU membre) =====
    public function afficher()
    {
        $session = session();
        if (! $session->has('user')) 
            return redirect()->to('/compte/connecter');
    
        $pseudo = $session->get('user');
        $role   = $session->get('role'); // 'A' ou 'M'
    
        // 1) On récupère les réservations "simples"
        $res = $this->model->get_reservations($pseudo);
    
        // 2) Pour chaque réservation, on ajoute la liste des participants
        foreach ($res as &$r) {
            $r['participants'] = $this->model->get_participants($r['rsv_id']);
        }
    
        // 3) On envoie le tableau enrichi à la vue
        $data['reservations'] = $res;
    
        // Profil pour l'affichage
        $data['profil'] = $this->model->get_profil($pseudo);
    
        if ($role == 'A') {
            return view('templates/haut_admin')
                 . view('connexion/affichage_admin', $data)
                 . view('templates/bas_admin');
        }
    
        if ($role == 'M') {
            return view('templates/haut_admin')
                 . view('connexion/affichage_membre', $data)
                 . view('templates/bas_admin');
        }
    
        return redirect()->to('/compte/connecter');
    }
    

    // ===== Demandes visiteurs (ADMIN seulement) =====
    public function demandes()
    {
        $session = session();
        if (! $session->has('user') || $session->get('role') != 'A') {
            return redirect()->to('/compte/connecter');
        }

        $data['demandes'] = $this->model->get_all_demandes();

        return view('templates/haut_admin')
             . view('admin/demandes', $data)
             . view('templates/bas_admin');
    }

    // ===== Répondre message (ADMIN seulement) =====
    public function repondre_message($id)
    {
        $session = session();
        if (! $session->has('user') || $session->get('role') != 'A') {
            return redirect()->to('/compte/connecter');
        }

        $data['demande'] = $this->model->get_demande($id);

        if ($this->request->getMethod() == "POST") {
            $reponse = $this->request->getVar('reponse');

            $pseudo = $session->get('user');
            $compte = $this->model->get_profil($pseudo);
            $cpt_id = $compte->cpt_id;

            $this->model->enregistrer_reponse($id, $reponse, $cpt_id);

            return redirect()->to('/admin/demandes');
        }

        return view('templates/haut_admin')
             . view('admin/repondre_message', $data)
             . view('templates/bas_admin');
    }

    // ===== Réservations (visible pour tous connectés) =====
public function reservations()
{
    $session = session();
    if (! $session->has('user')) 
        return redirect()->to('/compte/connecter');

    $pseudo = $session->get('user');

    $data['titre'] = "Mes réservations";

    $res = $this->model->get_reservations($pseudo);
    foreach ($res as &$r) {
        $r['participants'] = $this->model->get_participants($r['rsv_id']);
    }
    $data['reservations'] = $res;

    $data['profil'] = $this->model->get_profil($pseudo);

    return view('templates/haut_admin')
         . view('admin/reservations', $data)
         . view('templates/bas_admin');
}


public function ressources()
{
    $session = session();
    if (! $session->has('user')) 
        return redirect()->to('/compte/connecter');

    // accès réservé aux admins
    if ($session->get('role') != 'A')
        return redirect()->to('/compte/connecter');

    $data['titre'] = "Gestion des ressources";
    $data['ressources'] = $this->model->get_all_ressources();

    return view('templates/haut_admin', $data)
         . view('admin/ressources_lister', $data)
         . view('templates/bas_admin');
}
public function ajouter_ressource()
{
    $session = session();
    if (! $session->has('user')) 
        return redirect()->to('/compte/connecter');

    if ($session->get('role') != 'A')
        return redirect()->to('/compte/connecter');

    $data['titre'] = "Ajouter une ressource";

    // Si on arrive en POST -> on traite le formulaire
    if ($this->request->getMethod() == "POST")
    {
        if (! $this->validate(
            [
                'nom'            => 'required|max_length[255]|min_length[2]',
                'jaugemin'       => 'required|integer',
                'jaugemax'       => 'required|integer',
                'descriptif'     => 'required',
                'liste_materiel' => 'required',
            ],
            [
                'nom' => [
                    'required'   => 'Veuillez entrer un nom pour la ressource !',
                    'min_length' => 'Le nom doit contenir au moins 2 caractères.'
                ],
                'jaugemin' => [
                    'required'   => 'Veuillez saisir la jauge minimale !',
                ],
                'jaugemax' => [
                    'required'   => 'Veuillez saisir la jauge maximale !',
                ],
                'descriptif' => [
                    'required'   => 'Veuillez saisir un descriptif !',
                ],
                'liste_materiel' => [
                    'required'   => 'Veuillez saisir la liste du matériel !',
                ],
            ]
        )) {
            // Erreurs de validation -> on réaffiche le formulaire avec messages
            return view('templates/haut_admin', $data)
                 . view('admin/ressource_creer', $data)
                 . view('templates/bas_admin');
        }

        // Validation OK -> insertion
        $recup = $this->validator->getValidated();
        $this->model->set_ressource($recup);

        $session->setFlashdata('success', "Ressource « ".$recup['nom']." » ajoutée !");
        return redirect()->to(site_url('admin/ressources'));
    }

    // Première arrivée (GET) -> juste afficher le formulaire
    return view('templates/haut_admin', $data)
         . view('admin/ressource_creer', $data)
         . view('templates/bas_admin');
}



public function supprimer_ressource($id)
{
    $session = session();
    if (! $session->has('user')) 
        return redirect()->to('/compte/connecter');

    if ($session->get('role') != 'A')
        return redirect()->to('/compte/connecter');

    $this->model->supprimer_ressource($id);

    return redirect()->to('/admin/ressources');
}

// ===== V2.1 - Séances réservées (ADMIN) =====
public function seances()
{
    $session = session();
    if (! $session->has('user')) {
        return redirect()->to('/compte/connecter');
    }

    $pseudo = $session->get('user');
    $profil = $this->model->get_profil($pseudo);

    // Sécurité : ADMIN uniquement
    if ($profil->pfl_role != 'A') {
        return redirect()->to('/compte/connecter');
    }

    // On récupère la date, qu'elle vienne d'un GET ou d'un POST
    $date = $this->request->getVar('date');   // <= IMPORTANT
    $reservations_jour = [];

    if (! empty($date)) {
        $reservations_jour = $this->model->get_reservations_by_date($date);
    }

    $data = [
        'titre'             => 'Séances réservées',
        'date'              => $date,
        'reservations_jour' => $reservations_jour,
    ];

    return view('templates/haut_admin', $data)
         . view('admin/seances', $data)
         . view('templates/bas_admin');
}


}
