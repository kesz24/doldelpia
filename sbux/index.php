<!DOCTYPE html>
<html lang="en" ng-app="materialism">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Sutor Rinaldi">
  <title>SbuxCard Account Checker</title>
  <meta name="msapplication-TileColor" content="#9f00a7">
  <meta name="msapplication-TileImage" content="img/favicon/mstile-144x144.png">
  <meta name="msapplication-config" content="img/favicon/browserconfig.xml">
  <meta name="theme-color" content="#ffffff">

  <link rel="manifest" href="img/favicon/manifest.json">
  <link rel="shortcut icon" href="img/favicon/favicon.ico">
  
  <link rel="stylesheet" href="css/font-awesome.css">
  <link rel="stylesheet" type="text/css" href="css/dist/sweetalert.css">
  <link href="css/vendors.min.6bd42a2130671ed8d487.css" rel="stylesheet" />
  <link href="css/styles.min.e2bcd92f679082a0082f.css" rel="stylesheet" />

  <script type="text/javascript" src="css/dist/sweetalert.min.js"></script>
 
  <style type="text/css">
    @import url('https://fonts.googleapis.com/css?family=Pontano+Sans');
    h1.logo {
      text-align: center;
      font-size: 56px;
      font-family: 'Pontano Sans', sans-serif;
    }
    p.logotxt{
      text-align: center;
      font-size: 16px;
      font-family: 'Pontano Sans', sans-serif;
    }
  </style>
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body>  
       <center></center> <a href="https://check-oktamariza.c9users.io" target="_blank">
        <h1 class="logo noselect">RegardoProject</h1>
      </a>
        <p class="logotxt noselect">All checkers and tool collection</p>
</center>
        <center>  
       [<a href="../../"><span class="label label-primary">Back Home</span></a>]  
        
        </center>
        <br>
<div class="container">
<div class="row">
     <div class="col-lg-10" style="margin: 0px auto;float:none;">
        <div class="panel panel-info">
            <div class="panel-body pointer">
                <div class="row">
                    <div class="col-md-10">
                        
                        <p class="upgdText noselect"<b>Note: </b>Check login, Info.</p>
                  
                    
                    </div>
                </div>
            </div>
        </div>
     </div>
</div>
<div class="row">
	 <div class="col-lg-10" style="margin: 0px auto;float:none;">
      <div class="card bordered small">
        <div class="card-header">
          <div class="card-title">
            <i class="fa fa-folder-open red-text"></i> SbuxCard Account Checker</div>
        </div>
        <div class="card-content">
        <div class="row">
        <div class="col-md-12">
        <textarea name="mailpass" id="mailpass" placeholder="ex: support@regardoproject.com|Passw0rd" class="form-control" rows="7"></textarea><br>
        <input type="hidden" name="delim" id="delim" style="text-align: center;display:inline;width: 40px;margin-right: 8px;padding: 4px;" value="|" type="text" class="form-control">
				<button type="button" class="btn btn-default" id="submit">Submit</button>
				<button type="button" class="btn btn-danger" id="stop">Stop</button>&nbsp;
				<img id="loading">
				<span id="checkStatus" style="color:gray"></span>
        </div>
        </div>
        </div>
     </div> 
    </div>
    </div>
      <div class="row" id="result" style="display: none;">
			<div class="col-lg-10" style="margin: 0px auto;float:none;">
				<div class="panel panel-default">
					<div class="panel-heading">
						LIVE&nbsp;<span class="label label-success" id="acc_live_count" style="color:white">0</span>
            <span class="pull-right">
						<button type="button" onclick="selectText('acc_live')" class="btn btn-xs btn-success">Select All</button>
            <button type="button" id="live" class="btn btn-xs btn-danger">Hide</button>
            </span>
					</div>	
					<div class="panel-body">
						<div id="acc_live"></div>
					</div>
				</div>
			</div>
            <div class="col-lg-10" style="margin: 0px auto;float:none;">
				<div class="panel panel-default">
					<div class="panel-heading">
						DIE&nbsp;<span class="label label-danger" id="acc_die_count" style="color:white">0</span>
            <span class="pull-right">
            <button type="button" id="die" class="btn btn-xs btn-danger">Hide</button>
            </span>
					</div>	
					<div class="panel-body">
						<div id="acc_die"></div>
					</div>
				</div>
			</div>
			<div class="col-lg-10" style="margin: 0px auto;float:none;">
				<div class="panel panel-default">
					<div class="panel-heading">
						WRONG/UNCHECK&nbsp;<span class="label label-warning" id="wrong_count" style="color:white">0</span>
            <span class="pull-right">
            <button type="button" id="wrong-hide" class="btn btn-xs btn-danger">Hide</button>
            </span>
					</div>	
					<div class="panel-body">
						<div id="wrong"></div>
					</div>
				</div>
			</div>
		</div>
	</div>				
  </div>
  
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/jquery-ui.js"></script>
  <script type="text/javascript" src="js/jquery.chk.js"></script>
  <script type="text/javascript">
    function selectText(containerid) {
    if (document.selection) {
      var range = document.body.createTextRange();
      range.moveToElementText(document.getElementById(containerid));
      range.select();
      } else if (window.getSelection()) {
        var range = document.createRange();
        range.selectNode(document.getElementById(containerid));
        window.getSelection().removeAllRanges();
        window.getSelection().addRange(range);
      }
    }
  </script>
  <script type="text/javascript">
    $(window).on('beforeunload', function(e){
    return "Please save your data before leaving.";
  });
  </script>
  <script type="text/javascript">
                    $(document).ready(function() {
                      $('#live').click(function() {
                        $('#acc_live').toggle(1000);
                      });
                      $('#die').click(function() {
                        $('#acc_die').toggle(1000);
                      });
                      $('#wrong-hide').click(function() {
                        $('#wrong').toggle(1000);
                      });
                    });
                  </script>
</body>
</html>
