<?php
class ActionHandler
{
	public function actionExist($action)
	{	
		$search_array = array('home', 'connection', 'inscription','member', 'article', 'sendconnection', 'sendInscription', 'sendDeconnection', 'sendArticle', 'panier');
		if(isset($action, $search_array))
			return true;	
		else
			return false;		
	}
	
	public function getAction($action)
	{
		return $action."Action";
	}
}
?>