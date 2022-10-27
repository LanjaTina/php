<?php
    $pdo = new PDO ("mysql:host=localhost;dbname=projet","root","");
    if($_POST){
        $sqlInsert = 'INSERT INTO etudiant (nom, prenom, datedenaisaance, cin, email, telephone, comptes) VALUE ('.$_POST['nom'].','.$_POST['prenom'].','.$_POST['datedenaisaance'].','.$_POST['cin'].','.$_POST['email'].','.$_POST['telephone'].','.$_POST['comptes'].') ';
        $pdo ->query($sqlInsert);
    }
    if(isset($_GET['id']) && $_GET['action'] == 'delete') {
        $sqlDelete = 'DELETE FROM module WHERE id = '.$_GET['id'].'  ';
        $pdo->query($sqlDelete);
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
<form action="etudiants.php" method="POST">
    <label >nom</label><input type="text" name="nom" id="">
    <label >prenom</label><input type="text" name="prenom" id="">
    <label >date de naissance</label><input type="datedenaisaance" name="nom" id="">
    <label >cin</label><input type="text" name="cin" id="">
    <label >email</label><input type="text" name="email" id="">
    <label >telephone</label><input type="text" name="telephone" id="">
    <label >comptes</label><input type="text" name="comptes" id="">
    <input type="submit" value="Envoyer">
</form>