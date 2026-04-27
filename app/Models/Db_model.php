<?php
namespace App\Models;
use CodeIgniter\Model;

class Db_model extends Model
{
    protected $db;

    public function __construct()
    {
        $this->db = db_connect();
    }

    /** Liste brute des comptes (profils) */
    public function get_all_compte()
    {
        $resultat = $this->db->query("SELECT * FROM t_compte_cpt;");
        return $resultat->getResultArray();
    }

    /** Création compte invité actif */
public function set_compte($saisie)
{
    // sécuriser le pseudo (affichage, XSS)
    $login = htmlspecialchars($saisie['pseudo']);

    // on laisse le mot de passe tel quel pour le hash (trigger SHA2 en base)
    $mot_de_passe = $saisie['mdp'];

    $sql = "INSERT INTO t_compte_cpt (cpt_pseudo, cpt_mdp, cpt_role, cpt_statut)
            VALUES ('".$login."', '".$mot_de_passe."', 'I', 'A')";
    return $this->db->query($sql);
}

    
    public function get_actualite($numero)
    {
        $requete = "SELECT * FROM t_actualite_act WHERE act_id=" . $numero . ";";
        $resultat = $this->db->query($requete);
        return $resultat->getRow();
    }

    public function get_nb_comptes()
    {
        $resultat = $this->db->query("SELECT COUNT(*) AS nb FROM t_compte_cpt;");
        $row = $resultat->getRowArray();
        return $row['nb'];
    }

    public function actualite()
    {
        $sql = "SELECT act_id, act_titre, act_contenu, act_date_pub,cpt_pseudo 
                FROM t_actualite_act 
                JOIN t_compte_cpt USING (cpt_id)
                WHERE act_etat='A' 
                ORDER BY act_date_pub DESC
                LIMIT 5;";
        $resultat = $this->db->query($sql);
        return $resultat->getResultArray();
    }

    /** Enregistrer demande visiteur */
    public function set_demande1($saisie)
    {
        $email   = htmlspecialchars($saisie['email']);
        $sujet   = htmlspecialchars($saisie['sujet']);
        $message = htmlspecialchars($saisie['message']);

        $lettres = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $chiffres = "0123456789";
        $code = "";

        for ($i = 0; $i < 10; $i++) {
            $code .= $lettres[rand(0, 25)];
            $code .= $chiffres[rand(0, 9)];
        }

        $sql = "INSERT INTO t_message_msg 
        (msg_intitule, msg_contenu, msg_email, msg_code, msg_date)
        VALUES ('".$sujet."', '".$message."', '".$email."', '".$code."', CURDATE())";

        $this->db->query($sql);

        return $code;
    }

    public function get_message($code)
    {
        $code = htmlspecialchars($code);

        $sql = "SELECT msg_id, msg_intitule, msg_contenu, msg_email, msg_reponse, 
                       msg_date, msg_code, cpt_pseudo
                FROM t_message_msg 
                LEFT JOIN t_compte_cpt USING(cpt_id)
                WHERE msg_code = '".$code."'";
        $resultat = $this->db->query($sql);
        return $resultat->getRow();
    }

    /** Connexion */
    public function connect_compte($u, $p)
    {
        $sql = "SELECT cpt_id, cpt_pseudo, cpt_role
                FROM t_compte_cpt
                WHERE cpt_pseudo = '".$u."'
                AND cpt_mdp = SHA2('".$p."', 256)
                AND cpt_statut = 'A'
                LIMIT 1;";
    
        $resultat = $this->db->query($sql);
        return $resultat->getRow();   //  Retourne l'objet et non un booléen
    }
    

    /** Profil administrateur */
    public function get_profil($pseudo)
    {
        $sql = "SELECT * 
                FROM t_profil_pfl 
                JOIN t_compte_cpt USING(cpt_id)
                WHERE cpt_pseudo = '".$pseudo."';";

        $resultat = $this->db->query($sql);
        return $resultat->getRow();
    }

    /** Réservations du compte */
    public function get_reservations($pseudo)
    {
        $sql = "SELECT cpt_id FROM t_compte_cpt WHERE cpt_pseudo = '".$pseudo."';";
        $row = $this->db->query($sql)->getRow();

        if (!$row) return [];

        $cpt_id = $row->cpt_id;

        $sql2 = "SELECT rsv_id,rsv_nom, rsv_date, rsv_heure, rsv_lieu
                 FROM t_reservation_rsv
                 JOIN  t_participe_prt USING (rsv_id)
                 WHERE cpt_id = ".$cpt_id."
                 AND rsv_date >= CURDATE()
                 ORDER BY rsv_date, rsv_heure;";

        return $this->db->query($sql2)->getResultArray();
    }
/** Participants d'une réservation */
public function get_participants($rsv_id)
{
    $sql = "SELECT pfl_nom, pfl_prenom
            FROM t_participe_prt
            JOIN t_profil_pfl USING(cpt_id)
            WHERE rsv_id = ".$rsv_id.";";

    return $this->db->query($sql)->getResultArray();
}
public function changerStatutCompte($id, $statut)
{
    $id = (int) $id;  // juste pour éviter une erreur SQL

    return $this->db->query("CALL changer_statut_compte($id, '$statut')");
}


public function activer_compte($id)
{
    return $this->changerStatutCompte($id, 'A');
}

public function desactiver_compte($id)
{
    return $this->changerStatutCompte($id, 'D');
}

public function supprimer_compte($id)
{
    $sql = "DELETE FROM t_compte_cpt 
            WHERE cpt_id = ".$id.";";
    return $this->db->query($sql);
}
public function get_all_demandes()
{
    $sql = "SELECT * FROM t_message_msg ORDER BY msg_date DESC;";
    return $this->db->query($sql)->getResultArray();
}

public function get_demande($id)
{
    $sql = "SELECT * FROM t_message_msg WHERE msg_id=".$id.";";
    return $this->db->query($sql)->getRow();
}

public function enregistrer_reponse($id, $reponse, $cpt_id)
{
        $reponse = htmlspecialchars($reponse);

    $sql = "UPDATE t_message_msg 
            SET msg_reponse='".$reponse."', cpt_id=".$cpt_id." 
            WHERE msg_id=".$id.";";
    return $this->db->query($sql);
}
// ===== V1.2 : rôle lu dans pfl_role =====
public function get_role($pseudo)
{
    
    $sql = "SELECT pfl_role
            FROM t_profil_pfl
            JOIN t_compte_cpt USING(cpt_id)
            WHERE cpt_pseudo = '".$pseudo."';";

    $row = $this->db->query($sql)->getRow();
    return $row ? $row->pfl_role : null;
}

// ===== V1.2 : liste adhérents (membres) sauf le connecté =====
public function get_all_adherents()
{
    $sql = "SELECT * FROM v_adherents_membre;";
    return $this->db->query($sql)->getResultArray();
}



// ===== V2.0 =====

