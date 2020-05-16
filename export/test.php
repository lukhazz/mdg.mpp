<!DOCTYPE html>
<html>
<head>
        <meta charset="UTF-8">
        <title>HTML table Export</title>

        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
		<meta name="description" content="Export HTLM Table in different formats like JSON, XML, PDF, PNG, XLS, Word, Powerpoint">
		<meta name="keywords" content="Extract HTML Table, Export Html Table, table2json,table2csv,table2xml,table2pdf,table2png,table2word,table2powerpoint,table2sql, table jquery plugin, ngiriraj" />
		<meta name="google-site-verification" content="v-yNd2u5KPjFM1uQk2L2ntXc_5O4HXTqkBSDDZ85-4M" />
		

    </head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>

<script type="text/javascript" src="tableExport.js" ></script>
<script type="text/javascript" src="jquery.base64.js" ></script>
<script type="text/javascript" src="html2canvas.js" ></script>
<script type="text/javascript" src="jspdf/libs/sprintf.js" ></script>
<script type="text/javascript" src="jspdf/jspdf.js" ></script>
<script type="text/javascript" src="jspdf/libs/base64.js" ></script>

<body>
	<div class="page">



<table id="testTable" summary="Code page support in different versions of MS Windows." rules="groups" frame="hsides" border="2"><caption>CODE-PAGE SUPPORT IN MICROSOFT WINDOWS</caption><colgroup align="center"></colgroup><colgroup align="left"></colgroup><colgroup span="2" align="center"></colgroup><colgroup span="3" align="center"></colgroup><thead valign="top"><tr><th>Code-Page<br>ID</th><th>Name</th><th>ACP</th><th>OEMCP</th><th>Windows<br>NT 3.1</th><th>Windows<br>NT 3.51</th><th>Windows<br>95</th></tr></thead><tbody><tr><td>1200</td><td style="background-color: #00f; color: #fff">Unicode (BMP of ISO/IEC-10646)</td><td></td><td></td><td>X</td><td>X</td><td>*</td></tr><tr><td>1250</td><td style="font-weight: bold">Windows 3.1 Eastern European</td><td>X</td><td></td><td>X</td><td>X</td><td>X</td></tr><tr><td>1251</td><td>Windows 3.1 Cyrillic</td><td>X</td><td></td><td>X</td><td>X</td><td>X</td></tr><tr><td>1252</td><td>Windows 3.1 US (ANSI)</td><td>X</td><td></td><td>X</td><td>X</td><td>X</td></tr><tr><td>1253</td><td>Windows 3.1 Greek</td><td>X</td><td></td><td>X</td><td>X</td><td>X</td></tr><tr><td>1254</td><td>Windows 3.1 Turkish</td><td>X</td><td></td><td>X</td><td>X</td><td>X</td></tr><tr><td>1255</td><td>Hebrew</td><td>X</td><td></td><td></td><td></td><td>X</td></tr><tr><td>1256</td><td>Arabic</td><td>X</td><td></td><td></td><td></td><td>X</td></tr><tr><td>1257</td><td>Baltic</td><td>X</td><td></td><td></td><td></td><td>X</td></tr><tr><td>1361</td><td>Korean (Johab)</td><td>X</td><td></td><td></td><td>**</td><td>X</td></tr></tbody><tbody><tr><td>437</td><td>MS-DOS United States</td><td></td><td>X</td><td>X</td><td>X</td><td>X</td></tr><tr><td>708</td><td>Arabic (ASMO 708)</td><td></td><td>X</td><td></td><td></td><td>X</td></tr><tr><td>709</td><td>Arabic (ASMO 449+, BCON V4)</td><td></td><td>X</td><td></td><td></td><td>X</td></tr><tr><td>710</td><td>Arabic (Transparent Arabic)</td><td></td><td>X</td><td></td><td></td><td>X</td></tr><tr><td>720</td><td>Arabic (Transparent ASMO)</td><td></td><td>X</td><td></td><td></td><td>X</td></tr></tbody></table>


	
		<table id="customers" class="table table-striped" >
			<thead>			
				<tr class='warning'>
					<th>Country</th>
					<th>Population</th>
					<th>Date</th>
					<th>%ge</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Chinna</td>
					<td>1,363,480,000</td>
					<td>March 24, 2014</td>
					<td>19.1</td>
				</tr>
				<tr>
					<td>India</td>
					<td>1,241,900,000</td>
					<td>March 24, 2014</td>
					<td>17.4</td>
				</tr>
				<tr>
					<td>United States</td>
					<td>317,746,000</td>
					<td>March 24, 2014</td>
					<td>4.44</td>
				</tr>
				<tr>
					<td>Indonesia</td>
					<td>249,866,000</td>
					<td>July 1, 2013</td>
					<td>3.49</td>
				</tr>
				<tr>
					<td>Brazil</td>
					<td>201,032,714</td>
					<td>July 1, 2013</td>
					<td>2.81</td>
				</tr>
			</tbody>
		</table> 
		<ul class="dropdown-menu " role="menu">
								<li><a href="#" onclick="$('#customers').tableExport({type:'json',escape:'false'});"> <img src="icons/json.png" width="24px"> JSON</a></li>
								<li><a href="#" onclick="$('#customers').tableExport({type:'json',escape:'false',ignoreColumn:'[2,3]'});"> <img src="icons/json.png" width="24px"> JSON (ignoreColumn)</a></li>
								<li><a href="#" onclick="$('#customers').tableExport({type:'json',escape:'true'});"> <img src="icons/json.png" width="24px"> JSON (with Escape)</a></li>
								<li class="divider"></li>
								<li><a href="#" onclick="$('#customers').tableExport({type:'xml',escape:'false'});"> <img src="icons/xml.png" width="24px"> XML</a></li>
								<li><a href="#" onclick="$('#customers').tableExport({type:'sql'});"> <img src="icons/sql.png" width="24px"> SQL</a></li>
								<li class="divider"></li>
								<li><a href="#" onclick="$('#customers').tableExport({type:'csv',escape:'false'});"> <img src="icons/csv.png" width="24px"> CSV</a></li>
								<li><a href="#" onclick="$('#customers').tableExport({type:'txt',escape:'false'});"> <img src="icons/txt.png" width="24px"> TXT</a></li>
								<li class="divider"></li>				
								
								<li><a href="#" onclick="$('#customers').tableExport({type:'excel',escape:'false'});"> <img src="icons/xls.png" width="24px"> XLS</a></li>
								<li><a href="#" onclick="$('#customers').tableExport({type:'doc',escape:'false'});"> <img src="icons/word.png" width="24px"> Word</a></li>
								<li><a href="#" onclick="$('#customers').tableExport({type:'powerpoint',escape:'false'});"> <img src="icons/ppt.png" width="24px"> PowerPoint</a></li>
								<li class="divider"></li>
								<li><a href="#" onclick="$('#customers').tableExport({type:'png',escape:'false'});"> <img src="icons/png.png" width="24px"> PNG</a></li>
								<li><a href="#" onclick="$('#customers').tableExport({type:'pdf',pdfFontSize:'7',escape:'false'});"> <img src="icons/pdf.png" width="24px"> PDF</a></li>
								
								
		</ul>
		<button onclick="$('#customers').tableExport({type:'excel',escape:'false'});">EXCEL</button>
					<button onclick="$('#customers').tableExport({type:'csv',escape:'false'});">CSV</button>
					<button onclick="$('#customers').tableExport({type:'pdf',escape:'false'});">PDF</button>
					<br>
					<br>

	</div>
</body>
</html>
