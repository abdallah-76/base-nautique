<?php
namespace App\Controllers;
use App\Models\Db_model;
use CodeIgniter\Exceptions\PageNotFoundException;

class Visiteur extends BaseController
{
    protected $model;

    public function __construct()
    {
        helper('form');
        $this->model = model(Db_model::class);
    }

    // Formulaire d'envoi d'une demande
    public function creer()
    {
        if ($this->request->getMethod() == "POST")
        {
            if (! $this->validate(
                [
                    'email' => 'required|valid_email',
                    'sujet' => 'required|max_length[255]',
                    'message' => 'required'
                ],
                [
                    'email' => [
                        'required'   => 'Veuillez entrer votre adresse e-mail.',
                        'valid_email'=> 'Veuillez saisir une adresse e-mail valide.'
                    ],
                    'sujet' => [
                        'required'   => 'Veuillez entrer un sujet.',

                    ],
                    'message' => [
                        'required'   => 'Veuillez entrer un message.',

                    ]
                ]
            )) {
                return view('templates/menu_visiteur')
                    . view('templates/haut', ['titre' => 'Contactez-nous'])
                    . view('visiteur/visiteur_creer')
                    . view('templates/bas');
            }

            // Validation réussie → insertion
          $recup = $this->validator->getValidated();

            $code = $this->model->set_demande1($recup);

            $data['titre'] = "Demande envoyée";
            $data['code']  = $code; // On envoie le code à la vue

            return view('templates/menu_visiteur')
                . view('templates/haut', $data)
                . view('visiteur/visiteur_succes', $data);

        }

        return view('templates/menu_visiteur')
            . view('templates/haut', ['titre' => 'Contactez-nous'])
            . view('visiteur/visiteur_creer');
    }

    // Affichage d'une demande via son code unique
    public function afficher($code = null)
    {
        if ($code == null) {
            return redirect()->to('/');
        }

        $data['titre'] = "Détail de la demande";
        $data['demande'] = $this->model->get_message($code);

        return view('templates/menu_visiteur')
            . view('templates/haut', $data)
            . view('visiteur/visiteur_afficher');
    }
}