    /** Toutes les ressources réservables */
    public function get_all_ressources()
    {
        $sql = "SELECT rsc_id, rsc_nom, rsc_image, 
                       rsc_jaugemin, rsc_descriptif, 
                       rsc_liste_materiel, rsc_jaugemax
                FROM t_ressource_rsc
                ORDER BY rsc_nom;";
        $resultat = $this->db->query($sql);
        return $resultat->getResultArray();
    }
    

    /** Insertion d’une nouvelle ressource */
    public function set_ressource($saisie)
{
    $nom            = htmlspecialchars($saisie['nom']); 
    $jauge_min      = $saisie['jaugemin'];
    $jauge_max      = $saisie['jaugemax'];
    if ($jauge_max<$jauge_min) {
        $jauge_max= $saisie['jaugemin'];
        $jauge_min= $saisie['jaugemax'];
    }
    $descriptif     = htmlspecialchars($saisie['descriptif']);
    $liste_materiel = htmlspecialchars($saisie['liste_materiel']);

    $sql = "INSERT INTO t_ressource_rsc 
            (rsc_nom, rsc_jaugemin, rsc_descriptif, rsc_liste_materiel, rsc_jaugemax)
            VALUES ('".$nom."', ".$jauge_min.", '".$descriptif."', '".$liste_materiel."', ".$jauge_max.");";

    return $this->db->query($sql);
}

    
    /** Suppression d’une ressource */
    public function supprimer_ressource($id)
    {
        $sql = "DELETE FROM t_ressource_rsc 
                WHERE rsc_id = ".$id.";";
        return $this->db->query($sql);
    }

/** V2.1 - Réservations de toutes les ressources pour un jour donné */
// ===== V2.1 : Réservations d'un jour, regroupées par ressource =====
// ===== V2.1 : Réservations d'un jour, avec ressource + participants =====
public function get_reservations_by_date($date)
{
    $date = htmlspecialchars($date);

    // 1) Récupérer la liste des réservations du jour + ressource
    $sql = "SELECT rsv_id, rsv_nom, rsv_date, rsv_heure, rsv_lieu, rsc_id, rsc_nom
            FROM t_reservation_rsv
            JOIN t_ressource_rsc USING(rsc_id)
            WHERE rsv_date = '".$date."'
            ORDER BY rsc_nom, rsv_heure, rsv_nom;";

    $resultat = $this->db->query($sql);
    $reservations = $resultat->getResultArray();

    // 2) Pour chaque réservation, récupérer les participants avec une requête simple
    foreach ($reservations as &$r)
    {
        $sql2 = "SELECT pfl_prenom, pfl_nom
                 FROM t_participe_prt
                 JOIN t_profil_pfl USING(cpt_id)
                 WHERE rsv_id = ".$r['rsv_id']."
                 ORDER BY pfl_nom, pfl_prenom;";

        $res2 = $this->db->query($sql2)->getResultArray();

        // construction de la chaîne "Prénom Nom, Prénom Nom..."
        $liste = [];
        foreach ($res2 as $p) {
            $liste[] = $p['pfl_prenom']." ".$p['pfl_nom'];
        }

        $r['participants'] = implode(', ', $liste);
    }

    return $reservations;
}

public function pseudo_existe($pseudo)
{
    $sql = "SELECT cpt_id FROM t_compte_cpt WHERE cpt_pseudo = '".$pseudo."' LIMIT 1;";
    $resultat = $this->db->query($sql);

    return ($resultat->getNumRows() > 0);
}
public function get_nb_comptes_function()
{
    $sql = "SELECT count_comptes() AS nb;";
    return $this->db->query($sql)->getRow()->nb;
}
public function get_reservations_invite($pseudo)
{
    // Récupérer l'id du compte invité
    $sql = "SELECT cpt_id FROM t_compte_cpt WHERE cpt_pseudo = '".$pseudo."' LIMIT 1;";
    $row = $this->db->query($sql)->getRow();

    if (!$row) return [];

    $cpt_id = $row->cpt_id;

    // Récupérer ses réservations
    $sql2 = "SELECT rsv_nom, rsv_date, rsv_heure, rsv_lieu
             FROM t_reservation_rsv
             JOIN t_participe_prt USING (rsv_id)
             WHERE cpt_id = ".$cpt_id."
             ORDER BY rsv_date, rsv_heure;";

    return $this->db->query($sql2)->getResultArray();
}


}
