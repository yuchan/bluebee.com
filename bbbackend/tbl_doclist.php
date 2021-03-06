<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start(); // Turn on output buffering
?>
<?php include_once "ewcfg9.php" ?>
<?php include_once "ewmysql9.php" ?>
<?php include_once "phpfn9.php" ?>
<?php include_once "tbl_docinfo.php" ?>
<?php include_once "userfn9.php" ?>
<?php

//
// Page class
//

$tbl_doc_list = NULL; // Initialize page object first

class ctbl_doc_list extends ctbl_doc {

	// Page ID
	var $PageID = 'list';

	// Project ID
	var $ProjectID = "{9095E487-4467-4C46-97C7-01D1A378652D}";

	// Table name
	var $TableName = 'tbl_doc';

	// Page object name
	var $PageObjName = 'tbl_doc_list';

	// Page name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		if ($this->UseTokenInUrl) $PageUrl .= "t=" . $this->TableVar . "&"; // Add page token
		return $PageUrl;
	}

	// Page URLs
	var $AddUrl;
	var $EditUrl;
	var $CopyUrl;
	var $DeleteUrl;
	var $ViewUrl;
	var $ListUrl;

	// Export URLs
	var $ExportPrintUrl;
	var $ExportHtmlUrl;
	var $ExportExcelUrl;
	var $ExportWordUrl;
	var $ExportXmlUrl;
	var $ExportCsvUrl;
	var $ExportPdfUrl;

	// Update URLs
	var $InlineAddUrl;
	var $InlineCopyUrl;
	var $InlineEditUrl;
	var $GridAddUrl;
	var $GridEditUrl;
	var $MultiDeleteUrl;
	var $MultiUpdateUrl;

	// Message
	function getMessage() {
		return @$_SESSION[EW_SESSION_MESSAGE];
	}

	function setMessage($v) {
		ew_AddMessage($_SESSION[EW_SESSION_MESSAGE], $v);
	}

	function getFailureMessage() {
		return @$_SESSION[EW_SESSION_FAILURE_MESSAGE];
	}

	function setFailureMessage($v) {
		ew_AddMessage($_SESSION[EW_SESSION_FAILURE_MESSAGE], $v);
	}

	function getSuccessMessage() {
		return @$_SESSION[EW_SESSION_SUCCESS_MESSAGE];
	}

	function setSuccessMessage($v) {
		ew_AddMessage($_SESSION[EW_SESSION_SUCCESS_MESSAGE], $v);
	}

	function getWarningMessage() {
		return @$_SESSION[EW_SESSION_WARNING_MESSAGE];
	}

	function setWarningMessage($v) {
		ew_AddMessage($_SESSION[EW_SESSION_WARNING_MESSAGE], $v);
	}

	// Show message
	function ShowMessage() {
		$hidden = FALSE;
		$html = "";

		// Message
		$sMessage = $this->getMessage();
		$this->Message_Showing($sMessage, "");
		if ($sMessage <> "") { // Message in Session, display
			$html .= "<p class=\"ewMessage\">" . $sMessage . "</p>";
			$_SESSION[EW_SESSION_MESSAGE] = ""; // Clear message in Session
		}

		// Warning message
		$sWarningMessage = $this->getWarningMessage();
		$this->Message_Showing($sWarningMessage, "warning");
		if ($sWarningMessage <> "") { // Message in Session, display
			$html .= "<table class=\"ewMessageTable\"><tr><td class=\"ewWarningIcon\"></td><td class=\"ewWarningMessage\">" . $sWarningMessage . "</td></tr></table>";
			$_SESSION[EW_SESSION_WARNING_MESSAGE] = ""; // Clear message in Session
		}

		// Success message
		$sSuccessMessage = $this->getSuccessMessage();
		$this->Message_Showing($sSuccessMessage, "success");
		if ($sSuccessMessage <> "") { // Message in Session, display
			$html .= "<table class=\"ewMessageTable\"><tr><td class=\"ewSuccessIcon\"></td><td class=\"ewSuccessMessage\">" . $sSuccessMessage . "</td></tr></table>";
			$_SESSION[EW_SESSION_SUCCESS_MESSAGE] = ""; // Clear message in Session
		}

		// Failure message
		$sErrorMessage = $this->getFailureMessage();
		$this->Message_Showing($sErrorMessage, "failure");
		if ($sErrorMessage <> "") { // Message in Session, display
			$html .= "<table class=\"ewMessageTable\"><tr><td class=\"ewErrorIcon\"></td><td class=\"ewErrorMessage\">" . $sErrorMessage . "</td></tr></table>";
			$_SESSION[EW_SESSION_FAILURE_MESSAGE] = ""; // Clear message in Session
		}
		echo "<div class=\"ewMessageDialog\"" . (($hidden) ? " style=\"display: none;\"" : "") . ">" . $html . "</div>";
	}
	var $PageHeader;
	var $PageFooter;

	// Show Page Header
	function ShowPageHeader() {
		$sHeader = $this->PageHeader;
		$this->Page_DataRendering($sHeader);
		if ($sHeader <> "") { // Header exists, display
			echo "<p class=\"phpmaker\">" . $sHeader . "</p>";
		}
	}

	// Show Page Footer
	function ShowPageFooter() {
		$sFooter = $this->PageFooter;
		$this->Page_DataRendered($sFooter);
		if ($sFooter <> "") { // Fotoer exists, display
			echo "<p class=\"phpmaker\">" . $sFooter . "</p>";
		}
	}

	// Validate page request
	function IsPageRequest() {
		global $objForm;
		if ($this->UseTokenInUrl) {
			if ($objForm)
				return ($this->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($this->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	// Page class constructor
	//
	function __construct() {
		global $conn, $Language, $UserAgent;

		// User agent
		$UserAgent = ew_UserAgent();
		$GLOBALS["Page"] = &$this;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Parent constuctor
		parent::__construct();

		// Table object (tbl_doc)
		if (!isset($GLOBALS["tbl_doc"])) {
			$GLOBALS["tbl_doc"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["tbl_doc"];
		}

		// Initialize URLs
		$this->ExportPrintUrl = $this->PageUrl() . "export=print";
		$this->ExportExcelUrl = $this->PageUrl() . "export=excel";
		$this->ExportWordUrl = $this->PageUrl() . "export=word";
		$this->ExportHtmlUrl = $this->PageUrl() . "export=html";
		$this->ExportXmlUrl = $this->PageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->PageUrl() . "export=csv";
		$this->ExportPdfUrl = $this->PageUrl() . "export=pdf";
		$this->AddUrl = "tbl_docadd.php";
		$this->InlineAddUrl = $this->PageUrl() . "a=add";
		$this->GridAddUrl = $this->PageUrl() . "a=gridadd";
		$this->GridEditUrl = $this->PageUrl() . "a=gridedit";
		$this->MultiDeleteUrl = "tbl_docdelete.php";
		$this->MultiUpdateUrl = "tbl_docupdate.php";

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'list', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'tbl_doc', TRUE);

		// Start timer
		if (!isset($GLOBALS["gTimer"])) $GLOBALS["gTimer"] = new cTimer();

		// Open connection
		if (!isset($conn)) $conn = ew_Connect();

		// List options
		$this->ListOptions = new cListOptions();
		$this->ListOptions->TableVar = $this->TableVar;

		// Export options
		$this->ExportOptions = new cListOptions();
		$this->ExportOptions->Tag = "span";
		$this->ExportOptions->TagClassName = "ewExportOption";
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $UserProfile, $Language, $Security, $objForm;

		// Security
		$Security = new cAdvancedSecurity();
		if (!$Security->IsLoggedIn()) $Security->AutoLogin();
		if (!$Security->IsLoggedIn()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("login.php");
		}

		// Get grid add count
		$gridaddcnt = @$_GET[EW_TABLE_GRID_ADD_ROW_COUNT];
		if (is_numeric($gridaddcnt) && $gridaddcnt > 0)
			$this->GridAddRowCount = $gridaddcnt;

		// Set up list options
		$this->SetupListOptions();
		$this->CurrentAction = (@$_GET["a"] <> "") ? $_GET["a"] : @$_POST["a_list"];
		$this->doc_id->Visible = !$this->IsAdd() && !$this->IsCopy() && !$this->IsGridAdd();

		// Global Page Loading event (in userfn*.php)
		Page_Loading();

		// Page Load event
		$this->Page_Load();
	}

	//
	// Page_Terminate
	//
	function Page_Terminate($url = "") {
		global $conn;

		// Page Unload event
		$this->Page_Unload();

		// Global Page Unloaded event (in userfn*.php)
		Page_Unloaded();
		$this->Page_Redirecting($url);

		 // Close connection
		$conn->Close();

		// Go to URL if specified
		if ($url <> "") {
			if (!EW_DEBUG_ENABLED && ob_get_length())
				ob_end_clean();
			header("Location: " . $url);
		}
		exit();
	}

	// Class variables
	var $ListOptions; // List options
	var $ExportOptions; // Export options
	var $DisplayRecs = 20;
	var $StartRec;
	var $StopRec;
	var $TotalRecs = 0;
	var $RecRange = 10;
	var $Pager;
	var $SearchWhere = ""; // Search WHERE clause
	var $RecCnt = 0; // Record count
	var $EditRowCnt;
	var $StartRowCnt = 1;
	var $RowCnt = 0;
	var $Attrs = array(); // Row attributes and cell attributes
	var $RowIndex = 0; // Row index
	var $KeyCount = 0; // Key count
	var $RowAction = ""; // Row action
	var $RowOldKey = ""; // Row old key (for copy)
	var $RecPerRow = 0;
	var $ColCnt = 0;
	var $DbMasterFilter = ""; // Master filter
	var $DbDetailFilter = ""; // Detail filter
	var $MasterRecordExists;	
	var $MultiSelectKey;
	var $Command;
	var $Recordset;
	var $OldRecordset;

	//
	// Page main
	//
	function Page_Main() {
		global $objForm, $Language, $gsFormError, $gsSearchError, $Security;

		// Search filters
		$sSrchAdvanced = ""; // Advanced search filter
		$sSrchBasic = ""; // Basic search filter
		$sFilter = "";

		// Get command
		$this->Command = strtolower(@$_GET["cmd"]);
		if ($this->IsPageRequest()) { // Validate request

			// Handle reset command
			$this->ResetCmd();

			// Hide all options
			if ($this->Export <> "" ||
				$this->CurrentAction == "gridadd" ||
				$this->CurrentAction == "gridedit") {
				$this->ListOptions->HideAllOptions();
				$this->ExportOptions->HideAllOptions();
			}

			// Get basic search values
			$this->LoadBasicSearchValues();

			// Restore search parms from Session if not searching / reset
			if ($this->Command <> "search" && $this->Command <> "reset" && $this->Command <> "resetall")
				$this->RestoreSearchParms();

			// Call Recordset SearchValidated event
			$this->Recordset_SearchValidated();

			// Set up sorting order
			$this->SetUpSortOrder();

			// Get basic search criteria
			if ($gsSearchError == "")
				$sSrchBasic = $this->BasicSearchWhere();
		}

		// Restore display records
		if ($this->getRecordsPerPage() <> "") {
			$this->DisplayRecs = $this->getRecordsPerPage(); // Restore from Session
		} else {
			$this->DisplayRecs = 20; // Load default
		}

		// Load Sorting Order
		$this->LoadSortOrder();

		// Load search default if no existing search criteria
		if (!$this->CheckSearchParms()) {

			// Load basic search from default
			$this->BasicSearch->LoadDefault();
			if ($this->BasicSearch->Keyword != "")
				$sSrchBasic = $this->BasicSearchWhere();
		}

		// Build search criteria
		ew_AddFilter($this->SearchWhere, $sSrchAdvanced);
		ew_AddFilter($this->SearchWhere, $sSrchBasic);

		// Call Recordset_Searching event
		$this->Recordset_Searching($this->SearchWhere);

		// Save search criteria
		if ($this->Command == "search") {
			$this->setSearchWhere($this->SearchWhere); // Save to Session
			$this->StartRec = 1; // Reset start record counter
			$this->setStartRecordNumber($this->StartRec);
		} else {
			$this->SearchWhere = $this->getSearchWhere();
		}

		// Build filter
		$sFilter = "";
		ew_AddFilter($sFilter, $this->DbDetailFilter);
		ew_AddFilter($sFilter, $this->SearchWhere);

		// Set up filter in session
		$this->setSessionWhere($sFilter);
		$this->CurrentFilter = "";
	}

	// Build filter for all keys
	function BuildKeyFilter() {
		global $objForm;
		$sWrkFilter = "";

		// Update row index and get row key
		$rowindex = 1;
		$objForm->Index = $rowindex;
		$sThisKey = strval($objForm->GetValue("k_key"));
		while ($sThisKey <> "") {
			if ($this->SetupKeyValues($sThisKey)) {
				$sFilter = $this->KeyFilter();
				if ($sWrkFilter <> "") $sWrkFilter .= " OR ";
				$sWrkFilter .= $sFilter;
			} else {
				$sWrkFilter = "0=1";
				break;
			}

			// Update row index and get row key
			$rowindex++; // next row
			$objForm->Index = $rowindex;
			$sThisKey = strval($objForm->GetValue("k_key"));
		}
		return $sWrkFilter;
	}

	// Set up key values
	function SetupKeyValues($key) {
		$arrKeyFlds = explode($GLOBALS["EW_COMPOSITE_KEY_SEPARATOR"], $key);
		if (count($arrKeyFlds) >= 1) {
			$this->doc_id->setFormValue($arrKeyFlds[0]);
			if (!is_numeric($this->doc_id->FormValue))
				return FALSE;
		}
		return TRUE;
	}

	// Return basic search SQL
	function BasicSearchSQL($Keyword) {
		$sKeyword = ew_AdjustSql($Keyword);
		$sWhere = "";
		$this->BuildBasicSearchSQL($sWhere, $this->doc_url, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $this->doc_name, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $this->doc_scribd_id, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $this->doc_description, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $this->doc_title, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $this->doc_status, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $this->doc_author, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $this->doc_path, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $this->doc_author_name, $Keyword);
		$this->BuildBasicSearchSQL($sWhere, $this->doc_publisher, $Keyword);
		return $sWhere;
	}

	// Build basic search SQL
	function BuildBasicSearchSql(&$Where, &$Fld, $Keyword) {
		if ($Keyword == EW_NULL_VALUE) {
			$sWrk = $Fld->FldExpression . " IS NULL";
		} elseif ($Keyword == EW_NOT_NULL_VALUE) {
			$sWrk = $Fld->FldExpression . " IS NOT NULL";
		} else {
			$sFldExpression = ($Fld->FldVirtualExpression <> $Fld->FldExpression) ? $Fld->FldVirtualExpression : $Fld->FldBasicSearchExpression;
			$sWrk = $sFldExpression . ew_Like(ew_QuotedValue("%" . $Keyword . "%", EW_DATATYPE_STRING));
		}
		if ($Where <> "") $Where .= " OR ";
		$Where .= $sWrk;
	}

	// Return basic search WHERE clause based on search keyword and type
	function BasicSearchWhere() {
		global $Security;
		$sSearchStr = "";
		$sSearchKeyword = $this->BasicSearch->Keyword;
		$sSearchType = $this->BasicSearch->Type;
		if ($sSearchKeyword <> "") {
			$sSearch = trim($sSearchKeyword);
			if ($sSearchType <> "=") {
				while (strpos($sSearch, "  ") !== FALSE)
					$sSearch = str_replace("  ", " ", $sSearch);
				$arKeyword = explode(" ", trim($sSearch));
				foreach ($arKeyword as $sKeyword) {
					if ($sSearchStr <> "") $sSearchStr .= " " . $sSearchType . " ";
					$sSearchStr .= "(" . $this->BasicSearchSQL($sKeyword) . ")";
				}
			} else {
				$sSearchStr = $this->BasicSearchSQL($sSearch);
			}
			$this->Command = "search";
		}
		if ($this->Command == "search") {
			$this->BasicSearch->setKeyword($sSearchKeyword);
			$this->BasicSearch->setType($sSearchType);
		}
		return $sSearchStr;
	}

	// Check if search parm exists
	function CheckSearchParms() {

		// Check basic search
		if ($this->BasicSearch->IssetSession())
			return TRUE;
		return FALSE;
	}

	// Clear all search parameters
	function ResetSearchParms() {

		// Clear search WHERE clause
		$this->SearchWhere = "";
		$this->setSearchWhere($this->SearchWhere);

		// Clear basic search parameters
		$this->ResetBasicSearchParms();
	}

	// Load advanced search default values
	function LoadAdvancedSearchDefault() {
		return FALSE;
	}

	// Clear all basic search parameters
	function ResetBasicSearchParms() {
		$this->BasicSearch->UnsetSession();
	}

	// Restore all search parameters
	function RestoreSearchParms() {

		// Restore basic search values
		$this->BasicSearch->Load();
	}

	// Set up sort parameters
	function SetUpSortOrder() {

		// Check for "order" parameter
		if (@$_GET["order"] <> "") {
			$this->CurrentOrder = ew_StripSlashes(@$_GET["order"]);
			$this->CurrentOrderType = @$_GET["ordertype"];
			$this->UpdateSort($this->doc_id); // doc_id
			$this->UpdateSort($this->doc_url); // doc_url
			$this->UpdateSort($this->doc_name); // doc_name
			$this->UpdateSort($this->doc_scribd_id); // doc_scribd_id
			$this->UpdateSort($this->doc_description); // doc_description
			$this->UpdateSort($this->doc_title); // doc_title
			$this->UpdateSort($this->doc_status); // doc_status
			$this->UpdateSort($this->doc_author); // doc_author
			$this->UpdateSort($this->doc_type); // doc_type
			$this->UpdateSort($this->subject_dept); // subject_dept
			$this->UpdateSort($this->subject_type); // subject_type
			$this->UpdateSort($this->subject_faculty); // subject_faculty
			$this->UpdateSort($this->doc_publisher); // doc_publisher
			$this->UpdateSort($this->subject_general_faculty_id); // subject_general_faculty_id
			$this->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load sort order parameters
	function LoadSortOrder() {
		$sOrderBy = $this->getSessionOrderBy(); // Get ORDER BY from Session
		if ($sOrderBy == "") {
			if ($this->SqlOrderBy() <> "") {
				$sOrderBy = $this->SqlOrderBy();
				$this->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command
	// cmd=reset (Reset search parameters)
	// cmd=resetall (Reset search and master/detail parameters)
	// cmd=resetsort (Reset sort parameters)
	function ResetCmd() {

		// Check if reset command
		if (substr($this->Command,0,5) == "reset") {

			// Reset search criteria
			if ($this->Command == "reset" || $this->Command == "resetall")
				$this->ResetSearchParms();

			// Reset sorting order
			if ($this->Command == "resetsort") {
				$sOrderBy = "";
				$this->setSessionOrderBy($sOrderBy);
				$this->doc_id->setSort("");
				$this->doc_url->setSort("");
				$this->doc_name->setSort("");
				$this->doc_scribd_id->setSort("");
				$this->doc_description->setSort("");
				$this->doc_title->setSort("");
				$this->doc_status->setSort("");
				$this->doc_author->setSort("");
				$this->doc_type->setSort("");
				$this->subject_dept->setSort("");
				$this->subject_type->setSort("");
				$this->subject_faculty->setSort("");
				$this->doc_publisher->setSort("");
				$this->subject_general_faculty_id->setSort("");
			}

			// Reset start position
			$this->StartRec = 1;
			$this->setStartRecordNumber($this->StartRec);
		}
	}

	// Set up list options
	function SetupListOptions() {
		global $Security, $Language;

		// "view"
		$item = &$this->ListOptions->Add("view");
		$item->CssStyle = "white-space: nowrap;";
		$item->Visible = $Security->IsLoggedIn();
		$item->OnLeft = FALSE;

		// "edit"
		$item = &$this->ListOptions->Add("edit");
		$item->CssStyle = "white-space: nowrap;";
		$item->Visible = $Security->IsLoggedIn();
		$item->OnLeft = FALSE;

		// "copy"
		$item = &$this->ListOptions->Add("copy");
		$item->CssStyle = "white-space: nowrap;";
		$item->Visible = $Security->IsLoggedIn();
		$item->OnLeft = FALSE;

		// "delete"
		$item = &$this->ListOptions->Add("delete");
		$item->CssStyle = "white-space: nowrap;";
		$item->Visible = $Security->IsLoggedIn();
		$item->OnLeft = FALSE;

		// Call ListOptions_Load event
		$this->ListOptions_Load();
	}

	// Render list options
	function RenderListOptions() {
		global $Security, $Language, $objForm;
		$this->ListOptions->LoadDefault();

		// "view"
		$oListOpt = &$this->ListOptions->Items["view"];
		if ($Security->IsLoggedIn())
			$oListOpt->Body = "<a class=\"ewRowLink\" href=\"" . $this->ViewUrl . "\">" . $Language->Phrase("ViewLink") . "</a>";

		// "edit"
		$oListOpt = &$this->ListOptions->Items["edit"];
		if ($Security->IsLoggedIn()) {
			$oListOpt->Body = "<a class=\"ewRowLink\" href=\"" . $this->EditUrl . "\">" . $Language->Phrase("EditLink") . "</a>";
		}

		// "copy"
		$oListOpt = &$this->ListOptions->Items["copy"];
		if ($Security->IsLoggedIn()) {
			$oListOpt->Body = "<a class=\"ewRowLink\" href=\"" . $this->CopyUrl . "\">" . $Language->Phrase("CopyLink") . "</a>";
		}

		// "delete"
		$oListOpt = &$this->ListOptions->Items["delete"];
		if ($Security->IsLoggedIn())
			$oListOpt->Body = "<a class=\"ewRowLink\"" . "" . " href=\"" . $this->DeleteUrl . "\">" . $Language->Phrase("DeleteLink") . "</a>";
		$this->RenderListOptionsExt();

		// Call ListOptions_Rendered event
		$this->ListOptions_Rendered();
	}

	function RenderListOptionsExt() {
		global $Security, $Language;
	}

	// Set up starting record parameters
	function SetUpStartRec() {
		if ($this->DisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->StartRec = $_GET[EW_TABLE_START_REC];
				$this->setStartRecordNumber($this->StartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$PageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($PageNo)) {
					$this->StartRec = ($PageNo-1)*$this->DisplayRecs+1;
					if ($this->StartRec <= 0) {
						$this->StartRec = 1;
					} elseif ($this->StartRec >= intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1) {
						$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1;
					}
					$this->setStartRecordNumber($this->StartRec);
				}
			}
		}
		$this->StartRec = $this->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->StartRec) || $this->StartRec == "") { // Avoid invalid start record counter
			$this->StartRec = 1; // Reset start record counter
			$this->setStartRecordNumber($this->StartRec);
		} elseif (intval($this->StartRec) > intval($this->TotalRecs)) { // Avoid starting record > total records
			$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to last page first record
			$this->setStartRecordNumber($this->StartRec);
		} elseif (($this->StartRec-1) % $this->DisplayRecs <> 0) {
			$this->StartRec = intval(($this->StartRec-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to page boundary
			$this->setStartRecordNumber($this->StartRec);
		}
	}

	// Load basic search values
	function LoadBasicSearchValues() {
		$this->BasicSearch->Keyword = @$_GET[EW_TABLE_BASIC_SEARCH];
		if ($this->BasicSearch->Keyword <> "") $this->Command = "search";
		$this->BasicSearch->Type = @$_GET[EW_TABLE_BASIC_SEARCH_TYPE];
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn;

		// Call Recordset Selecting event
		$this->Recordset_Selecting($this->CurrentFilter);

		// Load List page SQL
		$sSql = $this->SelectSQL();
		if ($offset > -1 && $rowcnt > -1)
			$sSql .= " LIMIT $rowcnt OFFSET $offset";

		// Load recordset
		$rs = ew_LoadRecordset($sSql);

		// Call Recordset Selected event
		$this->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $Language;
		$sFilter = $this->KeyFilter();

		// Call Row Selecting event
		$this->Row_Selecting($sFilter);

		// Load SQL based on filter
		$this->CurrentFilter = $sFilter;
		$sSql = $this->SQL();
		$res = FALSE;
		$rs = ew_LoadRecordset($sSql);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->LoadRowValues($rs); // Load row values
			$rs->Close();
		}
		return $res;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $conn;
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row = &$rs->fields;
		$this->Row_Selected($row);
		$this->doc_id->setDbValue($rs->fields('doc_id'));
		$this->doc_url->setDbValue($rs->fields('doc_url'));
		$this->doc_name->setDbValue($rs->fields('doc_name'));
		$this->doc_scribd_id->setDbValue($rs->fields('doc_scribd_id'));
		$this->doc_description->setDbValue($rs->fields('doc_description'));
		$this->doc_title->setDbValue($rs->fields('doc_title'));
		$this->doc_status->setDbValue($rs->fields('doc_status'));
		$this->doc_author->setDbValue($rs->fields('doc_author'));
		$this->doc_type->setDbValue($rs->fields('doc_type'));
		$this->doc_path->setDbValue($rs->fields('doc_path'));
		$this->subject_dept->setDbValue($rs->fields('subject_dept'));
		$this->subject_type->setDbValue($rs->fields('subject_type'));
		$this->subject_faculty->setDbValue($rs->fields('subject_faculty'));
		$this->doc_author_name->setDbValue($rs->fields('doc_author_name'));
		$this->doc_publisher->setDbValue($rs->fields('doc_publisher'));
		$this->subject_general_faculty_id->setDbValue($rs->fields('subject_general_faculty_id'));
	}

	// Load old record
	function LoadOldRecord() {

		// Load key values from Session
		$bValidKey = TRUE;
		if (strval($this->getKey("doc_id")) <> "")
			$this->doc_id->CurrentValue = $this->getKey("doc_id"); // doc_id
		else
			$bValidKey = FALSE;

		// Load old recordset
		if ($bValidKey) {
			$this->CurrentFilter = $this->KeyFilter();
			$sSql = $this->SQL();
			$this->OldRecordset = ew_LoadRecordset($sSql);
			$this->LoadRowValues($this->OldRecordset); // Load row values
		} else {
			$this->OldRecordset = NULL;
		}
		return $bValidKey;
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $Language;
		global $gsLanguage;

		// Initialize URLs
		$this->ViewUrl = $this->GetViewUrl();
		$this->EditUrl = $this->GetEditUrl();
		$this->InlineEditUrl = $this->GetInlineEditUrl();
		$this->CopyUrl = $this->GetCopyUrl();
		$this->InlineCopyUrl = $this->GetInlineCopyUrl();
		$this->DeleteUrl = $this->GetDeleteUrl();

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
		// doc_id
		// doc_url
		// doc_name
		// doc_scribd_id
		// doc_description
		// doc_title
		// doc_status
		// doc_author
		// doc_type
		// doc_path
		// subject_dept
		// subject_type
		// subject_faculty
		// doc_author_name
		// doc_publisher
		// subject_general_faculty_id

		if ($this->RowType == EW_ROWTYPE_VIEW) { // View row

			// doc_id
			$this->doc_id->ViewValue = $this->doc_id->CurrentValue;
			$this->doc_id->ViewCustomAttributes = "";

			// doc_url
			$this->doc_url->ViewValue = $this->doc_url->CurrentValue;
			$this->doc_url->ImageAlt = $this->doc_url->FldAlt();
			$this->doc_url->ViewCustomAttributes = "";

			// doc_name
			$this->doc_name->ViewValue = $this->doc_name->CurrentValue;
			$this->doc_name->ViewCustomAttributes = "";

			// doc_scribd_id
			$this->doc_scribd_id->ViewValue = $this->doc_scribd_id->CurrentValue;
			$this->doc_scribd_id->ViewCustomAttributes = "";

			// doc_description
			$this->doc_description->ViewValue = $this->doc_description->CurrentValue;
			$this->doc_description->ViewCustomAttributes = "";

			// doc_title
			$this->doc_title->ViewValue = $this->doc_title->CurrentValue;
			$this->doc_title->ViewCustomAttributes = "";

			// doc_status
			$this->doc_status->ViewValue = $this->doc_status->CurrentValue;
			$this->doc_status->ViewCustomAttributes = "";

			// doc_author
			$this->doc_author->ViewValue = $this->doc_author->CurrentValue;
			$this->doc_author->ViewCustomAttributes = "";

			// doc_type
			$this->doc_type->ViewValue = $this->doc_type->CurrentValue;
			$this->doc_type->ViewCustomAttributes = "";

			// subject_dept
			if (strval($this->subject_dept->CurrentValue) <> "") {
				$sFilterWrk = "`dept_id`" . ew_SearchString("=", $this->subject_dept->CurrentValue, EW_DATATYPE_NUMBER);
			$sSqlWrk = "SELECT `dept_id`, `dept_name` AS `DispFld`, '' AS `Disp2Fld`, '' AS `Disp3Fld`, '' AS `Disp4Fld` FROM `tbl_dept`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				ew_AddFilter($sWhereWrk, $sFilterWrk);
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$this->subject_dept->ViewValue = $rswrk->fields('DispFld');
					$rswrk->Close();
				} else {
					$this->subject_dept->ViewValue = $this->subject_dept->CurrentValue;
				}
			} else {
				$this->subject_dept->ViewValue = NULL;
			}
			$this->subject_dept->ViewCustomAttributes = "";

			// subject_type
			if (strval($this->subject_type->CurrentValue) <> "") {
				$sFilterWrk = "`id`" . ew_SearchString("=", $this->subject_type->CurrentValue, EW_DATATYPE_NUMBER);
			$sSqlWrk = "SELECT `id`, `subject_type_name` AS `DispFld`, '' AS `Disp2Fld`, '' AS `Disp3Fld`, '' AS `Disp4Fld` FROM `tbl_subject_type`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				ew_AddFilter($sWhereWrk, $sFilterWrk);
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$this->subject_type->ViewValue = $rswrk->fields('DispFld');
					$rswrk->Close();
				} else {
					$this->subject_type->ViewValue = $this->subject_type->CurrentValue;
				}
			} else {
				$this->subject_type->ViewValue = NULL;
			}
			$this->subject_type->ViewCustomAttributes = "";

			// subject_faculty
			if (strval($this->subject_faculty->CurrentValue) <> "") {
				$sFilterWrk = "`faculty_id`" . ew_SearchString("=", $this->subject_faculty->CurrentValue, EW_DATATYPE_NUMBER);
			$sSqlWrk = "SELECT `faculty_id`, `faculty_name` AS `DispFld`, '' AS `Disp2Fld`, '' AS `Disp3Fld`, '' AS `Disp4Fld` FROM `tbl_faculty`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				ew_AddFilter($sWhereWrk, $sFilterWrk);
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$this->subject_faculty->ViewValue = $rswrk->fields('DispFld');
					$rswrk->Close();
				} else {
					$this->subject_faculty->ViewValue = $this->subject_faculty->CurrentValue;
				}
			} else {
				$this->subject_faculty->ViewValue = NULL;
			}
			$this->subject_faculty->ViewCustomAttributes = "";

			// doc_publisher
			$this->doc_publisher->ViewValue = $this->doc_publisher->CurrentValue;
			$this->doc_publisher->ViewCustomAttributes = "";

			// subject_general_faculty_id
			if (strval($this->subject_general_faculty_id->CurrentValue) <> "") {
				$sFilterWrk = "`faculty_id`" . ew_SearchString("=", $this->subject_general_faculty_id->CurrentValue, EW_DATATYPE_NUMBER);
			$sSqlWrk = "SELECT `faculty_id`, `faculty_name` AS `DispFld`, '' AS `Disp2Fld`, '' AS `Disp3Fld`, '' AS `Disp4Fld` FROM `tbl_faculty`";
			$sWhereWrk = "";
			if ($sFilterWrk <> "") {
				ew_AddFilter($sWhereWrk, $sFilterWrk);
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$this->subject_general_faculty_id->ViewValue = $rswrk->fields('DispFld');
					$rswrk->Close();
				} else {
					$this->subject_general_faculty_id->ViewValue = $this->subject_general_faculty_id->CurrentValue;
				}
			} else {
				$this->subject_general_faculty_id->ViewValue = NULL;
			}
			$this->subject_general_faculty_id->ViewCustomAttributes = "";

			// doc_id
			$this->doc_id->LinkCustomAttributes = "";
			$this->doc_id->HrefValue = "";
			$this->doc_id->TooltipValue = "";

			// doc_url
			$this->doc_url->LinkCustomAttributes = "";
			$this->doc_url->HrefValue = "";
			$this->doc_url->TooltipValue = "";

			// doc_name
			$this->doc_name->LinkCustomAttributes = "";
			$this->doc_name->HrefValue = "";
			$this->doc_name->TooltipValue = "";

			// doc_scribd_id
			$this->doc_scribd_id->LinkCustomAttributes = "";
			$this->doc_scribd_id->HrefValue = "";
			$this->doc_scribd_id->TooltipValue = "";

			// doc_description
			$this->doc_description->LinkCustomAttributes = "";
			$this->doc_description->HrefValue = "";
			$this->doc_description->TooltipValue = "";

			// doc_title
			$this->doc_title->LinkCustomAttributes = "";
			$this->doc_title->HrefValue = "";
			$this->doc_title->TooltipValue = "";

			// doc_status
			$this->doc_status->LinkCustomAttributes = "";
			$this->doc_status->HrefValue = "";
			$this->doc_status->TooltipValue = "";

			// doc_author
			$this->doc_author->LinkCustomAttributes = "";
			$this->doc_author->HrefValue = "";
			$this->doc_author->TooltipValue = "";

			// doc_type
			$this->doc_type->LinkCustomAttributes = "";
			$this->doc_type->HrefValue = "";
			$this->doc_type->TooltipValue = "";

			// subject_dept
			$this->subject_dept->LinkCustomAttributes = "";
			$this->subject_dept->HrefValue = "";
			$this->subject_dept->TooltipValue = "";

			// subject_type
			$this->subject_type->LinkCustomAttributes = "";
			$this->subject_type->HrefValue = "";
			$this->subject_type->TooltipValue = "";

			// subject_faculty
			$this->subject_faculty->LinkCustomAttributes = "";
			$this->subject_faculty->HrefValue = "";
			$this->subject_faculty->TooltipValue = "";

			// doc_publisher
			$this->doc_publisher->LinkCustomAttributes = "";
			$this->doc_publisher->HrefValue = "";
			$this->doc_publisher->TooltipValue = "";

			// subject_general_faculty_id
			$this->subject_general_faculty_id->LinkCustomAttributes = "";
			$this->subject_general_faculty_id->HrefValue = "";
			$this->subject_general_faculty_id->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($this->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$this->Row_Rendered();
	}

	// Page Load event
	function Page_Load() {

		//echo "Page Load";
	}

	// Page Unload event
	function Page_Unload() {

		//echo "Page Unload";
	}

	// Page Redirecting event
	function Page_Redirecting(&$url) {

		// Example:
		//$url = "your URL";

	}

	// Message Showing event
	// $type = ''|'success'|'failure'|'warning'
	function Message_Showing(&$msg, $type) {
		if ($type == 'success') {

			//$msg = "your success message";
		} elseif ($type == 'failure') {

			//$msg = "your failure message";
		} elseif ($type == 'warning') {

			//$msg = "your warning message";
		} else {

			//$msg = "your message";
		}
	}

	// Page Data Rendering event
	function Page_DataRendering(&$header) {

		// Example:
		//$header = "your header";

	}

	// Page Data Rendered event
	function Page_DataRendered(&$footer) {

		// Example:
		//$footer = "your footer";

	}

	// Form Custom Validate event
	function Form_CustomValidate(&$CustomError) {

		// Return error message in CustomError
		return TRUE;
	}

	// ListOptions Load event
	function ListOptions_Load() {

		// Example:
		//$opt = &$this->ListOptions->Add("new");
		//$opt->Header = "xxx";
		//$opt->OnLeft = TRUE; // Link on left
		//$opt->MoveTo(0); // Move to first column

	}

	// ListOptions Rendered event
	function ListOptions_Rendered() {

		// Example: 
		//$this->ListOptions->Items["new"]->Body = "xxx";

	}
}
?>
<?php ew_Header(FALSE) ?>
<?php

// Create page object
if (!isset($tbl_doc_list)) $tbl_doc_list = new ctbl_doc_list();

// Page init
$tbl_doc_list->Page_Init();

// Page main
$tbl_doc_list->Page_Main();
?>
<?php include_once "header.php" ?>
<script type="text/javascript">

// Page object
var tbl_doc_list = new ew_Page("tbl_doc_list");
tbl_doc_list.PageID = "list"; // Page ID
var EW_PAGE_ID = tbl_doc_list.PageID; // For backward compatibility

// Form object
var ftbl_doclist = new ew_Form("ftbl_doclist");

// Form_CustomValidate event
ftbl_doclist.Form_CustomValidate =  
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }

// Use JavaScript validation or not
<?php if (EW_CLIENT_VALIDATE) { ?>
ftbl_doclist.ValidateRequired = true;
<?php } else { ?>
ftbl_doclist.ValidateRequired = false; 
<?php } ?>

// Dynamic selection lists
ftbl_doclist.Lists["x_subject_dept"] = {"LinkField":"x_dept_id","Ajax":null,"AutoFill":false,"DisplayFields":["x_dept_name","","",""],"ParentFields":[],"FilterFields":[],"Options":[]};
ftbl_doclist.Lists["x_subject_type"] = {"LinkField":"x_id","Ajax":null,"AutoFill":false,"DisplayFields":["x_subject_type_name","","",""],"ParentFields":[],"FilterFields":[],"Options":[]};
ftbl_doclist.Lists["x_subject_faculty"] = {"LinkField":"x_faculty_id","Ajax":null,"AutoFill":false,"DisplayFields":["x_faculty_name","","",""],"ParentFields":[],"FilterFields":[],"Options":[]};
ftbl_doclist.Lists["x_subject_general_faculty_id"] = {"LinkField":"x_faculty_id","Ajax":null,"AutoFill":false,"DisplayFields":["x_faculty_name","","",""],"ParentFields":[],"FilterFields":[],"Options":[]};

// Form object for search
var ftbl_doclistsrch = new ew_Form("ftbl_doclistsrch");
</script>
<script type="text/javascript">

// Write your client script here, no need to add script tags.
</script>
<?php
	$bSelectLimit = EW_SELECT_LIMIT;
	if ($bSelectLimit) {
		$tbl_doc_list->TotalRecs = $tbl_doc->SelectRecordCount();
	} else {
		if ($tbl_doc_list->Recordset = $tbl_doc_list->LoadRecordset())
			$tbl_doc_list->TotalRecs = $tbl_doc_list->Recordset->RecordCount();
	}
	$tbl_doc_list->StartRec = 1;
	if ($tbl_doc_list->DisplayRecs <= 0 || ($tbl_doc->Export <> "" && $tbl_doc->ExportAll)) // Display all records
		$tbl_doc_list->DisplayRecs = $tbl_doc_list->TotalRecs;
	if (!($tbl_doc->Export <> "" && $tbl_doc->ExportAll))
		$tbl_doc_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$tbl_doc_list->Recordset = $tbl_doc_list->LoadRecordset($tbl_doc_list->StartRec-1, $tbl_doc_list->DisplayRecs);
?>
<p style="white-space: nowrap;"><span id="ewPageCaption" class="ewTitle ewTableTitle"><?php echo $Language->Phrase("TblTypeTABLE") ?><?php echo $tbl_doc->TableCaption() ?>&nbsp;&nbsp;</span>
<?php $tbl_doc_list->ExportOptions->Render("body"); ?>
</p>
<?php if ($Security->IsLoggedIn()) { ?>
<?php if ($tbl_doc->Export == "" && $tbl_doc->CurrentAction == "") { ?>
<form name="ftbl_doclistsrch" id="ftbl_doclistsrch" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<a href="javascript:ftbl_doclistsrch.ToggleSearchPanel();" style="text-decoration: none;"><img id="ftbl_doclistsrch_SearchImage" src="phpimages/collapse.gif" alt="" width="9" height="9" style="border: 0;"></a><span class="phpmaker">&nbsp;<?php echo $Language->Phrase("Search") ?></span><br>
<div id="ftbl_doclistsrch_SearchPanel">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="tbl_doc">
<div class="ewBasicSearch">
<div id="xsr_1" class="ewRow">
	<input type="text" name="<?php echo EW_TABLE_BASIC_SEARCH ?>" id="<?php echo EW_TABLE_BASIC_SEARCH ?>" size="20" value="<?php echo ew_HtmlEncode($tbl_doc_list->BasicSearch->getKeyword()) ?>">
	<input type="submit" name="btnsubmit" id="btnsubmit" value="<?php echo ew_BtnCaption($Language->Phrase("QuickSearchBtn")) ?>">&nbsp;
	<a href="<?php echo $tbl_doc_list->PageUrl() ?>cmd=reset" id="a_ShowAll" class="ewLink"><?php echo $Language->Phrase("ShowAll") ?></a>&nbsp;
</div>
<div id="xsr_2" class="ewRow">
	<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="="<?php if ($tbl_doc_list->BasicSearch->getType() == "=") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("ExactPhrase") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="AND"<?php if ($tbl_doc_list->BasicSearch->getType() == "AND") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AllWord") ?></label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="OR"<?php if ($tbl_doc_list->BasicSearch->getType() == "OR") { ?> checked="checked"<?php } ?>><?php echo $Language->Phrase("AnyWord") ?></label>
</div>
</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $tbl_doc_list->ShowPageHeader(); ?>
<?php
$tbl_doc_list->ShowMessage();
?>
<br>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<form name="ftbl_doclist" id="ftbl_doclist" class="ewForm" action="" method="post">
<input type="hidden" name="t" value="tbl_doc">
<div id="gmp_tbl_doc" class="ewGridMiddlePanel">
<?php if ($tbl_doc_list->TotalRecs > 0) { ?>
<table id="tbl_tbl_doclist" class="ewTable ewTableSeparate">
<?php echo $tbl_doc->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="ewTableHeader">
<?php

// Render list options
$tbl_doc_list->RenderListOptions();

// Render list options (header, left)
$tbl_doc_list->ListOptions->Render("header", "left");
?>
<?php if ($tbl_doc->doc_id->Visible) { // doc_id ?>
	<?php if ($tbl_doc->SortUrl($tbl_doc->doc_id) == "") { ?>
		<td><span id="elh_tbl_doc_doc_id" class="tbl_doc_doc_id"><table class="ewTableHeaderBtn"><thead><tr><td><?php echo $tbl_doc->doc_id->FldCaption() ?></td></tr></thead></table></span></td>
	<?php } else { ?>
		<td><div onmousedown="ew_Sort(event,'<?php echo $tbl_doc->SortUrl($tbl_doc->doc_id) ?>',1);"><span id="elh_tbl_doc_doc_id" class="tbl_doc_doc_id">
			<table class="ewTableHeaderBtn"><thead><tr><td class="ewTableHeaderCaption"><?php echo $tbl_doc->doc_id->FldCaption() ?></td><td class="ewTableHeaderSort"><?php if ($tbl_doc->doc_id->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" alt="" style="border: 0;"><?php } elseif ($tbl_doc->doc_id->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" alt="" style="border: 0;"><?php } ?></td></tr></thead></table>
		</span></div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($tbl_doc->doc_url->Visible) { // doc_url ?>
	<?php if ($tbl_doc->SortUrl($tbl_doc->doc_url) == "") { ?>
		<td><span id="elh_tbl_doc_doc_url" class="tbl_doc_doc_url"><table class="ewTableHeaderBtn"><thead><tr><td><?php echo $tbl_doc->doc_url->FldCaption() ?></td></tr></thead></table></span></td>
	<?php } else { ?>
		<td><div onmousedown="ew_Sort(event,'<?php echo $tbl_doc->SortUrl($tbl_doc->doc_url) ?>',1);"><span id="elh_tbl_doc_doc_url" class="tbl_doc_doc_url">
			<table class="ewTableHeaderBtn"><thead><tr><td class="ewTableHeaderCaption"><?php echo $tbl_doc->doc_url->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td class="ewTableHeaderSort"><?php if ($tbl_doc->doc_url->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" alt="" style="border: 0;"><?php } elseif ($tbl_doc->doc_url->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" alt="" style="border: 0;"><?php } ?></td></tr></thead></table>
		</span></div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($tbl_doc->doc_name->Visible) { // doc_name ?>
	<?php if ($tbl_doc->SortUrl($tbl_doc->doc_name) == "") { ?>
		<td><span id="elh_tbl_doc_doc_name" class="tbl_doc_doc_name"><table class="ewTableHeaderBtn"><thead><tr><td><?php echo $tbl_doc->doc_name->FldCaption() ?></td></tr></thead></table></span></td>
	<?php } else { ?>
		<td><div onmousedown="ew_Sort(event,'<?php echo $tbl_doc->SortUrl($tbl_doc->doc_name) ?>',1);"><span id="elh_tbl_doc_doc_name" class="tbl_doc_doc_name">
			<table class="ewTableHeaderBtn"><thead><tr><td class="ewTableHeaderCaption"><?php echo $tbl_doc->doc_name->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td class="ewTableHeaderSort"><?php if ($tbl_doc->doc_name->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" alt="" style="border: 0;"><?php } elseif ($tbl_doc->doc_name->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" alt="" style="border: 0;"><?php } ?></td></tr></thead></table>
		</span></div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($tbl_doc->doc_scribd_id->Visible) { // doc_scribd_id ?>
	<?php if ($tbl_doc->SortUrl($tbl_doc->doc_scribd_id) == "") { ?>
		<td><span id="elh_tbl_doc_doc_scribd_id" class="tbl_doc_doc_scribd_id"><table class="ewTableHeaderBtn"><thead><tr><td><?php echo $tbl_doc->doc_scribd_id->FldCaption() ?></td></tr></thead></table></span></td>
	<?php } else { ?>
		<td><div onmousedown="ew_Sort(event,'<?php echo $tbl_doc->SortUrl($tbl_doc->doc_scribd_id) ?>',1);"><span id="elh_tbl_doc_doc_scribd_id" class="tbl_doc_doc_scribd_id">
			<table class="ewTableHeaderBtn"><thead><tr><td class="ewTableHeaderCaption"><?php echo $tbl_doc->doc_scribd_id->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td class="ewTableHeaderSort"><?php if ($tbl_doc->doc_scribd_id->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" alt="" style="border: 0;"><?php } elseif ($tbl_doc->doc_scribd_id->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" alt="" style="border: 0;"><?php } ?></td></tr></thead></table>
		</span></div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($tbl_doc->doc_description->Visible) { // doc_description ?>
	<?php if ($tbl_doc->SortUrl($tbl_doc->doc_description) == "") { ?>
		<td><span id="elh_tbl_doc_doc_description" class="tbl_doc_doc_description"><table class="ewTableHeaderBtn"><thead><tr><td><?php echo $tbl_doc->doc_description->FldCaption() ?></td></tr></thead></table></span></td>
	<?php } else { ?>
		<td><div onmousedown="ew_Sort(event,'<?php echo $tbl_doc->SortUrl($tbl_doc->doc_description) ?>',1);"><span id="elh_tbl_doc_doc_description" class="tbl_doc_doc_description">
			<table class="ewTableHeaderBtn"><thead><tr><td class="ewTableHeaderCaption"><?php echo $tbl_doc->doc_description->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td class="ewTableHeaderSort"><?php if ($tbl_doc->doc_description->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" alt="" style="border: 0;"><?php } elseif ($tbl_doc->doc_description->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" alt="" style="border: 0;"><?php } ?></td></tr></thead></table>
		</span></div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($tbl_doc->doc_title->Visible) { // doc_title ?>
	<?php if ($tbl_doc->SortUrl($tbl_doc->doc_title) == "") { ?>
		<td><span id="elh_tbl_doc_doc_title" class="tbl_doc_doc_title"><table class="ewTableHeaderBtn"><thead><tr><td><?php echo $tbl_doc->doc_title->FldCaption() ?></td></tr></thead></table></span></td>
	<?php } else { ?>
		<td><div onmousedown="ew_Sort(event,'<?php echo $tbl_doc->SortUrl($tbl_doc->doc_title) ?>',1);"><span id="elh_tbl_doc_doc_title" class="tbl_doc_doc_title">
			<table class="ewTableHeaderBtn"><thead><tr><td class="ewTableHeaderCaption"><?php echo $tbl_doc->doc_title->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td class="ewTableHeaderSort"><?php if ($tbl_doc->doc_title->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" alt="" style="border: 0;"><?php } elseif ($tbl_doc->doc_title->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" alt="" style="border: 0;"><?php } ?></td></tr></thead></table>
		</span></div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($tbl_doc->doc_status->Visible) { // doc_status ?>
	<?php if ($tbl_doc->SortUrl($tbl_doc->doc_status) == "") { ?>
		<td><span id="elh_tbl_doc_doc_status" class="tbl_doc_doc_status"><table class="ewTableHeaderBtn"><thead><tr><td><?php echo $tbl_doc->doc_status->FldCaption() ?></td></tr></thead></table></span></td>
	<?php } else { ?>
		<td><div onmousedown="ew_Sort(event,'<?php echo $tbl_doc->SortUrl($tbl_doc->doc_status) ?>',1);"><span id="elh_tbl_doc_doc_status" class="tbl_doc_doc_status">
			<table class="ewTableHeaderBtn"><thead><tr><td class="ewTableHeaderCaption"><?php echo $tbl_doc->doc_status->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td class="ewTableHeaderSort"><?php if ($tbl_doc->doc_status->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" alt="" style="border: 0;"><?php } elseif ($tbl_doc->doc_status->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" alt="" style="border: 0;"><?php } ?></td></tr></thead></table>
		</span></div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($tbl_doc->doc_author->Visible) { // doc_author ?>
	<?php if ($tbl_doc->SortUrl($tbl_doc->doc_author) == "") { ?>
		<td><span id="elh_tbl_doc_doc_author" class="tbl_doc_doc_author"><table class="ewTableHeaderBtn"><thead><tr><td><?php echo $tbl_doc->doc_author->FldCaption() ?></td></tr></thead></table></span></td>
	<?php } else { ?>
		<td><div onmousedown="ew_Sort(event,'<?php echo $tbl_doc->SortUrl($tbl_doc->doc_author) ?>',1);"><span id="elh_tbl_doc_doc_author" class="tbl_doc_doc_author">
			<table class="ewTableHeaderBtn"><thead><tr><td class="ewTableHeaderCaption"><?php echo $tbl_doc->doc_author->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td class="ewTableHeaderSort"><?php if ($tbl_doc->doc_author->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" alt="" style="border: 0;"><?php } elseif ($tbl_doc->doc_author->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" alt="" style="border: 0;"><?php } ?></td></tr></thead></table>
		</span></div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($tbl_doc->doc_type->Visible) { // doc_type ?>
	<?php if ($tbl_doc->SortUrl($tbl_doc->doc_type) == "") { ?>
		<td><span id="elh_tbl_doc_doc_type" class="tbl_doc_doc_type"><table class="ewTableHeaderBtn"><thead><tr><td><?php echo $tbl_doc->doc_type->FldCaption() ?></td></tr></thead></table></span></td>
	<?php } else { ?>
		<td><div onmousedown="ew_Sort(event,'<?php echo $tbl_doc->SortUrl($tbl_doc->doc_type) ?>',1);"><span id="elh_tbl_doc_doc_type" class="tbl_doc_doc_type">
			<table class="ewTableHeaderBtn"><thead><tr><td class="ewTableHeaderCaption"><?php echo $tbl_doc->doc_type->FldCaption() ?></td><td class="ewTableHeaderSort"><?php if ($tbl_doc->doc_type->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" alt="" style="border: 0;"><?php } elseif ($tbl_doc->doc_type->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" alt="" style="border: 0;"><?php } ?></td></tr></thead></table>
		</span></div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($tbl_doc->subject_dept->Visible) { // subject_dept ?>
	<?php if ($tbl_doc->SortUrl($tbl_doc->subject_dept) == "") { ?>
		<td><span id="elh_tbl_doc_subject_dept" class="tbl_doc_subject_dept"><table class="ewTableHeaderBtn"><thead><tr><td><?php echo $tbl_doc->subject_dept->FldCaption() ?></td></tr></thead></table></span></td>
	<?php } else { ?>
		<td><div onmousedown="ew_Sort(event,'<?php echo $tbl_doc->SortUrl($tbl_doc->subject_dept) ?>',1);"><span id="elh_tbl_doc_subject_dept" class="tbl_doc_subject_dept">
			<table class="ewTableHeaderBtn"><thead><tr><td class="ewTableHeaderCaption"><?php echo $tbl_doc->subject_dept->FldCaption() ?></td><td class="ewTableHeaderSort"><?php if ($tbl_doc->subject_dept->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" alt="" style="border: 0;"><?php } elseif ($tbl_doc->subject_dept->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" alt="" style="border: 0;"><?php } ?></td></tr></thead></table>
		</span></div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($tbl_doc->subject_type->Visible) { // subject_type ?>
	<?php if ($tbl_doc->SortUrl($tbl_doc->subject_type) == "") { ?>
		<td><span id="elh_tbl_doc_subject_type" class="tbl_doc_subject_type"><table class="ewTableHeaderBtn"><thead><tr><td><?php echo $tbl_doc->subject_type->FldCaption() ?></td></tr></thead></table></span></td>
	<?php } else { ?>
		<td><div onmousedown="ew_Sort(event,'<?php echo $tbl_doc->SortUrl($tbl_doc->subject_type) ?>',1);"><span id="elh_tbl_doc_subject_type" class="tbl_doc_subject_type">
			<table class="ewTableHeaderBtn"><thead><tr><td class="ewTableHeaderCaption"><?php echo $tbl_doc->subject_type->FldCaption() ?></td><td class="ewTableHeaderSort"><?php if ($tbl_doc->subject_type->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" alt="" style="border: 0;"><?php } elseif ($tbl_doc->subject_type->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" alt="" style="border: 0;"><?php } ?></td></tr></thead></table>
		</span></div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($tbl_doc->subject_faculty->Visible) { // subject_faculty ?>
	<?php if ($tbl_doc->SortUrl($tbl_doc->subject_faculty) == "") { ?>
		<td><span id="elh_tbl_doc_subject_faculty" class="tbl_doc_subject_faculty"><table class="ewTableHeaderBtn"><thead><tr><td><?php echo $tbl_doc->subject_faculty->FldCaption() ?></td></tr></thead></table></span></td>
	<?php } else { ?>
		<td><div onmousedown="ew_Sort(event,'<?php echo $tbl_doc->SortUrl($tbl_doc->subject_faculty) ?>',1);"><span id="elh_tbl_doc_subject_faculty" class="tbl_doc_subject_faculty">
			<table class="ewTableHeaderBtn"><thead><tr><td class="ewTableHeaderCaption"><?php echo $tbl_doc->subject_faculty->FldCaption() ?></td><td class="ewTableHeaderSort"><?php if ($tbl_doc->subject_faculty->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" alt="" style="border: 0;"><?php } elseif ($tbl_doc->subject_faculty->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" alt="" style="border: 0;"><?php } ?></td></tr></thead></table>
		</span></div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($tbl_doc->doc_publisher->Visible) { // doc_publisher ?>
	<?php if ($tbl_doc->SortUrl($tbl_doc->doc_publisher) == "") { ?>
		<td><span id="elh_tbl_doc_doc_publisher" class="tbl_doc_doc_publisher"><table class="ewTableHeaderBtn"><thead><tr><td><?php echo $tbl_doc->doc_publisher->FldCaption() ?></td></tr></thead></table></span></td>
	<?php } else { ?>
		<td><div onmousedown="ew_Sort(event,'<?php echo $tbl_doc->SortUrl($tbl_doc->doc_publisher) ?>',1);"><span id="elh_tbl_doc_doc_publisher" class="tbl_doc_doc_publisher">
			<table class="ewTableHeaderBtn"><thead><tr><td class="ewTableHeaderCaption"><?php echo $tbl_doc->doc_publisher->FldCaption() ?><?php echo $Language->Phrase("SrchLegend") ?></td><td class="ewTableHeaderSort"><?php if ($tbl_doc->doc_publisher->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" alt="" style="border: 0;"><?php } elseif ($tbl_doc->doc_publisher->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" alt="" style="border: 0;"><?php } ?></td></tr></thead></table>
		</span></div></td>		
	<?php } ?>
<?php } ?>		
<?php if ($tbl_doc->subject_general_faculty_id->Visible) { // subject_general_faculty_id ?>
	<?php if ($tbl_doc->SortUrl($tbl_doc->subject_general_faculty_id) == "") { ?>
		<td><span id="elh_tbl_doc_subject_general_faculty_id" class="tbl_doc_subject_general_faculty_id"><table class="ewTableHeaderBtn"><thead><tr><td><?php echo $tbl_doc->subject_general_faculty_id->FldCaption() ?></td></tr></thead></table></span></td>
	<?php } else { ?>
		<td><div onmousedown="ew_Sort(event,'<?php echo $tbl_doc->SortUrl($tbl_doc->subject_general_faculty_id) ?>',1);"><span id="elh_tbl_doc_subject_general_faculty_id" class="tbl_doc_subject_general_faculty_id">
			<table class="ewTableHeaderBtn"><thead><tr><td class="ewTableHeaderCaption"><?php echo $tbl_doc->subject_general_faculty_id->FldCaption() ?></td><td class="ewTableHeaderSort"><?php if ($tbl_doc->subject_general_faculty_id->getSort() == "ASC") { ?><img src="phpimages/sortup.gif" width="10" height="9" alt="" style="border: 0;"><?php } elseif ($tbl_doc->subject_general_faculty_id->getSort() == "DESC") { ?><img src="phpimages/sortdown.gif" width="10" height="9" alt="" style="border: 0;"><?php } ?></td></tr></thead></table>
		</span></div></td>		
	<?php } ?>
<?php } ?>		
<?php

// Render list options (header, right)
$tbl_doc_list->ListOptions->Render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($tbl_doc->ExportAll && $tbl_doc->Export <> "") {
	$tbl_doc_list->StopRec = $tbl_doc_list->TotalRecs;
} else {

	// Set the last record to display
	if ($tbl_doc_list->TotalRecs > $tbl_doc_list->StartRec + $tbl_doc_list->DisplayRecs - 1)
		$tbl_doc_list->StopRec = $tbl_doc_list->StartRec + $tbl_doc_list->DisplayRecs - 1;
	else
		$tbl_doc_list->StopRec = $tbl_doc_list->TotalRecs;
}
$tbl_doc_list->RecCnt = $tbl_doc_list->StartRec - 1;
if ($tbl_doc_list->Recordset && !$tbl_doc_list->Recordset->EOF) {
	$tbl_doc_list->Recordset->MoveFirst();
	if (!$bSelectLimit && $tbl_doc_list->StartRec > 1)
		$tbl_doc_list->Recordset->Move($tbl_doc_list->StartRec - 1);
} elseif (!$tbl_doc->AllowAddDeleteRow && $tbl_doc_list->StopRec == 0) {
	$tbl_doc_list->StopRec = $tbl_doc->GridAddRowCount;
}

// Initialize aggregate
$tbl_doc->RowType = EW_ROWTYPE_AGGREGATEINIT;
$tbl_doc->ResetAttrs();
$tbl_doc_list->RenderRow();
while ($tbl_doc_list->RecCnt < $tbl_doc_list->StopRec) {
	$tbl_doc_list->RecCnt++;
	if (intval($tbl_doc_list->RecCnt) >= intval($tbl_doc_list->StartRec)) {
		$tbl_doc_list->RowCnt++;

		// Set up key count
		$tbl_doc_list->KeyCount = $tbl_doc_list->RowIndex;

		// Init row class and style
		$tbl_doc->ResetAttrs();
		$tbl_doc->CssClass = "";
		if ($tbl_doc->CurrentAction == "gridadd") {
		} else {
			$tbl_doc_list->LoadRowValues($tbl_doc_list->Recordset); // Load row values
		}
		$tbl_doc->RowType = EW_ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$tbl_doc->RowAttrs = array_merge($tbl_doc->RowAttrs, array('data-rowindex'=>$tbl_doc_list->RowCnt, 'id'=>'r' . $tbl_doc_list->RowCnt . '_tbl_doc', 'data-rowtype'=>$tbl_doc->RowType));

		// Render row
		$tbl_doc_list->RenderRow();

		// Render list options
		$tbl_doc_list->RenderListOptions();
?>
	<tr<?php echo $tbl_doc->RowAttributes() ?>>
<?php

// Render list options (body, left)
$tbl_doc_list->ListOptions->Render("body", "left", $tbl_doc_list->RowCnt);
?>
	<?php if ($tbl_doc->doc_id->Visible) { // doc_id ?>
		<td<?php echo $tbl_doc->doc_id->CellAttributes() ?>><span id="el<?php echo $tbl_doc_list->RowCnt ?>_tbl_doc_doc_id" class="tbl_doc_doc_id">
<span<?php echo $tbl_doc->doc_id->ViewAttributes() ?>>
<?php echo $tbl_doc->doc_id->ListViewValue() ?></span>
</span></td>
	<?php } ?>
<a id="<?php echo $tbl_doc_list->PageObjName . "_row_" . $tbl_doc_list->RowCnt ?>"></a>
	<?php if ($tbl_doc->doc_url->Visible) { // doc_url ?>
		<td<?php echo $tbl_doc->doc_url->CellAttributes() ?>><span id="el<?php echo $tbl_doc_list->RowCnt ?>_tbl_doc_doc_url" class="tbl_doc_doc_url">
<span>
<?php if (!ew_EmptyStr($tbl_doc->doc_url->ListViewValue())) { ?><img src="<?php echo $tbl_doc->doc_url->ListViewValue() ?>" alt="" style="border: 0;"<?php echo $tbl_doc->doc_url->ViewAttributes() ?>><?php } ?></span>
</span></td>
	<?php } ?>
	<?php if ($tbl_doc->doc_name->Visible) { // doc_name ?>
		<td<?php echo $tbl_doc->doc_name->CellAttributes() ?>><span id="el<?php echo $tbl_doc_list->RowCnt ?>_tbl_doc_doc_name" class="tbl_doc_doc_name">
<span<?php echo $tbl_doc->doc_name->ViewAttributes() ?>>
<?php echo $tbl_doc->doc_name->ListViewValue() ?></span>
</span></td>
	<?php } ?>
	<?php if ($tbl_doc->doc_scribd_id->Visible) { // doc_scribd_id ?>
		<td<?php echo $tbl_doc->doc_scribd_id->CellAttributes() ?>><span id="el<?php echo $tbl_doc_list->RowCnt ?>_tbl_doc_doc_scribd_id" class="tbl_doc_doc_scribd_id">
<span<?php echo $tbl_doc->doc_scribd_id->ViewAttributes() ?>>
<?php echo $tbl_doc->doc_scribd_id->ListViewValue() ?></span>
</span></td>
	<?php } ?>
	<?php if ($tbl_doc->doc_description->Visible) { // doc_description ?>
		<td<?php echo $tbl_doc->doc_description->CellAttributes() ?>><span id="el<?php echo $tbl_doc_list->RowCnt ?>_tbl_doc_doc_description" class="tbl_doc_doc_description">
<span<?php echo $tbl_doc->doc_description->ViewAttributes() ?>>
<?php echo $tbl_doc->doc_description->ListViewValue() ?></span>
</span></td>
	<?php } ?>
	<?php if ($tbl_doc->doc_title->Visible) { // doc_title ?>
		<td<?php echo $tbl_doc->doc_title->CellAttributes() ?>><span id="el<?php echo $tbl_doc_list->RowCnt ?>_tbl_doc_doc_title" class="tbl_doc_doc_title">
<span<?php echo $tbl_doc->doc_title->ViewAttributes() ?>>
<?php echo $tbl_doc->doc_title->ListViewValue() ?></span>
</span></td>
	<?php } ?>
	<?php if ($tbl_doc->doc_status->Visible) { // doc_status ?>
		<td<?php echo $tbl_doc->doc_status->CellAttributes() ?>><span id="el<?php echo $tbl_doc_list->RowCnt ?>_tbl_doc_doc_status" class="tbl_doc_doc_status">
<span<?php echo $tbl_doc->doc_status->ViewAttributes() ?>>
<?php echo $tbl_doc->doc_status->ListViewValue() ?></span>
</span></td>
	<?php } ?>
	<?php if ($tbl_doc->doc_author->Visible) { // doc_author ?>
		<td<?php echo $tbl_doc->doc_author->CellAttributes() ?>><span id="el<?php echo $tbl_doc_list->RowCnt ?>_tbl_doc_doc_author" class="tbl_doc_doc_author">
<span<?php echo $tbl_doc->doc_author->ViewAttributes() ?>>
<?php echo $tbl_doc->doc_author->ListViewValue() ?></span>
</span></td>
	<?php } ?>
	<?php if ($tbl_doc->doc_type->Visible) { // doc_type ?>
		<td<?php echo $tbl_doc->doc_type->CellAttributes() ?>><span id="el<?php echo $tbl_doc_list->RowCnt ?>_tbl_doc_doc_type" class="tbl_doc_doc_type">
<span<?php echo $tbl_doc->doc_type->ViewAttributes() ?>>
<?php echo $tbl_doc->doc_type->ListViewValue() ?></span>
</span></td>
	<?php } ?>
	<?php if ($tbl_doc->subject_dept->Visible) { // subject_dept ?>
		<td<?php echo $tbl_doc->subject_dept->CellAttributes() ?>><span id="el<?php echo $tbl_doc_list->RowCnt ?>_tbl_doc_subject_dept" class="tbl_doc_subject_dept">
<span<?php echo $tbl_doc->subject_dept->ViewAttributes() ?>>
<?php echo $tbl_doc->subject_dept->ListViewValue() ?></span>
</span></td>
	<?php } ?>
	<?php if ($tbl_doc->subject_type->Visible) { // subject_type ?>
		<td<?php echo $tbl_doc->subject_type->CellAttributes() ?>><span id="el<?php echo $tbl_doc_list->RowCnt ?>_tbl_doc_subject_type" class="tbl_doc_subject_type">
<span<?php echo $tbl_doc->subject_type->ViewAttributes() ?>>
<?php echo $tbl_doc->subject_type->ListViewValue() ?></span>
</span></td>
	<?php } ?>
	<?php if ($tbl_doc->subject_faculty->Visible) { // subject_faculty ?>
		<td<?php echo $tbl_doc->subject_faculty->CellAttributes() ?>><span id="el<?php echo $tbl_doc_list->RowCnt ?>_tbl_doc_subject_faculty" class="tbl_doc_subject_faculty">
<span<?php echo $tbl_doc->subject_faculty->ViewAttributes() ?>>
<?php echo $tbl_doc->subject_faculty->ListViewValue() ?></span>
</span></td>
	<?php } ?>
	<?php if ($tbl_doc->doc_publisher->Visible) { // doc_publisher ?>
		<td<?php echo $tbl_doc->doc_publisher->CellAttributes() ?>><span id="el<?php echo $tbl_doc_list->RowCnt ?>_tbl_doc_doc_publisher" class="tbl_doc_doc_publisher">
<span<?php echo $tbl_doc->doc_publisher->ViewAttributes() ?>>
<?php echo $tbl_doc->doc_publisher->ListViewValue() ?></span>
</span></td>
	<?php } ?>
	<?php if ($tbl_doc->subject_general_faculty_id->Visible) { // subject_general_faculty_id ?>
		<td<?php echo $tbl_doc->subject_general_faculty_id->CellAttributes() ?>><span id="el<?php echo $tbl_doc_list->RowCnt ?>_tbl_doc_subject_general_faculty_id" class="tbl_doc_subject_general_faculty_id">
<span<?php echo $tbl_doc->subject_general_faculty_id->ViewAttributes() ?>>
<?php echo $tbl_doc->subject_general_faculty_id->ListViewValue() ?></span>
</span></td>
	<?php } ?>
<?php

// Render list options (body, right)
$tbl_doc_list->ListOptions->Render("body", "right", $tbl_doc_list->RowCnt);
?>
	</tr>
<?php
	}
	if ($tbl_doc->CurrentAction <> "gridadd")
		$tbl_doc_list->Recordset->MoveNext();
}
?>
</tbody>
</table>
<?php } ?>
<?php if ($tbl_doc->CurrentAction == "") { ?>
<input type="hidden" name="a_list" id="a_list" value="">
<?php } ?>
</div>
</form>
<?php

// Close recordset
if ($tbl_doc_list->Recordset)
	$tbl_doc_list->Recordset->Close();
?>
<div class="ewGridLowerPanel">
<?php if ($tbl_doc->CurrentAction <> "gridadd" && $tbl_doc->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table class="ewPager"><tr><td>
<?php if (!isset($tbl_doc_list->Pager)) $tbl_doc_list->Pager = new cPrevNextPager($tbl_doc_list->StartRec, $tbl_doc_list->DisplayRecs, $tbl_doc_list->TotalRecs) ?>
<?php if ($tbl_doc_list->Pager->RecordCount > 0) { ?>
	<table cellspacing="0" class="ewStdTable"><tbody><tr><td><span class="phpmaker"><?php echo $Language->Phrase("Page") ?>&nbsp;</span></td>
<!--first page button-->
	<?php if ($tbl_doc_list->Pager->FirstButton->Enabled) { ?>
	<td><a href="<?php echo $tbl_doc_list->PageUrl() ?>start=<?php echo $tbl_doc_list->Pager->FirstButton->Start ?>"><img src="phpimages/first.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" style="border: 0;"></a></td>
	<?php } else { ?>
	<td><img src="phpimages/firstdisab.gif" alt="<?php echo $Language->Phrase("PagerFirst") ?>" width="16" height="16" style="border: 0;"></td>
	<?php } ?>
<!--previous page button-->
	<?php if ($tbl_doc_list->Pager->PrevButton->Enabled) { ?>
	<td><a href="<?php echo $tbl_doc_list->PageUrl() ?>start=<?php echo $tbl_doc_list->Pager->PrevButton->Start ?>"><img src="phpimages/prev.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" style="border: 0;"></a></td>
	<?php } else { ?>
	<td><img src="phpimages/prevdisab.gif" alt="<?php echo $Language->Phrase("PagerPrevious") ?>" width="16" height="16" style="border: 0;"></td>
	<?php } ?>
<!--current page number-->
	<td><input type="text" name="<?php echo EW_TABLE_PAGE_NO ?>" id="<?php echo EW_TABLE_PAGE_NO ?>" value="<?php echo $tbl_doc_list->Pager->CurrentPage ?>" size="4"></td>
<!--next page button-->
	<?php if ($tbl_doc_list->Pager->NextButton->Enabled) { ?>
	<td><a href="<?php echo $tbl_doc_list->PageUrl() ?>start=<?php echo $tbl_doc_list->Pager->NextButton->Start ?>"><img src="phpimages/next.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" style="border: 0;"></a></td>	
	<?php } else { ?>
	<td><img src="phpimages/nextdisab.gif" alt="<?php echo $Language->Phrase("PagerNext") ?>" width="16" height="16" style="border: 0;"></td>
	<?php } ?>
<!--last page button-->
	<?php if ($tbl_doc_list->Pager->LastButton->Enabled) { ?>
	<td><a href="<?php echo $tbl_doc_list->PageUrl() ?>start=<?php echo $tbl_doc_list->Pager->LastButton->Start ?>"><img src="phpimages/last.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" style="border: 0;"></a></td>	
	<?php } else { ?>
	<td><img src="phpimages/lastdisab.gif" alt="<?php echo $Language->Phrase("PagerLast") ?>" width="16" height="16" style="border: 0;"></td>
	<?php } ?>
	<td><span class="phpmaker">&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $tbl_doc_list->Pager->PageCount ?></span></td>
	</tr></tbody></table>
	</td>	
	<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
	<td>
	<span class="phpmaker"><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $tbl_doc_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $tbl_doc_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $tbl_doc_list->Pager->RecordCount ?></span>
<?php } else { ?>
	<?php if ($tbl_doc_list->SearchWhere == "0=101") { ?>
	<span class="phpmaker"><?php echo $Language->Phrase("EnterSearchCriteria") ?></span>
	<?php } else { ?>
	<span class="phpmaker"><?php echo $Language->Phrase("NoRecord") ?></span>
	<?php } ?>
<?php } ?>
	</td>
</tr></table>
</form>
<?php } ?>
<span class="phpmaker">
<?php if ($Security->IsLoggedIn()) { ?>
<?php if ($tbl_doc_list->AddUrl <> "") { ?>
<a class="ewGridLink" href="<?php echo $tbl_doc_list->AddUrl ?>"><?php echo $Language->Phrase("AddLink") ?></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
</div>
</td></tr></table>
<script type="text/javascript">
ftbl_doclistsrch.Init();
ftbl_doclist.Init();
</script>
<?php
$tbl_doc_list->ShowPageFooter();
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
?>
<script type="text/javascript">

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$tbl_doc_list->Page_Terminate();
?>
