<?php
namespace App\Controllers;
use App\Models\Db_model;
use CodeIgniter\Exceptions\PageNotFoundException;

class Compte extends BaseController
{
    protected $model;

    public function __construct()
    {
        helper('form');
        $this->model = model(Db_model::class);
    }

    public function lister()
    {
        $session = session();
    
        if (! $session->has('user')) {
            return redirect()->to('/compte/connecter');
        }
    
        $data['titre'] = "Liste de tous les comptes";
        $data['logins'] = $this->model->get_all_compte();
    
        // 🔥 ICI tu utilises ta fonction MySQL
        $data['membre'] = $this->model->get_nb_comptes_function();
    
        return view('templates/haut_admin')
             . view('affichage_comptes', $data)
             . view('templates/bas_admin');
    }
    
    
    public function creer()
    {
        if ($this->request->getMethod() == "POST") 
        {
            if (! $this->validate([
                'pseudo' => 'required|max_length[255]|min_length[2]',
                'mdp'    => 'required|max_length[255]|min_length[8]'
            ])) {
                return view('templates/haut', ['titre' => 'Créer un compte'])
                     . view('compte/compte_creer')
                     . view('templates/bas');
            }
    
            $recuperation = $this->validator->getValidated();
    
            // 🔥 Vérification du pseudo déjà pris
            if ($this->model->pseudo_existe($recuperation['pseudo'])) {
                session()->setFlashdata('error', "⚠️ Le pseudo <b>".$recuperation['pseudo']."</b> est déjà utilisé !");
                return redirect()->back()->withInput();
            }
    
            // Sinon on crée le compte
            $this->model->set_compte($recuperation);
    
            session()->setFlashdata(
                'success',
                "Compte <b>".$recuperation['pseudo']."</b> créé avec succès !"
            );
    
            return redirect()->to(site_url('compte/lister'));
        }
    
        return view('templates/haut', ['titre' => 'Créer un compte'])
             . view('compte/compte_creer');
    }
    
    
             public function connecter()
             {
                 $data['titre'] = "Se connecter";
             
                 if ($this->request->getMethod() == "POST")
                 {
                     if (! $this->validate([
                         'pseudo' => 'required',
                         'mdp'    => 'required'
                     ])) {
                         return view('templates/haut', $data)
                              . view('connexion/compte_connecter')
                              . view('templates/bas');
                     }
             
                     $username = $this->request->getVar('pseudo');
                     $password = $this->request->getVar('mdp');
             
                     $compte = $this->model->connect_compte($username, $password);

if ($compte) 
{
    $session = session();
    $session->set('user', $compte->cpt_pseudo);
    $session->set('role', $compte->cpt_role);

             
                         // Redirection selon le rôle
                         if ($compte->cpt_role == 'A') {
                            return redirect()->to('/admin/afficher');
                        } elseif ($compte->cpt_role == 'M') {
                            return redirect()->to('/admin/afficher');
                        } elseif ($compte->cpt_role == 'I') {
                            return redirect()->to('/compte/accueil_invite');
                        }
                        
                     }
             
                     session()->setFlashdata('error', 'Identifiants erronés ou inexistants !');
                     return view('templates/haut', $data)
                          . view('connexion/compte_connecter')
                          . view('templates/bas');
                 }
             
                 return view('templates/haut', $data)
                      . view('templates/menu_visiteur', $data)
                      . view('connexion/compte_connecter');
             }
             


    public function afficher_profil()
    {
        $session = session();
    
        if (! $session->has('user')) {
            return redirect()->to('/compte/connecter');
        }
    
        $pseudo = $session->get('user');
    
        $data['titre'] = "Mon profil";
        $data['profil'] = $this->model->get_profil($pseudo);
    
        return view('templates/haut_admin', $data)
            . view('connexion/compte_profil', $data)
            . view('templates/bas_admin');
    }
    
    public function activer($id)
    {
        $this->model->activer_compte($id);
        return redirect()->to('/compte/lister');
    }
    
    public function desactiver($id)
    {
        $this->model->desactiver_compte($id);
        return redirect()->to('/compte/lister');
    }
    
    public function supprimer($id)
    {
        $this->model->supprimer_compte($id);
        return redirect()->to('/compte/lister');
    }
    public function deconnecter()
{
    session()->destroy();
    return redirect()->to('/compte/connecter');
}

public function liste_adherents()
{
    $session = session();

    if (! $session->has('user') || $session->get('role') != 'M') {
        return redirect()->to('/compte/connecter');
    }

    $pseudo = $session->get('user');

    $data['titre'] = "Liste adhérents";
    $data['adherents'] = $this->model->get_all_adherents($pseudo);

    return view('templates/haut_admin', $data)
        . view('membre/liste_adherents', $data)
        . view('templates/bas_admin');
}
// ===== V2.1 - Séances réservées (MEMBRE) =====
public function seances()
{
    $session = session();
    if (! $session->has('user')) {
        return redirect()->to('/compte/connecter');
    }

    $pseudo = $session->get('user');
    $profil = $this->model->get_profil($pseudo);

    // Sécurité : MEMBRE uniquement
    if ($profil->pfl_role != 'M') {
        return redirect()->to('/compte/connecter');
    }

    $date = $this->request->getVar('date');   // GET ou POST
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
         . view('admin/seances', $data)  // on réutilise la même vue
         . view('templates/bas_admin');
}
public function accueil_invite()
{
    $session = session();

    // Sécurité : vérifier que c'est un invité connecté
    if (! $session->has('user') || $session->get('role') != 'I') {
        return redirect()->to('/compte/connecter');
    }

    $pseudo = $session->get('user');

    // 🔥 Récupérer réellement les réservations de cet invité
    $reservations = $this->model->get_reservations_invite($pseudo);

    $data = [
        'titre' => 'Espace invité',
        'reservations' => $reservations
    ];

    return view('templates/haut_admin', $data)
         . view('compte/accueil_invite', $data)
         . view('templates/bas_admin');
}


}
