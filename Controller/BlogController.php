<?php
include ('Model\Data\mysql.php');
class BlogController
{
	public function homeAction()
	{
		include('View/home.html');
	}
	
	public function notFoundAction()
	{
		include('View/404.html');		
	}
	
	public function headerAction()
	{
		include('View/header.html');
	}	
	
	public function footerAction()
	{
		include('View/footer.html');			
	}
	
	public function connectionAction()
	{
		include('View/connection.html');			
	}

	public function inscriptionAction()
	{
		include('View/inscription.html');
	}
	
	public function memberAction()
	{
		include('View/member.html');		
	}
	
	public function articleAction()
	{
		include('View/article.html');		
	}

	public function panierAction(){
		include('view\panier.php');
	}
	
	public function sendConnectionAction()
	{
		$username=$_POST['login'];
		$password=$_POST['pass'];
		$conn=new MysqlConnector();
		if((isset($username)and isset($password))and (!empty($username)and!empty($password))){
			$req = $conn->execStroredProcedureQuery("connexion",array($username,$password));
			$result=$req->fetchall();
			if($result!=0){
				print_r($result);
			}
			else{
				echo "pas co";
			}
		}
	}
	
	public function sendInscriptionAction()
	{
		$conn= new MysqlConnector();
		if(isset($_POST['login']) and isset($_POST['pass']))
		{
			$req =  $conn->execStroredProcedureNonQuery("inscription",array($_POST['login'],$_POST['pass']));
			header('Location: http://localhost/Workshop/?page=connection');
		}
		$conn->stopConnexion();

	}
	
	public function sendDeconnectionAction()
	{
		
	}
	
	public function sendArticleAction($name, $content)
	{
		
	}
}
?>