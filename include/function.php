<?php
function db_sql_safe($values)
{
	return mysql_real_escape_string ($values);
}
class display_navigator{
	var $result,$totalRecordFound,$hrefpglinks,$allrows,$fired_query;	
	function display_navigator($qry,$pagelink,$hrefcls,$noofpg)
	{
			$query=$qry;   //******* query of the data to be display
			//die;
			$result= mysql_query($query); 
			$totalRecFound = mysql_num_rows($result); 

			$noofpages = $noofpg; // this is the number of records to be display on the screen 
	
			$totalRecords=$totalRecFound;
			$totalPages=ceil($totalRecords/$noofpages);
			$showingpage="&nbsp;|&nbsp;";
			
			if((int)$_GET['pageno'] > $totalPages)
			{
				$_GET['pageno']=$totalPages;
			}
			if(!$_GET['pageno'])
			{
				$pageno=1;
				$initlimit=0;
			}else
			{
				$pageno=$_GET['pageno'];
				$initlimit=($pageno*$noofpages)-$noofpages;		
			}
			
			if($pageno>$totalPages){$pageno=1;}
				if($pageno < 6 )
				{
					$startpage = 1;
					if($pageno + 5  >= $totalPages )
						{
							$endpage = $totalPages;
						}	
						else
						{
							$endpage = 10 ;
						}
				}	
			else
				{
					$startpage = $pageno - 5 ;
					if($pageno + 5  > $totalPages )
					{
						$endpage = $totalPages;
					}	
					else
					{
						$endpage = $pageno + 5 ;
					}
					
				}

			for($i=$startpage;$i<=$endpage;$i++)
			{			
				if($i==$pageno && $i==$totalPages)
				{
					$showingpage.="<span class=\"paging_link_current\">$i</span>";
				}
				else if($i==$pageno)
					$showingpage.=" <span class=\"paging_link_current\">$i</span> | ";
				else
					$showingpage.="<A style=\"text-decoration:none\" class='".$hrefcls."' href='".$pagelink."&pageno=$i'>$i</a> | ";// change link name and give u'r page link
			}
			
			if($totalPages>1)
			{			
				if($pageno=="1")
				{
					$page=$pageno + 1;
					$next="<A style=\"text-decoration:none\" class='".$hrefcls."' href='".$pagelink."&pageno=$page'>Next</A>";// change link name and give u'r page link
					$prev="";		
				}else if($pageno==$totalPages)
				{
					$page=$pageno - 1;
					$next="";
					$prev="<A style=\"text-decoration:none\" class='".$hrefcls."' href='".$pagelink."&pageno=$page'>Previous</A>";// change link name and give u'r page link			
				}else
				{
					$page1=$pageno + 1;
					$page2=$pageno - 1;
					$next="<A style=\"text-decoration:none\" class='".$hrefcls."'href='".$pagelink."&pageno=$page1'>Next</A>";// change link name and give u'r page link
					$prev="<A style=\"text-decoration:none\" class='".$hrefcls."' href='".$pagelink."&pageno=$page2'>Previous</A>";// change link name and give u'r page link		
				}
				
			}else
			{
				$next="";
				$prev="";		
			}	
			$query.=" LIMIT $initlimit,$noofpages";
			$result= mysql_query($query);
			$totalRecordFound = mysql_num_rows($result); 
			if($prev == "" && $next =="")
			{$hrefpglinks="";} else {
				$hrefpglinks=$prev. " " .$showingpage." ".$next;
			}
			$this->hrefpglinks=$hrefpglinks;
			$this->result=$result;
			$this->fired_query=$query;			
			$this->totalRecordFound=$totalRecordFound;
			$this->showingpage=$pageno;
			$this->totalPages=$totalPages;
	}
}


?>
