<?PHP
class Marque{
	private $idm;
	private $mnom;
	function __construct($mnom){
		$this->mnom=$mnom;

	}
	

	function getMnom(){
		return $this->mnom;
	}
	
	
    // Seeetttttts
      function setMnom($mnom){
      	return $this->mnom=$mnom;
      }
	
	

	
}

?>