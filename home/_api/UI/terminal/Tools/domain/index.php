<!doctype html>

<html>
<head><title>Search Availability of Domain...</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="style.css">
	
</head>

<body>

<div class="container">
	<div class="row">
        <div class="col-md-6">
    		<h3>Check Domain Name Availability</h3>
			<form action="" method="GET">
            <div id="custom-search-input">
                <div class="input-group col-md-24" >
                    <input type="text" name="domain" class="form-control input-lg" placeholder="Example.com or Example.in etc." />
					<span class="input-group-btn">
                        <button type="submit" class="glyphicon glyphicon-search"></button>
                            
                        
                    </span>
                </div>
            </div>
			</form>
			<?php
 error_reporting(0);
 if(isset($_GET['domain'])){
	 $domain = $_GET['domain'];
	 $godaddycheck = 'https://uk.godaddy.com/domains/searchresults.aspx?checkAvail=1&tmskey=&domainToCheck='.$domain.'';
	 $namecomcheck = 'https://www.name.com/domain/search/'.$domain.'';
	 $registercomcheck = 'http://www.register.com/domain/search/wizard.rcmx?searchDomainName='.$domain.'&searchPath=Default&searchTlds=';
 if ( gethostbyname($domain) != $domain ) {
  echo "<h1>Already Registered!</h1>";
 }
 else {
  echo "<h3>$domain</h3><h2><br>Not Taken, you can register it.
  </h2>";
 }
 }
?>
        </div>
	</div>
</div>

</body>

</html>