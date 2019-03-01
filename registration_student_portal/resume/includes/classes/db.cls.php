<?php
class WADB
	{
		/* Database Host */
		public $sDbHost;           
		public $sDbName;           // Database Name
		public $sDbUser;           // Database User
		public $sDbPwd;            // Database Password
		public $sDbDetail;         // Database Details
		public $iNoOfRecords;      // Total No of Records
		public $oQueryResult;      // Results of sql query
		public $aSelectRecords;    // Array
		public $bSelectRecords;    // Array
		public $aArrRec;           // Array
		public $bInsertRecords;    // Boolean
		public $iInsertRecId;      // Integer - the primary key for inserted record
		public $bUpdateRecords;    // Boolean
		
		/* Constructor */
		function WADB ($sDbHost, $sDbName, $sDbUser, $sDbPwd)
		{
			$oDbLink = mysql_connect ($sDbHost, $sDbUser, $sDbPwd) or die ("MySQL DB could not be connected");
			mysql_select_db ($sDbName, $oDbLink)or die ("MySQL DB could not be selected");
		}
		
	    /* Select Records */
		function selectRecords($sSqlQuery)
		{
			//if(isset($this->aSelectRecords)){
			unset($this->bSelectRecords);
			$this->oQueryResult = mysql_query($sSqlQuery) or die(mysql_error());
			$this->iNoOfRecords = mysql_num_rows($this->oQueryResult);
			if ($this->iNoOfRecords > 0) {
				while ($oRow = mysql_fetch_assoc($this->oQueryResult)) {
					$this->bSelectRecords[] = $oRow;
				}
				mysql_free_result($this->oQueryResult);
			}
			$this->aArrRec = $this->bSelectRecords;
			//}
			return $this->aArrRec;
		}
	
		/*Get Number of Records */
		function getNumberOfRecords () {
			return $this->iNoOfRecords;
		}
	
		/* Get selected data */
		function getSelectedData (){
			return $this->aSelectRecords;
		}
	
		/* Insert Records */
		function insertRecords($sSqlQuery)
		{
			$this->bInsertRecords = mysql_query ($sSqlQuery) or die (mysql_error());
			$this->iInsertRecId = mysql_insert_id();
			return $this->iInsertRecId;
		}
	
		/* Find Inserted Id */
		function getIdForInsertedRecord()
		{
			return $this->iInsertRecId;
		}
	
		/* Update Records */
		function updateRecords($sSqlQuery)
		{
			return mysql_query($sSqlQuery) or die(mysql_error());
		}
		function deleteRecords($sSqlQuery)
		{
			return mysql_query($sSqlQuery) or die(mysql_error());
		}
	}
?>