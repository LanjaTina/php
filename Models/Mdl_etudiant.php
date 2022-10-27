<?php 
class Etudiant {
    function get(){
    $get_data='INSERT INTO etudiant (nom, prenom, datedenaisaance, cin, email, telephone, comptes) VALUE ('.$_POST['nom'].','.$_POST['prenom'].','.$_POST['datedenaisaance'].','.$_POST['cin'].','.$_POST['email'].','.$_POST['telephone'].','.$_POST['comptes'].') ';
    }
}
$pdo = new PDO ("mysql:host=localhost;dbname=projet","root","");
if($_POST){ 
    
    $pdo ->query($get_data);
}

$q = 'SELECT * FROM etudiant';
$etudiants = $pdo->query($q)->fetchAll();
$ul = '<ul>';
foreach($etudiants as $k => $etudiant){
    $ul.= '<li>'.$etudiant['comptes'].'-'. $module['telephone'].'-'. $module['email'].'-'. $module['cin'].'-'. $module['datedenaisaance'].'-'. $module['prenom'].'-'. $module['nom'].'</em> 
    <a href="?id='.$etudiant['id'].'&action=delete">Supprimer</a>
    </li>';
}
$ul.= '</ul>';
echo $ul;

?>  