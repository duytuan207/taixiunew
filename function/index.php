<?PHP
include_once('config.php');
if($_POST['load_game'] == true)
{
    $game = $_POST['game_load'];
  
    if($game ==1)
    {
        include('game/taixiu.php');
    }
    
    if($game ==2)
    {
        include('game/chanle.php');
    }
     if($game ==3)
    {
        include('game/chat.php');
    }
   
        
}
