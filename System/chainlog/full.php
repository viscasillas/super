<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>FeedEk Jquery RSS/ATOM Feed Plugin Demo</title>

<script type="text/javascript" src="System/chainlog/jquery-1.6.2.min.js"></script>
<script type="text/javascript" src="System/chainlog/FeedEk.js"></script>
 
<script type="text/javascript" >
$(document).ready(function(){
  
  $('#txtUrl').val('https://github.com/viscasillas/super/commits/master.atom');
  $('#txtCount').val('5');
  $('#chkDate').attr('checked','checked');
  $('#chkDesc').attr('checked','checked');
  
  
   $('#divRss').FeedEk({
   FeedUrl : 'https://github.com/viscasillas/super/commits/master.atom',
   MaxCount : 5,
   ShowDesc : true,
   ShowPubDate: true
  });
  
});

function OpenBox()
{
$('#divSrc').toggle();
}
function changeFeedUrl()
{
var cnt= 5;
var showDate=new Boolean();
showDate=true;

var showDescription=new Boolean();
showDescription=true;

if($('#txtCount').val()!="") cnt=parseInt($('#txtCount').val());
if (! $('#chkDate').attr('checked')) showDate=false;
if (! $('#chkDesc').attr('checked')) showDescription=false;

 $('#divRss').FeedEk({
   FeedUrl : $('#txtUrl').val(),
   MaxCount : cnt,
   ShowDesc : showDescription,
   ShowPubDate: showDate
  });
}
</script>

<style>
body{
font:13px tahoma,Geneva,sans-serif; 
}

#divRss {
    width:800px;
    padding: 0px 3px 3px 5px;
	background-color:#FFF;
	margin-top:3px;
}

.ItemTitle{
 font-weight:bold;
 margin:5px 0px 0px 0px;
 padding-top:3px;
}
.ItemTitle a{ color:#4EBAFF; text-decoration:none }
.ItemTitle a:hover{ text-decoration:underline }

.ItemContent{
 padding:1px 3px 3px 3px;
 border-bottom:1px solid #D3CAD7;
 color:#3E3E3E;
}
.ItemDate{
font-size:11px;
color:#AAA;
}

#divSrc
{
color:#888888;
font-size:11px;
width:460px;
}
.containerOfRss {
	height:80%;
	overflow:scroll;
	overflow-x:hidden;
	position:fixed;
	top:110px;
	border:1px solid #D3CAD7;
}
</style>
</head>
<body>
<span style="font-family:arial;font-size:20px;color:#333;font-style:italic;">Super chainlog.</span>
<div class="containerOfRss">
<div id="divRss"></div>
</div>
</body>

</html>
