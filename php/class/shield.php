<?
class shield{
	public static function NoInjection($string){
		$inch = array('"','“','”');
		$string = str_replace($inch,"&quot;",$string);

		$illegal1=array("'");
		$string = str_replace($illegal1,"´",$string);

		$illegal2=array("ALTERTABLE","altertable","CLOSE","close","COMMIT","commit","CREATE ","create ","CREATEINDEX","createindex","CREATESYNOYM","createsynoym","CREATETABLE","createtable","CREATEVIEW","createview","DELETE ","delete ","DROP ","drop ","DROPINDEX","dropindex","DROPSYNONYM","dropsynonym","DROPTABLE","droptable","DROPVIEW","dropview","FETCH","fetch"," FROM "," from ","GRANT","grant"," INNER "," inner ","INSERT","insert","JOIN","join"," LIKE '"," like '",' LIKE "',' like "',"OPEN ","open "," OR "," or ","REVOKE","revoke","ROLLBACK","rollback","SELECT ","select ","SHELL","shell","UPDATE","update","'",'"',"=","“","”");
		$string = str_replace($illegal2," ",$string);

		$string = trim ($string);
		
		for($i=0;$i<=5;$i++)
		{
			$string = str_replace("  "," ",$string);
		}
		
		$string = strip_tags($string);
		
		return($string);
	}
}
?>