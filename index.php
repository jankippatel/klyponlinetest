<?php
$errormsg="";
$msg="";
$list="";
$con=mysqli_connect("localhost","root","","movie");
if (mysqli_connect_errno())
  {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }


if(isset($_GET['search'])){
	$search=$_GET['search'];
	if(!empty($search)){		
		$sql="SELECT * FROM  `movie` WHERE  `name` REGEXP '".$search."'";
		$result=mysqli_query($con,$sql);
		if (mysqli_num_rows($result) == 0) {
			$list=" No record found";
		}else{
			$msg="Search Results for : '".$search."'";
			while ($row=mysqli_fetch_assoc($result))  
			{ 
				extract($row);
				$replace_string='<span style="padding: 5px 0px;background-color:'.$search.'">'.$search.'</span>';
				$name=str_ireplace($search,$replace_string,$name);
				$list.='<div style="margin-top: 0;padding-bottom: 10px;      border-bottom: 1px solid #d6d6d6;      margin-bottom: 10px;float: left;width: 100%;">
                        <span style="float: left;   margin-top: 17px;display: inline-block;      min-width: 50px;      padding-bottom: 1px;      height: 16px;      margin-bottom: 3px;      width: 16px;display: inline-block;      text-align: center;      width: 130px;">'.($percentage=="Not score yet" ? $percentage:$percentage. "").'</span>                        
                        <div style="display: block;      padding-top: 10px;width: initial;vertical-align: top;zoom: 1;      overflow: hidden;">
                            <div style="margin-top: 0;      margin-bottom: 5px;font-weight: bold;">                                							
								'.$name.'
                                <span class="movie_year" style="font-weight: normal;color: black;"> ('.$year.')</span>
                            </div>
                            
                        </div>
                    </div>';
			}  		
		}
	}else{
		$errormsg="Please Enter Searching Keywords";
	}
}else{
	$msg="List all movies";

	$sql="SELECT * FROM  `movie`";
		$result=mysqli_query($con,$sql);
		if (mysqli_num_rows($result) == 0) {
			$list=" No record found";
		}else{			
			while ($row=mysqli_fetch_assoc($result))  
			{ 

	
			extract($row);
			$list.='<div style="margin-top: 0;padding-bottom: 10px;      border-bottom: 1px solid #d6d6d6;      margin-bottom: 10px;float: left;width: 100%;">
					<span style="float: left;   margin-top: 17px;display: inline-block;      min-width: 50px;      padding-bottom: 1px;      height: 16px;      margin-bottom: 3px;      width: 16px;display: inline-block;      text-align: center;      width: 130px;">'.$percentage.'</span>                        
					<div style="display: block;      padding-top: 10px;width: initial;vertical-align: top;zoom: 1;      overflow: hidden;">
						<div style="margin-top: 0;      margin-bottom: 5px;font-weight: bold;">
							<a href="#" style="color: black;text-decoration: none;">'.$name.'</a>
							<span class="movie_year" style="font-weight: normal;      color: black;"> ('.$year.')</span>
						</div>						
					</div>
				</div>';
		} 		
	}
}
?>


<html>
<head>
    <title>
        Search Movie
    </title>
</head>
<body style="   margin: 0px;padding: 0px;color: #333;      background-color: #EEEEEE;      position: relative;      -webkit-font-smoothing: antialiased;">
    <div style="width: 1100px;background-color: white;padding: 0px;margin: 0 auto;">
        <div style="font-family: &quot;Source Sans Pro&quot;,&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;      background-color: #3A9425;      border-radius: 0;      margin: 0;float: left;width: 100%;">
            <div style="position: relative;      min-height: 1px;      padding-left: 10px;      padding-right: 10px;float: left;">

                <form method="get">
                    <div style="margin-bottom: 10px;      margin-top: 31px;display: inline-block;float: left;">
                        <div style="border-radius: 5px;            position: static;float: left;">
                            <input name="search" type="text" class="form-control ui-autocomplete-input" placeholder="Search movies, TV, actors, more..." id="search-term" style="border: none;      box-shadow: none;width: 300px;height: 34px;      border-top-right-radius: 0;display: table-cell;position: relative;      z-index: 2;      float: left;            margin-bottom: 0;height: 34px;      padding: 6px 12px;      font-size: 16px;      line-height: 1.25;      color: #555555;      background-color: #fff;      background-image: none;      border: 1px solid #ccc;      border-radius: 5px;      -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);      box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);      -webkit-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;      -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;      transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;" value="<?php echo (isset($_GET['search'])?$_GET['search']:"");?>">
                            <div style="border-radius: -18;position: relative;      color: #333;background-color: #fff;      border-color: #ccc;      white-space: nowrap;      white-space: nowrap;      vertical-align: middle;margin-left: 10px;float: left;">
                                <button type="submit" style="color: #333;      background-color: #fff;      border-color: #ccc;display: inline-block;      margin-bottom: 0;      font-weight: normal;      text-align: center;      vertical-align: middle;      touch-action: manipulation;      cursor: pointer;      background-image: none;      border: 1px solid transparent;      white-space: nowrap;      padding: 5px 12px;      font-size: 16px;      line-height: 1.25;      border-radius: 5px;      -webkit-user-select: none;      -moz-user-select: none;      -ms-user-select: none;      user-select: none;-webkit-appearance: button;">
                                    Search
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div style="font-family: &quot;Source Sans Pro&quot;,&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;            border-radius: 0;            float: left;      width: 100%;background-color: white;      padding: 0px;      margin: 0 auto;">
            <div style="padding-left: 20px;      padding-right: 20px;">
                <h1><?php echo $msg;?></h1>
				<?php echo $errormsg;?>
                <div>
					<?php echo $list;?>
                </div>
            </div>
        </div>
		<div style="   background-color: #343434;      padding: 10px;      text-align: center;      clear: both;">  </div>
		<div style="background-color: black;      color: white;      font-size: 14px;padding: 30px;"></div>
    </div>
</body>
</html>