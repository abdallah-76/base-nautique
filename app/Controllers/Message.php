<?php
namespace App\Controllers;

class Message extends BaseController
{
    public function verifier()
    {
        helper('form');

        $data['titre'] = "Suivre ma demande";

        if ($this->request->getMethod() == "POST")
        {
            if (! $this->validate(
                [
                    'code_secret' => 'required|min_length[20]'
                ],
                [
                    'code_secret' => [
                        'required'   => 'Veuillez entrer votre code secret.',
                        'min_length' => 'Veuillez saisir un code de 20 caractères.'
                    ]
                ]
            )) {
                return view('templates/haut', $data)
                     . view('templates/menu_visiteur')
                     . view('message_formulaire');
            }

            $code = $this->request->getPost('code_secret');

            return redirect()->to('/demande/afficher/'.$code);
        }

        return view('templates/haut', $data)
             . view('templates/menu_visiteur')
             . view('message_formulaire');
    }
    
}
