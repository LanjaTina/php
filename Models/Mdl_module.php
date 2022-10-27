<?php 
class Module{
    function get() {
        $get_data="INSERT INTO module (nom,credit) VALUE ('".$_POST["nom"]."',".$_POST["credit"].")";
    }
}
$pdo = new PDO ("mysql:host=localhost;dbname=bases","root","");
if($_POST){ 
    
    $pdo ->query($get_data);
}

$q = 'SELECT * FROM module';
$modules = $pdo->query($q)->fetchAll();
$ul = '<ul>';
foreach($modules as $k => $module){
   $ul.= '<li>'.$module['credit'].'-'. $module['nom'].'</em> 
   <a 
   href="?id='.$module['id'].'&action=delete">Supprimer</a>
   </li>';
}
$ul.= '</ul>';
echo $ul;



?>
