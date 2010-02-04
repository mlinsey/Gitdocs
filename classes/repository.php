<?php

/* ----------------------------------------------------------------------------
 * Version class
 * 
 * Gitdocs Jan 2010
 * ---------------------------------------------------------------------------- */
require_once(dirname(__FILE__) . "/../config.php");

class Repository {

	private $location;

	public function __construct($location) {
		$this->location = $location;
	}	
	
	public static function CreateNewRepository($docId, $userId,$versionToClone = 0) {
		global $DOCUMENTS_PATH;
		$location = "$DOCUMENTS_PATH$docId/$userId";
		if(DEBUG) echo "new repo location:$location\n";
		if(!mkdir("$location", 0700)) return false;				  
		if($versionToClone) {
			$otherRepoLocation = $versionToClone->getRepoLocation();
			$command = "cd $location; git clone $otherRepoLocation";
			//TODO: Escape this? necessary?
			exec($command);
		} else {
			$fh = fopen("$location/document.html",'x');
			//TODO:setup html boilerplate here
			fclose($fh);	
			$command = "cd $location ; git init";
			exec($command);
		}
		return new Repository($location);
	}

	public function GetLocation() {
		return $this->location;
	}
	
	public function commit() {
		$command = "cd $location; git commit -a -m placeholdercommitmsg";
		exec($command);
	}
	
	public function getFile($branch = 0) {
		if(!$branch) $branch = "master";
		checkout($branch);
		$fh = fopen("$this->location/document.html",'w+');
		return $fh;
	}

	public function readFileToArray($branch = 0) {
		if(!branch) $branch = "master";
		checkout($branch);
		return file("$this->location/document.html");
	}
	
	private function checkout($branch){	
		$command = "cd $this->location; git checkout $branch";
		exec($command);
	}
	
	public function diff($myVersion, $otherVersion) {
		$myVersion->commit();
		$otherLocation = $otherVersion->getRepoLocation();
		$command = "cd $otherLocation; 
				git stash; 
				git branch $myVersion->getUserId(); 
				git checkout $myversion->getUserId(); 
				echo document.html merge=discardMine > $otherLocation/.gitattributes;
				git config merge.discardMine.name \"discard my changes if conflicts\";
				git config merge.discardMine.driver \"".dirname(__FILE__). "/../scripts/discardMine.sh %0 %A %B\";
				git commit -a -m 'prepared branch merge strategy';
			    	git merge master;";
		exec($command);
		$command = "cd $location; 
			 	git remote add -t $myVersion->getUserId -f $otherVersion->getUserId() $otherLocation;)";
		exec($command);
		$command = "git diff $otherVersion->getUserId()/$myVersion->getUserId";
		
		exec($command, $result);
		return $result;
						
	}
	
	
	
	public function merge($myVersion, $otherVersion, &$arrDiffs) {
	 	$myFileArr = $myVersion->readFileToArray();
		$otherFileArr = $otherVersion->readFileToArray($myVersion->getUserId());	
	
		//undo changes which were rejected
		foreach($arrDiffs as $diff) {
			if($userAction == "rejected") {
				if($diff->type == "ins"){
					unset($otherFileArr[$diff->index]);		
				} else if($diff->type == "del") {
					unset($myFileArr[$diff->index]);	
				}
			}
		}	
		$myfile = $myVersion->openVersionFile();
		foreach($myFileArr as $line) { fwrite($myfile,$line);}
		fclose($myFile);
		commit();	
		
		$otherFile = $otherVersion->openVersionFile($myVersion->getUserId());
		foreach($otherFileArr as $line) { fwrite($otherFile,$line);}
		fclose($otherFile);	
		$otherVersion->commit();
	
		$command = "cd $this->location; git merge $otherVersion->userId/$myVersion->userId"; 
		$exec($command, $err);
		if($err) {
			echo "Merge Error! $result";
		}
	}

}

?>
