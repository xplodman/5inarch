<!DOCTYPE html>
<html lang="en">
	<head>
		<?php session_start();
			if (isset($_SESSION['authenticate']))
			{
			 if(time() - $_SESSION['timestamp'] > 900) { //subtract new timestamp from the old one
				echo"<script>alert('15 Minutes over!');</script>";
				unset($_SESSION['authenticate']);
					header('Location: assets/redi/logout.php');
			} else {
				$_SESSION['timestamp'] = time(); //set new timestamp
					}}
		?>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8">
		<title>الإيصالات - 5inArch</title>

		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />

		<!-- page specific plugin styles -->
		<link rel="stylesheet" href="assets/css/jquery-ui.custom.min.css" />
		<link rel="stylesheet" href="assets/css/chosen.min.css" />
		<link rel="stylesheet" href="assets/css/bootstrap-datepicker3.min.css" />
		<link rel="stylesheet" href="assets/css/bootstrap-timepicker.min.css" />
		<link rel="stylesheet" href="assets/css/daterangepicker.min.css" />
		<link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css" />
		<link rel="stylesheet" href="assets/css/bootstrap-colorpicker.min.css" />

		<!-- text fonts -->
		<link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
		<link rel="stylesheet" href="assets/css/ace-skins.min.css" />
		<link rel="stylesheet" href="assets/css/ace-rtl.min.css" />

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="assets/js/ace-extra.min.js"></script>

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
		

	</head>

	<body class="no-skin">
		<div id="navbar" class="navbar navbar-default          ace-save-state">
			<div class="navbar-container ace-save-state" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<div class="navbar-header pull-left">
					<a href="index.php" class="navbar-brand">
						<small>
							<i class="fa fa-graduation-cap"></i>
							5inArch
						</small>
					</a>
				</div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						<li class="light-blue dropdown-modal">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="assets/images/avatars/user.jpg" alt="Admin's Photo" />
								<span class="user-info">
									<small>Welcome,</small>
									<?php 
										require 'assets/redi/sqlcon.php';
										if (isset($_SESSION['authenticate']))
											{	
												$authenticate=$_SESSION['authenticate'];
												$username=$_SESSION['username'];
												if($authenticate = "true"):
													echo "Administrator";
												endif;
											}
										else
											{echo "User";};
										?>
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li>
									<a href="assets/redi/logout.php">
										<i class="ace-icon fa fa-power-off"></i>
										Logout
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div><!-- /.navbar-container -->
		</div>

		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

			<div id="sidebar" class="sidebar                  responsive                    ace-save-state">
				<script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
				</script>
				<ul class="nav nav-list">
					<li>
						<a href="index.php">
							<i class="menu-icon fa fa-home"></i>
							<span class="menu-text"> الصفحة الرئيسية </span>
						</a>
						<b class="arrow"></b>
					</li>
					<li>
						<a href="professors.php">
							<i class="menu-icon fa fa-hand-paper-o"></i>
							<span class="menu-text">المحاضرين </span>
						</a>
						<b class="arrow"></b>
					</li>
					<li>
						<a href="students.php">
							<i class="menu-icon fa fa-users"></i>
							<span class="menu-text">الطلبة </span>
						</a>
						<b class="arrow"></b>
					</li>
					<li>
						<a href="materials.php">
							<i class="menu-icon fa fa-sticky-note-o"></i>
							<span class="menu-text">المواد </span>
						</a>
						<b class="arrow"></b>
					</li>
					<li class="active">
						<a href="receipts.php">
							<i class="menu-icon fa fa-money"></i>
							<span class="menu-text">الإيصالات </span>
						</a>
						<b class="arrow"></b>
					</li>
					<?php 
						require 'assets/redi/sqlcon.php';
						if (isset($_SESSION['authenticate']))
							{	
								$authenticate=$_SESSION['authenticate'];
								if($authenticate = "true"):
									?>
										<li>
											<a href="reports.php">
												<i class="menu-icon fa fa-line-chart"></i>
												<span class="menu-text">التقارير </span>
											</a>
											<b class="arrow"></b>
										</li>
									<?php
								endif;
							}
					?>
				</ul><!-- /.nav-list -->

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>
			</div>

			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="index.php">Home</a> / 
								<a href="Receipts.php">Receipts</a>
							</li>
						</ul><!-- /.breadcrumb -->
					</div>

					<div class="page-content">
						<div class="ace-settings-container" id="ace-settings-container">
							<div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
								<i class="ace-icon fa fa-cog bigger-130"></i>
							</div>

							<div class="ace-settings-box clearfix" id="ace-settings-box">
								<div class="pull-left width-50">
									<div class="ace-settings-item">
										<div class="pull-left">
											<select id="skin-colorpicker" class="hide">
												<option data-skin="no-skin" value="#438EB9">#438EB9</option>
												<option data-skin="skin-1" value="#222A2D">#222A2D</option>
												<option data-skin="skin-2" value="#C6487E">#C6487E</option>
												<option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
											</select>
										</div>
										<span>&nbsp; Choose Skin</span>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-navbar" autocomplete="off" />
										<label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-sidebar" autocomplete="off" />
										<label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-breadcrumbs" autocomplete="off" />
										<label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" autocomplete="off" />
										<label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-add-container" autocomplete="off" />
										<label class="lbl" for="ace-settings-add-container">
											Inside
											<b>.container</b>
										</label>
									</div>
								</div><!-- /.pull-left -->

								<div class="pull-left width-50">
									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-hover" autocomplete="off" />
										<label class="lbl" for="ace-settings-hover"> Submenu on Hover</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-compact" autocomplete="off" />
										<label class="lbl" for="ace-settings-compact"> Compact Sidebar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-highlight" autocomplete="off" />
										<label class="lbl" for="ace-settings-highlight"> Alt. Active Item</label>
									</div>
								</div><!-- /.pull-left -->
							</div><!-- /.ace-settings-box -->
						</div><!-- /.ace-settings-container -->

						<div class="page-header">
							<h1>
								 الإيصالات
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									بيانات عامة عن الإيصالات
								</small>
							</h1>
						</div><!-- /.page-header -->
						
						<?php 
							require 'assets/redi/sqlcon.php';
							
							if (isset($_GET['backresult']))
						{
							$backresult=$_GET['backresult'];
							if ($backresult ==  "1") {
								?>
									<div class="alert alert-block alert-success">
										<button type="button" class="close" data-dismiss="alert">
											<i class="ace-icon fa fa-times"></i>
										</button>
										<i class="ace-icon fa fa-check green"></i>
										<strong class="green">
											تمت العملية بنجاح
										</strong>
									</div>								
								 <?php
							} elseif ($backresult ==  "0") {
								 ?>
								 <div class="alert alert-block alert-danger">
									<button type="button" class="close" data-dismiss="alert">
										<i class="ace-icon fa fa-times"></i>
									</button>
									<i class="ace-icon fa fa-times red"></i>
									<strong class="red">
										لم تتم العملية بنجاح
									</strong>
								</div>
								<?php
									}
										} 
								?>


						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								
								<div class="row">
									<div class="row">
									<div class="col-xs-12">
										<div class="clearfix">
											<div class="pull-right tableTools-container"></div>
											<a href="#plus" class="btn btn-white btn-info btn-bold" data-toggle="modal">
												<i class="ace-icon fa fa-plus-square-o"></i>
													<b>إيصال استلام</b></font>
											</a>
											<a href="#minus" class="btn btn-white btn-info btn-bold" data-toggle="modal">
												<i class="ace-icon fa fa-plus-square-o"></i>
													<b>إيصال صرف</b></font>
											</a>
											<a href="#aid" class="btn btn-white btn-info btn-bold" data-toggle="modal">
												<i class="ace-icon fa fa-plus-square-o"></i>
													<b>إيصال دعم</b></font>
											</a>
											<a href="#income" class="btn btn-white btn-info btn-bold" data-toggle="modal">
												<i class="ace-icon fa fa-plus-square-o"></i>
													<b>إجمالي المطلوب</b></font>
											</a>
											
										</div>
										<div class="table-header">
											نتائج البحث عن الإيصالات
										</div>

										<!-- div.table-responsive -->

										<!-- div.dataTables_borderWrap -->
										<div>
											<table id="dynamic-table" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														<?php 
															require 'assets/redi/sqlcon.php';
															if (isset($_SESSION['authenticate']))
																{	
																	$authenticate=$_SESSION['authenticate'];
																	if($authenticate = "true"):
																		?>
																			<th>للتعديل</th>
																		<?php
																	endif;
																}
														?>
														<th>الصارف</th>
														<th>المستلم</th>
														<th>قيمة الإيصال</th>
														<th>تاريخ الإيصال</th>
														<th>سبب الإيصال</th>
														<th>نوع الإيصال</th>
														<th>رقم الإيصال</th>
														<th>ملاحظات</th>
													</tr>
												</thead>

												<tbody>
													<?php 
														$result4 = mysqli_query($sqlcon, "SELECT * FROM `tickets` ORDER BY `tickets`.`tiid` desc");
														while($row4 = mysqli_fetch_assoc($result4))
															{	
													?>
													<tr>
														<?php 
															if (isset($_SESSION['authenticate']))
																{	
																	$authenticate=$_SESSION['authenticate'];
																	if($authenticate = "true"):
																		?>
																			<td>
																				<a class="green" href="receipt.php?receiptid=<?php echo $row4['tiid'] ?>"><?php echo $row4['tiid'] ?></a>
																			</td>
																		<?php
																	endif;
																}
														?>
														<?php
															if ($row4['tidonortype'] == "1") 
															{
																$result=mysqli_query($sqlcon, "select * FROM professors where prid = $row4[tidonor];");
																while($x = mysqli_fetch_assoc($result))
																	{	?>
																		<td><a class="green" href="prprofile.php?profileid=<?php echo $x['prid'] ?>"><?php echo $x['prname'] ?></a></td>
																		<?php
																	};
															} elseif ($row4['tidonortype'] == "2") 
															{
																$result=mysqli_query($sqlcon, "select * FROM students where stid = $row4[tidonor];");
																while($x = mysqli_fetch_assoc($result))
																	{	?>
																		<td><a class="green" href="stprofile.php?profileid=<?php echo $x['stid'] ?>"><?php echo $x['stname'] ?></a></td>
																		<?php															
																	};
															}
															elseif ($row4['tidonortype'] == "3") 
															{
																$result=mysqli_query($sqlcon, "select * FROM expenses where exid = $row4[tidonor];");
																while($x = mysqli_fetch_assoc($result))
																	{	?>
																		<td><a class="green" href="matprofile.php?profileid=<?php echo $x['matid'] ?>"><?php echo $x['matname'] ?></a></td>
																		<?php															
																	};
															}

														?>
														
														<?php
															if ($row4['tirecipienttype'] == "1") 
															{
																$result=mysqli_query($sqlcon, "select * FROM professors where prid = $row4[tirecipient];");
																while($y = mysqli_fetch_assoc($result))
																	{	?>
																		<td><a class="green" href="prprofile.php?profileid=<?php echo $y['prid'] ?>"><?php echo $y['prname'] ?></a></td>
																		<?php
																	};
															} elseif ($row4['tirecipienttype'] == "2") 
															{
																$result=mysqli_query($sqlcon, "select * FROM students where stid = $row4[tirecipient];");
																while($y = mysqli_fetch_assoc($result))
																	{	?>
																		<td><a class="green" href="stprofile.php?profileid=<?php echo $y['stid'] ?>"><?php echo $y['stname'] ?></a></td>
																		<?php															
																	};
															}
															elseif ($row4['tirecipienttype'] == "3") 
															{
																$result=mysqli_query($sqlcon, "select * FROM expenses where exid = $row4[tirecipient];");
																while($y = mysqli_fetch_assoc($result))
																	{	?>
																		<td><a class="green" href="exprofile.php?profileid=<?php echo $y['exid'] ?>"><?php echo $y['exname'] ?></a></td>
																		<?php															
																	};
															}

														?>														
														
														<td><?php
																if($row4['tiamount'] > 0):
																	$varb='<span class="btn btn-xs btn-success">';
																elseif($row4['tiamount'] < 0):
																	$varb='<span class="btn btn-xs btn-danger">';
																elseif($row4['tiamount'] == 0):
																	$varb='<span class="btn btn-xs btn-warning">';
																endif;
																echo $varb.$row4['tiamount'];?></span>
														</td>
														<td><?php echo $row4['tirealdate'] ?></td>
														<td>
														<?php
																if($row4['tireason'] == 'p1'):
																	echo "كورس";
																elseif($row4['tireason'] == 'p2'):
																	echo "مذكرات";
																elseif($row4['tireason'] == 'p3'):
																	echo "مراجعة نهائية";
																elseif($row4['tireason'] == 'p4'):
																	echo "آخري";
																elseif($row4['tireason'] == 'm0'):
																	echo "دعم";
																elseif($row4['tireason'] == 'm1'):
																	echo "سلفة";
																elseif($row4['tireason'] == 'm2'):
																	echo "محمول";
																elseif($row4['tireason'] == 'm3'):
																	echo "راتب";
																elseif($row4['tireason'] == 'm4'):
																	echo "تصوير";
																elseif($row4['tireason'] == 'm5'):
																	echo "طباعة";
																elseif($row4['tireason'] == 'm6'):
																	echo "مواصلات";
																elseif($row4['tireason'] == 'm7'):
																	echo "دعاية";
																elseif($row4['tireason'] == 'm8'):
																	echo "مكافأة";
																elseif($row4['tireason'] == 'm9'):
																	echo "آخري";
																elseif($row4['tireason'] == 'm10'):
																	echo "أدوات مكتبية";
																endif;
															?>
														</td>
														<td>
														<?php
																if($row4['titype'] == '1'):
																	echo "إستلام";
																elseif($row4['titype'] == '2'):
																	echo "صرف";
																elseif($row4['titype'] == '25'):
																	echo "%دعم 25";
																elseif($row4['titype'] == '50'):
																	echo "%دعم 50";
																endif;
															?>
														</td>
														<td><?php echo $row4['tinumber'] ?></td>
														<td><?php echo $row4['tidescription'] ?></td>
													</tr>
													<?php
												};
											?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
									
								</div><!-- /.row -->
<div id="income" class="modal fade" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header no-padding">
				<div class="table-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
						<span class="white">&times;</span>
					</button>
					مجموع المطلوب 
				</div>
			</div>
			<?php
			function sumincome($styear) {
				require 'assets/redi/sqlcon.php';
				$result = mysqli_query($sqlcon,"Select Sum(students.stbalance) As stbalance
				From students
				Where students.sttype2 != 'E' And students.styear = '$styear'");
				$row = mysqli_fetch_assoc($result); 
				$sum = $row['stbalance'];	
				$sum=abs($sum);
				echo $sum;
			}
			function sumallincome($titype) {
				require 'assets/redi/sqlcon.php';
				$result = mysqli_query($sqlcon,"Select Sum(students.stbalance) As stbalance
				From students
				Where students.sttype2 != 'E' And students.styear != '5'");
				$row = mysqli_fetch_assoc($result); 
				$sum = $row['stbalance'];	
				if (is_null($row['stbalance']))
					{echo "No data!";};
				$sum=abs($sum);
				echo $sum;
			};											
			?>										
			<form class="form-horizontal">
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> المطلوب من سنة 1 </label>
					<div class="col-sm-8">
						<input  id="form-field-1" type="text" class="input-sm" disabled value="<?php sumincome("1")?>"/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> المطلوب من سنة 2 </label>
					<div class="col-sm-8">
						<input  id="form-field-1" type="text" class="input-sm" disabled value="<?php sumincome("2")?>"/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> المطلوب من سنة 3</label>
					<div class="col-sm-8">
						<input  id="form-field-1" type="text" class="input-sm" disabled value="<?php sumincome("3")?>"/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> المطلوب من سنة 4</label>
					<div class="col-sm-8">
						<input  id="form-field-1" type="text" class="input-sm" disabled value="<?php sumincome("4")?>"/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1">مجموع المطلوب</label>
					<div class="col-sm-8">
						<input  id="form-field-1" type="text" class="input-sm" disabled value="<?php sumallincome(1)?>"/>
					</div>
				</div>
			</form>
		</div>
	</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
								
								<div id="plus" class="modal fade" tabindex="-1">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header no-padding">
												<div class="table-header">
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
														<span class="white">&times;</span>
													</button>
													إضافة إيصال استلام 
												</div>
											</div>
											<form class="form-horizontal" method="post" action="assets/redi/inserttiplus.php">
												<div class="form-group">
													<label class="col-sm-3 control-label no-padding-right" for="form-field-8"> رقم الإيصال </label>
													<div class="col-sm-8">
														<input type="text" class="input-sm"  name="number"/>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-3 control-label no-padding-right" for="form-field-4"> المستلم </label>
													<div class="col-sm-8">
														<select class="multiselect" id="form-field-4" name="recipient">
															<option selected="selected" disabled>--إختار المستلم--</option>
															<?php
																$result2 = mysqli_query($sqlcon, "SELECT * FROM `professors`");
																while ($row2 = $result2->fetch_assoc()) { 
																?>												
															<option value="<?php echo $row2['prid'] ?>"> <?php echo $row2['prname'] ?> </option>
															<?php } ?>
														</select>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-3 control-label no-padding-right" for="form-field-4"> المسلم </label>
													<div class="col-sm-8">
														<select class="multiselect" id="form-field-4" name="donor">
															<option selected="selected" disabled>--إختار المسلم--</option>
															<?php
																$result2 = mysqli_query($sqlcon, "SELECT * FROM `students`");
																while ($row2 = $result2->fetch_assoc()) { 
																?>												
															<option value="<?php echo $row2['stid'] ?>">
															<?php echo $row2['stname']." - ".$row2['styear']." - ".$row2['stgroup'] ?> </option>
															<?php } ?>
														</select>
													</div>
												</div>
												
												<div class="form-group">
													<label class="col-sm-3 control-label no-padding-right" for="form-field-8"> قيمة الإيصال </label>
													<div class="col-sm-8">
														<input type="text" class="input-sm" id="spinner4" name="amount"/>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-3 control-label no-padding-right" id="form-field-5"> التاريخ </label>
													<div class="col-sm-8">
														<div class="input-group">
															<input class="form-control date-picker" id="form-field-5" type="text" data-date-format="yyyy-mm-dd" name="realdate"/>
															<span class="input-group-addon">
																<i class="fa fa-calendar bigger-110"></i>
															</span>
														</div>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-3 control-label no-padding-right" for="form-field-11"> السبب </label>
													<div class="col-sm-9">
														<input name="reason" type="radio" class="ace" value="p1" />
														<span class="lbl"> كورس</span>
														&nbsp; &nbsp; &nbsp; &nbsp;
														<input name="reason" type="radio" class="ace" value="p2" />
														<span class="lbl"> مذكرات</span>
														&nbsp; &nbsp; &nbsp; &nbsp;
														<input name="reason" type="radio" class="ace" value="p3" />
														<span class="lbl"> مراجعة نهائية</span>
														&nbsp; &nbsp; &nbsp; &nbsp;
														<input name="reason" type="radio" class="ace" value="p4" />
														<span class="lbl"> آخري</span>														
													</div>
												</div>
												
												<div class="form-group">
													<label class="col-sm-3 control-label no-padding-right" for="form-field-8"> ملاحظات </label>
													<div class="col-sm-8">
														<textarea id="form-field-8" class="autosize-transition form-control" name="description" ></textarea>
													</div>
												</div>
												
												<div class="clearfix form-actions">
													<div class="col-md-offset-3 col-md-9">
														<button class="btn btn-info"  type="Submit"  name="submit">
															<i class="ace-icon fa fa-check bigger-110"></i>
															Submit
														</button>

														&nbsp; &nbsp; &nbsp;
														<button class="btn" type="reset">
															<i class="ace-icon fa fa-undo bigger-110"></i>
															Reset
														</button>
													</div>
												</div>
											</form>
											</div>
										</div><!-- /.modal-content -->
									</div><!-- /.modal-dialog -->
									
									<div id="aid" class="modal fade" tabindex="-1">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header no-padding">
												<div class="table-header">
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
														<span class="white">&times;</span>
													</button>
													إضافة إيصال دعم 
												</div>
											</div>
											<form class="form-horizontal" method="post" action="assets/redi/insertaid.php">
												<div class="form-group">
													<label class="col-sm-3 control-label no-padding-right" for="form-field-8"> رقم إستمارة الدعم </label>
													<div class="col-sm-8">
														<input type="text" class="input-sm"  name="number"/>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-3 control-label no-padding-right" for="form-field-4"> مسئول الدعم </label>
													<div class="col-sm-8">
														<select class="multiselect" id="form-field-4" name="donor">
															<option selected="selected" disabled>--إختار مسئول الدعم--</option>
															<?php
																$result2 = mysqli_query($sqlcon, "SELECT * FROM `professors`");
																while ($row2 = $result2->fetch_assoc()) { 
																?>												
															<option value="<?php echo $row2['prid'] ?>"> <?php echo $row2['prname'] ?> </option>
															<?php } ?>
														</select>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-3 control-label no-padding-right" for="form-field-4"> الطالب </label>
													<div class="col-sm-8">
														<select class="multiselect" id="form-field-4" name="recipient">
															<option selected="selected" disabled>--إختار الطالب--</option>
															<?php
																$result2 = mysqli_query($sqlcon, "SELECT * FROM `students`");
																while ($row2 = $result2->fetch_assoc()) { 
																?>												
															<option value="<?php echo $row2['stid'] ?>"> <?php echo $row2['stname']." - ".$row2['styear']." - ".$row2['stgroup'] ?> </option>
															<?php } ?>
														</select>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-3 control-label no-padding-right" for="form-field-11"> نسبة الدعم </label>
													<div class="col-sm-9">
														<input name="percent" type="radio" class="ace" value="50" />
														<span class="lbl">50%</span>
														&nbsp; &nbsp; &nbsp; &nbsp;
														<input name="percent" type="radio" class="ace" value="25" />
														<span class="lbl">25%</span>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-3 control-label no-padding-right" for="form-field-8"> قيمة المبلغ قبل الدعم </label>
													<div class="col-sm-8">
														<input type="text" class="input-sm" id="spinner4" name="amount"/>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-3 control-label no-padding-right" id="form-field-5"> التاريخ </label>
													<div class="col-sm-8">
														<div class="input-group">
															<input class="form-control date-picker" id="form-field-5" type="text" data-date-format="yyyy-mm-dd" name="realdate"/>
															<span class="input-group-addon">
																<i class="fa fa-calendar bigger-110"></i>
															</span>
														</div>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-3 control-label no-padding-right" for="form-field-8"> ملاحظات </label>
													<div class="col-sm-8">
														<textarea id="form-field-8" class="autosize-transition form-control" name="description" ></textarea>
													</div>
												</div>
												<div class="clearfix form-actions">
													<div class="col-md-offset-3 col-md-9">
														<button class="btn btn-info"  type="Submit"  name="submit">
															<i class="ace-icon fa fa-check bigger-110"></i>
															Submit
														</button>

														&nbsp; &nbsp; &nbsp;
														<button class="btn" type="reset">
															<i class="ace-icon fa fa-undo bigger-110"></i>
															Reset
														</button>
													</div>
												</div>
											</form>
											</div>
										</div><!-- /.modal-content -->
									</div><!-- /.modal-dialog -->
									
									<div id="minus" class="modal fade" tabindex="-1">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header no-padding">
												<div class="table-header">
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
														<span class="white">&times;</span>
													</button>
													إضافة إيصال صرف 
												</div>
											</div>
											<form class="form-horizontal" method="post" action="assets/redi/inserttiminus.php">
												<div class="form-group">
													<label class="col-sm-3 control-label no-padding-right" for="form-field-8"> رقم الإيصال </label>
													<div class="col-sm-8">
														<input type="text" class="input-sm"  name="number"/>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-3 control-label no-padding-right" for="form-field-4"> المستلم </label>
													<div class="col-sm-8">
														<select class="multiselect" id="form-field-4" name="recipient">
															<option selected="selected" disabled>--إختار المستلم--</option>
															<?php
																$result2 = mysqli_query($sqlcon, "SELECT * FROM `professors`");
																while ($row2 = $result2->fetch_assoc()) { 
																?>											
															<option value="<?php echo $row2['prid'] ?>"> <?php echo $row2['prname']?> </option>
															<?php } ?>
														</select>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-3 control-label no-padding-right" for="form-field-4"> المسلم </label>
													<div class="col-sm-8">
														<select class="multiselect" id="form-field-4" name="donor">
															<option selected="selected" disabled>--إختار المسلم--</option>
															<?php
																$result2 = mysqli_query($sqlcon, "SELECT * FROM `professors`");
																while ($row2 = $result2->fetch_assoc()) { 
																?>												
															<option value="<?php echo $row2['prid'] ?>"> <?php echo $row2['prname']?> </option>
															<?php } ?>
														</select>
													</div>
												</div>
												
												<div class="form-group">
													<label class="col-sm-3 control-label no-padding-right" for="form-field-8"> قيمة الإيصال </label>
													<div class="col-sm-8">
														<input type="text" class="input-sm" id="spinner5" name="amount"/>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-3 control-label no-padding-right" for="form-field-4"> الوجهه </label>
													<div class="col-sm-8">
														<select class="multiselect" id="form-field-4" name="tireason">
															<option selected="selected" disabled>--إختار الوجهه--</option>
															<?php
																$result2 = mysqli_query($sqlcon, "SELECT * FROM `expenses`");
																while ($row2 = $result2->fetch_assoc()) { 
																?>												
															<option value="<?php echo 'm'.$row2['exid'] ?>"> <?php echo $row2['exname']?> </option>
															<?php } ?>
														</select>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-3 control-label no-padding-right" id="form-field-5"> التاريخ </label>
													<div class="col-sm-8">
														<div class="input-group">
															<input class="form-control date-picker" id="form-field-5" type="text" data-date-format="yyyy-mm-dd" name="realdate"/>
															<span class="input-group-addon">
																<i class="fa fa-calendar bigger-110"></i>
															</span>
														</div>
													</div>
												</div>
												
												<div class="form-group">
													<label class="col-sm-3 control-label no-padding-right" for="form-field-8"> ملاحظات </label>
													<div class="col-sm-8">
														<textarea id="form-field-8" class="autosize-transition form-control" name="description" ></textarea>
													</div>
												</div>
												
												<div class="clearfix form-actions">
													<div class="col-md-offset-3 col-md-9">
														<button class="btn btn-info"  type="Submit"  name="submit">
															<i class="ace-icon fa fa-check bigger-110"></i>
															Submit
														</button>

														&nbsp; &nbsp; &nbsp;
														<button class="btn" type="reset">
															<i class="ace-icon fa fa-undo bigger-110"></i>
															Reset
														</button>
													</div>
												</div>
											</form>
											</div>
										</div><!-- /.modal-content -->
									</div><!-- /.modal-dialog -->
								</div>
								</div><!-- /.row -->

								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

			<div class="footer">
				<div class="footer-inner">
					<div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder">We.code</span>
							Application &copy; 2016-2017<? echo $varb;?>
						</span>
					</div>
				</div>
			</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> --><!--[if !IE]> -->
		<script src="assets/js/jquery-2.1.4.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="assets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->
		<script src="assets/js/jquery.bootstrap-duallistbox.min.js"></script>
		<script src="assets/js/jquery.raty.min.js"></script>
		<script src="assets/js/bootstrap-multiselect.min.js"></script>
		<script src="assets/js/select2.min.js"></script>
		<script src="assets/js/jquery-typeahead.js"></script>
		
		<!--[if lte IE 8]>
		  <script src="assets/js/excanvas.min.js"></script>
		<![endif]-->
		<script src="assets/js/jquery-ui.custom.min.js"></script>
		<script src="assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="assets/js/chosen.jquery.min.js"></script>
		<script src="assets/js/spinbox.min.js"></script>
		<script src="assets/js/bootstrap-datepicker.min.js"></script>
		<script src="assets/js/bootstrap-timepicker.min.js"></script>
		<script src="assets/js/moment.min.js"></script>
		<script src="assets/js/daterangepicker.min.js"></script>
		<script src="assets/js/bootstrap-datetimepicker.min.js"></script>
		<script src="assets/js/bootstrap-colorpicker.min.js"></script>
		<script src="assets/js/jquery.knob.min.js"></script>
		<script src="assets/js/autosize.min.js"></script>
		<script src="assets/js/jquery.inputlimiter.min.js"></script>
		<script src="assets/js/jquery.maskedinput.min.js"></script>
		<script src="assets/js/bootstrap-tag.min.js"></script>
				<script src="assets/js/jquery.dataTables.min.js"></script>
		<script src="assets/js/jquery.dataTables.bootstrap.min.js"></script>
		<script src="assets/js/dataTables.buttons.min.js"></script>
		<script src="assets/js/buttons.flash.min.js"></script>
		<script src="assets/js/buttons.html5.min.js"></script>
		<script src="assets/js/buttons.print.min.js"></script>
		<script src="assets/js/buttons.colVis.min.js"></script>
		<script src="assets/js/dataTables.select.min.js"></script>

		<!-- ace scripts -->
		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
				$('#id-disable-check').on('click', function() {
					var inp = $('#form-input-readonly').get(0);
					if(inp.hasAttribute('disabled')) {
						inp.setAttribute('readonly' , 'true');
						inp.removeAttribute('disabled');
						inp.value="This text field is readonly!";
					}
					else {
						inp.setAttribute('disabled' , 'disabled');
						inp.removeAttribute('readonly');
						inp.value="This text field is disabled!";
					}
				});
			
			
				if(!ace.vars['touch']) {
					$('.chosen-select').chosen({allow_single_deselect:true}); 
					//resize the chosen on window resize
			
					$(window)
					.off('resize.chosen')
					.on('resize.chosen', function() {
						$('.chosen-select').each(function() {
							 var $this = $(this);
							 $this.next().css({'width': $this.parent().width()});
						})
					}).trigger('resize.chosen');
					//resize chosen on sidebar collapse/expand
					$(document).on('settings.ace.chosen', function(e, event_name, event_val) {
						if(event_name != 'sidebar_collapsed') return;
						$('.chosen-select').each(function() {
							 var $this = $(this);
							 $this.next().css({'width': $this.parent().width()});
						})
					});
			
			
					$('#chosen-multiple-style .btn').on('click', function(e){
						var target = $(this).find('input[type=radio]');
						var which = parseInt(target.val());
						if(which == 2) $('#form-field-select-4').addClass('tag-input-style');
						 else $('#form-field-select-4').removeClass('tag-input-style');
					});
				}
			
			
				$('[data-rel=tooltip]').tooltip({container:'body'});
				$('[data-rel=popover]').popover({container:'body'});
			
				autosize($('textarea[class*=autosize]'));
				
				$('textarea.limited').inputlimiter({
					remText: '%n character%s remaining...',
					limitText: 'max allowed : %n.'
				});
			
				$.mask.definitions['~']='[+-]';
				$('.input-mask-date').mask('99/99/9999');
				$('.input-mask-id').mask('9/99/99/99/99/99999');
				$('.input-mask-phone').mask('(9999) 999-9999');
				$('.input-mask-eyescript').mask('~9.99 ~9.99 999');
				$(".input-mask-product").mask("a*-999-a999",{placeholder:" ",completed:function(){alert("You typed the following: "+this.val());}});
			
			
			
				$( "#input-size-slider" ).css('width','200px').slider({
					value:1,
					range: "min",
					min: 1,
					max: 8,
					step: 1,
					slide: function( event, ui ) {
						var sizing = ['', 'input-sm', 'input-lg', 'input-mini', 'input-small', 'input-medium', 'input-large', 'input-xlarge', 'input-xxlarge'];
						var val = parseInt(ui.value);
						$('#form-field-4').attr('class', sizing[val]).attr('placeholder', '.'+sizing[val]);
					}
				});
			
				$( "#input-span-slider" ).slider({
					value:1,
					range: "min",
					min: 1,
					max: 12,
					step: 1,
					slide: function( event, ui ) {
						var val = parseInt(ui.value);
						$('#form-field-5').attr('class', 'col-xs-'+val).val('.col-xs-'+val);
					}
				});
			
			
				
				//"jQuery UI Slider"
				//range slider tooltip example
				$( "#slider-range" ).css('height','200px').slider({
					orientation: "vertical",
					range: true,
					min: 0,
					max: 100,
					values: [ 17, 67 ],
					slide: function( event, ui ) {
						var val = ui.values[$(ui.handle).index()-1] + "";
			
						if( !ui.handle.firstChild ) {
							$("<div class='tooltip right in' style='display:none;left:16px;top:-6px;'><div class='tooltip-arrow'></div><div class='tooltip-inner'></div></div>")
							.prependTo(ui.handle);
						}
						$(ui.handle.firstChild).show().children().eq(1).text(val);
					}
				}).find('span.ui-slider-handle').on('blur', function(){
					$(this.firstChild).hide();
				});
				
				
				$( "#slider-range-max" ).slider({
					range: "max",
					min: 1,
					max: 10,
					value: 2
				});
				
				$( "#slider-eq > span" ).css({width:'90%', 'float':'left', margin:'15px'}).each(function() {
					// read initial values from markup and remove that
					var value = parseInt( $( this ).text(), 10 );
					$( this ).empty().slider({
						value: value,
						range: "min",
						animate: true
						
					});
				});
				
				$("#slider-eq > span.ui-slider-purple").slider('disable');//disable third item
			
				
				$('#id-input-file-1 , #id-input-file-2').ace_file_input({
					no_file:'No File ...',
					btn_choose:'Choose',
					btn_change:'Change',
					droppable:false,
					onchange:null,
					thumbnail:false //| true | large
					//whitelist:'gif|png|jpg|jpeg'
					//blacklist:'exe|php'
					//onchange:''
					//
				});
				//pre-show a file name, for example a previously selected file
				//$('#id-input-file-1').ace_file_input('show_file_list', ['myfile.txt'])
			
			
				$('#id-input-file-3').ace_file_input({
					style: 'well',
					btn_choose: 'Drop files here or click to choose',
					btn_change: null,
					no_icon: 'ace-icon fa fa-cloud-upload',
					droppable: true,
					thumbnail: 'small'//large | fit
					//,icon_remove:null//set null, to hide remove/reset button
					/**,before_change:function(files, dropped) {
						//Check an example below
						//or examples/file-upload.html
						return true;
					}*/
					/**,before_remove : function() {
						return true;
					}*/
					,
					preview_error : function(filename, error_code) {
						//name of the file that failed
						//error_code values
						//1 = 'FILE_LOAD_FAILED',
						//2 = 'IMAGE_LOAD_FAILED',
						//3 = 'THUMBNAIL_FAILED'
						//alert(error_code);
					}
			
				}).on('change', function(){
					//console.log($(this).data('ace_input_files'));
					//console.log($(this).data('ace_input_method'));
				});
				
				
				//$('#id-input-file-3')
				//.ace_file_input('show_file_list', [
					//{type: 'image', name: 'name of image', path: 'http://path/to/image/for/preview'},
					//{type: 'file', name: 'hello.txt'}
				//]);
			
				
				
			
				//dynamically change allowed formats by changing allowExt && allowMime function
				$('#id-file-format').removeAttr('checked').on('change', function() {
					var whitelist_ext, whitelist_mime;
					var btn_choose
					var no_icon
					if(this.checked) {
						btn_choose = "Drop images here or click to choose";
						no_icon = "ace-icon fa fa-picture-o";
			
						whitelist_ext = ["jpeg", "jpg", "png", "gif" , "bmp"];
						whitelist_mime = ["image/jpg", "image/jpeg", "image/png", "image/gif", "image/bmp"];
					}
					else {
						btn_choose = "Drop files here or click to choose";
						no_icon = "ace-icon fa fa-cloud-upload";
						
						whitelist_ext = null;//all extensions are acceptable
						whitelist_mime = null;//all mimes are acceptable
					}
					var file_input = $('#id-input-file-3');
					file_input
					.ace_file_input('update_settings',
					{
						'btn_choose': btn_choose,
						'no_icon': no_icon,
						'allowExt': whitelist_ext,
						'allowMime': whitelist_mime
					})
					file_input.ace_file_input('reset_input');
					
					file_input
					.off('file.error.ace')
					.on('file.error.ace', function(e, info) {
						//console.log(info.file_count);//number of selected files
						//console.log(info.invalid_count);//number of invalid files
						//console.log(info.error_list);//a list of errors in the following format
						
						//info.error_count['ext']
						//info.error_count['mime']
						//info.error_count['size']
						
						//info.error_list['ext']  = [list of file names with invalid extension]
						//info.error_list['mime'] = [list of file names with invalid mimetype]
						//info.error_list['size'] = [list of file names with invalid size]
						
						
						/**
						if( !info.dropped ) {
							//perhapse reset file field if files have been selected, and there are invalid files among them
							//when files are dropped, only valid files will be added to our file array
							e.preventDefault();//it will rest input
						}
						*/
						
						
						//if files have been selected (not dropped), you can choose to reset input
						//because browser keeps all selected files anyway and this cannot be changed
						//we can only reset file field to become empty again
						//on any case you still should check files with your server side script
						//because any arbitrary file can be uploaded by user and it's not safe to rely on browser-side measures
					});
					
					
					/**
					file_input
					.off('file.preview.ace')
					.on('file.preview.ace', function(e, info) {
						console.log(info.file.width);
						console.log(info.file.height);
						e.preventDefault();//to prevent preview
					});
					*/
				
				});
			
				$('#spinner1').ace_spinner({value:0,min:0,max:200,step:10, btn_up_class:'btn-info' , btn_down_class:'btn-info'})
				.closest('.ace-spinner')
				.on('changed.fu.spinbox', function(){
					//console.log($('#spinner1').val())
				}); 
				$('#spinner2').ace_spinner({value:0,min:0,max:10000,step:100, touch_spinner: true, icon_up:'ace-icon fa fa-caret-up bigger-110', icon_down:'ace-icon fa fa-caret-down bigger-110'});
				$('#spinner3').ace_spinner({value:0,min:-100,max:100,step:10, on_sides: true, icon_up:'ace-icon fa fa-plus bigger-110', icon_down:'ace-icon fa fa-minus bigger-110', btn_up_class:'btn-success' , btn_down_class:'btn-danger'});
				$('#spinner4').ace_spinner({value:650,min:0,max:1000,step:10, on_sides: true, icon_up:'ace-icon fa fa-plus', icon_down:'ace-icon fa fa-minus', btn_up_class:'btn-purple' , btn_down_class:'btn-purple'});
				$('#spinner5').ace_spinner({value:-650,min:-50000,max:0,step:10, on_sides: true, icon_up:'ace-icon fa fa-plus', icon_down:'ace-icon fa fa-minus', btn_up_class:'btn-purple' , btn_down_class:'btn-purple'});

				//$('#spinner1').ace_spinner('disable').ace_spinner('value', 11);
				//or
				//$('#spinner1').closest('.ace-spinner').spinner('disable').spinner('enable').spinner('value', 11);//disable, enable or change value
				//$('#spinner1').closest('.ace-spinner').spinner('value', 0);//reset to 0
			
			
				//datepicker plugin
				//link
				$('.date-picker').datepicker({
					autoclose: true,
					todayHighlight: true
				})
				//show datepicker when clicking on the icon
				.next().on(ace.click_event, function(){
					$(this).prev().focus();
				});
			
				//or change it into a date range picker
				$('.input-daterange').datepicker({autoclose:true});
			
			
				//to translate the daterange picker, please copy the "examples/daterange-fr.js" contents here before initialization
				$('input[name=date-range-picker]').daterangepicker({
					'applyClass' : 'btn-sm btn-success',
					'cancelClass' : 'btn-sm btn-default',
					locale: {
						applyLabel: 'Apply',
						cancelLabel: 'Cancel',
					}
				})
				.prev().on(ace.click_event, function(){
					$(this).next().focus();
				});
			
			
				$('#timepicker1').timepicker({
					minuteStep: 1,
					showSeconds: true,
					showMeridian: false,
					disableFocus: true,
					icons: {
						up: 'fa fa-chevron-up',
						down: 'fa fa-chevron-down'
					}
				}).on('focus', function() {
					$('#timepicker1').timepicker('showWidget');
				}).next().on(ace.click_event, function(){
					$(this).prev().focus();
				});
				
				
			
				
				if(!ace.vars['old_ie']) $('#date-timepicker1').datetimepicker({
				 //format: 'MM/DD/YYYY h:mm:ss A',//use this option to display seconds
				 icons: {
					time: 'fa fa-clock-o',
					date: 'fa fa-calendar',
					up: 'fa fa-chevron-up',
					down: 'fa fa-chevron-down',
					previous: 'fa fa-chevron-left',
					next: 'fa fa-chevron-right',
					today: 'fa fa-arrows ',
					clear: 'fa fa-trash',
					close: 'fa fa-times'
				 }
				}).next().on(ace.click_event, function(){
					$(this).prev().focus();
				});
				
			
				$('#colorpicker1').colorpicker();
				//$('.colorpicker').last().css('z-index', 2000);//if colorpicker is inside a modal, its z-index should be higher than modal'safe
			
				$('#simple-colorpicker-1').ace_colorpicker();
				//$('#simple-colorpicker-1').ace_colorpicker('pick', 2);//select 2nd color
				//$('#simple-colorpicker-1').ace_colorpicker('pick', '#fbe983');//select #fbe983 color
				//var picker = $('#simple-colorpicker-1').data('ace_colorpicker')
				//picker.pick('red', true);//insert the color if it doesn't exist
			
			
				$(".knob").knob();
				
				
				var tag_input = $('#form-field-tags');
				try{
					tag_input.tag(
					  {
						placeholder:tag_input.attr('placeholder'),
						//enable typeahead by specifying the source array
						source: ace.vars['US_STATES'],//defined in ace.js >> ace.enable_search_ahead
						/**
						//or fetch data from database, fetch those that match "query"
						source: function(query, process) {
						  $.ajax({url: 'remote_source.php?q='+encodeURIComponent(query)})
						  .done(function(result_items){
							process(result_items);
						  });
						}
						*/
					  }
					)
			
					//programmatically add/remove a tag
					var $tag_obj = $('#form-field-tags').data('tag');
					$tag_obj.add('Programmatically Added');
					
					var index = $tag_obj.inValues('some tag');
					$tag_obj.remove(index);
				}
				catch(e) {
					//display a textarea for old IE, because it doesn't support this plugin or another one I tried!
					tag_input.after('<textarea id="'+tag_input.attr('id')+'" name="'+tag_input.attr('name')+'" rows="3">'+tag_input.val()+'</textarea>').remove();
					//autosize($('#form-field-tags'));
				}
				
				
				/////////
				$('#modal-form input[type=file]').ace_file_input({
					style:'well',
					btn_choose:'Drop files here or click to choose',
					btn_change:null,
					no_icon:'ace-icon fa fa-cloud-upload',
					droppable:true,
					thumbnail:'large'
				})
				
				//chosen plugin inside a modal will have a zero width because the select element is originally hidden
				//and its width cannot be determined.
				//so we set the width after modal is show
				$('#modal-form').on('shown.bs.modal', function () {
					if(!ace.vars['touch']) {
						$(this).find('.chosen-container').each(function(){
							$(this).find('a:first-child').css('width' , '210px');
							$(this).find('.chosen-drop').css('width' , '210px');
							$(this).find('.chosen-search input').css('width' , '200px');
						});
					}
				})
				/**
				//or you can activate the chosen plugin after modal is shown
				//this way select element becomes visible with dimensions and chosen works as expected
				$('#modal-form').on('shown', function () {
					$(this).find('.modal-chosen').chosen();
				})
				*/
			
				
				
				$(document).one('ajaxloadstart.page', function(e) {
					autosize.destroy('textarea[class*=autosize]')
					
					$('.limiterBox,.autosizejs').remove();
					$('.daterangepicker.dropdown-menu,.colorpicker.dropdown-menu,.bootstrap-datetimepicker-widget.dropdown-menu').remove();
				});
			
			});
		</script>
		<script type="text/javascript">
			jQuery(function($){
			    var demo1 = $('select[name="duallistbox_demo1[]"]').bootstrapDualListbox({infoTextFiltered: '<span class="label label-purple label-lg">Filtered</span>'});
				var container1 = demo1.bootstrapDualListbox('getContainer');
				container1.find('.btn').addClass('btn-white btn-info btn-bold');
			
				/**var setRatingColors = function() {
					$(this).find('.star-on-png,.star-half-png').addClass('orange2').removeClass('grey');
					$(this).find('.star-off-png').removeClass('orange2').addClass('grey');
				}*/
				$('.rating').raty({
					'cancel' : true,
					'half': true,
					'starType' : 'i'
					/**,
					
					'click': function() {
						setRatingColors.call(this);
					},
					'mouseover': function() {
						setRatingColors.call(this);
					},
					'mouseout': function() {
						setRatingColors.call(this);
					}*/
				})//.find('i:not(.star-raty)').addClass('grey');
				
				
				
				//////////////////
				//select2
				$('.select2').css('width','200px').select2({allowClear:true})
				$('#select2-multiple-style .btn').on('click', function(e){
					var target = $(this).find('input[type=radio]');
					var which = parseInt(target.val());
					if(which == 2) $('.select2').addClass('tag-input-style');
					 else $('.select2').removeClass('tag-input-style');
				});
				
				//////////////////
				$('.multiselect').multiselect({
				 enableFiltering: true,
				 enableHTML: true,
				 buttonClass: 'btn btn-white btn-primary',
				 templates: {
					button: '<button type="button" class="multiselect dropdown-toggle" data-toggle="dropdown"><span class="multiselect-selected-text"></span> &nbsp;<b class="fa fa-caret-down"></b></button>',
					ul: '<ul class="multiselect-container dropdown-menu"></ul>',
					filter: '<li class="multiselect-item filter"><div class="input-group"><span class="input-group-addon"><i class="fa fa-search"></i></span><input class="form-control multiselect-search" type="text"></div></li>',
					filterClearBtn: '<span class="input-group-btn"><button class="btn btn-default btn-white btn-grey multiselect-clear-filter" type="button"><i class="fa fa-times-circle red2"></i></button></span>',
					li: '<li><a tabindex="0"><label></label></a></li>',
			        divider: '<li class="multiselect-item divider"></li>',
			        liGroup: '<li class="multiselect-item multiselect-group"><label></label></li>'
				 }
				});
			
				
				///////////////////
					
				//typeahead.js
				//example taken from plugin's page at: https://twitter.github.io/typeahead.js/examples/
				var substringMatcher = function(strs) {
					return function findMatches(q, cb) {
						var matches, substringRegex;
					 
						// an array that will be populated with substring matches
						matches = [];
					 
						// regex used to determine if a string contains the substring `q`
						substrRegex = new RegExp(q, 'i');
					 
						// iterate through the pool of strings and for any string that
						// contains the substring `q`, add it to the `matches` array
						$.each(strs, function(i, str) {
							if (substrRegex.test(str)) {
								// the typeahead jQuery plugin expects suggestions to a
								// JavaScript object, refer to typeahead docs for more info
								matches.push({ value: str });
							}
						});
			
						cb(matches);
					}
				 }
			
				 $('input.typeahead').typeahead({
					hint: true,
					highlight: true,
					minLength: 1
				 }, {
					name: 'states',
					displayKey: 'value',
					source: substringMatcher(ace.vars['US_STATES']),
					limit: 10
				 });
					
					
				///////////////
				
				
				//in ajax mode, remove remaining elements before leaving page
				$(document).one('ajaxloadstart.page', function(e) {
					$('[class*=select2]').remove();
					$('select[name="duallistbox_demo1[]"]').bootstrapDualListbox('destroy');
					$('.rating').raty('destroy');
					$('.multiselect').multiselect('destroy');
				});
			
			});
		</script>
				<script type="text/javascript">
			jQuery(function($) {
				//initiate dataTables plugin
				var myTable = 
				$('#dynamic-table')
				//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
				.DataTable( {
					bAutoWidth: false,
					"aoColumns": [
					  <?php 
							require 'assets/redi/sqlcon.php';
							if (isset($_SESSION['authenticate']))
								{	
									$authenticate=$_SESSION['authenticate'];
									if($authenticate = "true"):
										?>
											null,
										<?php
									endif;
								}
						?>
														null, null, null,null, null, null, null, { "bSortable": false }
					],
					"aaSorting": [],
					
					
					//"bProcessing": true,
			        //"bServerSide": true,
			        //"sAjaxSource": "http://127.0.0.1/table.php"	,
			
					//,
					//"sScrollY": "200px",
					//"bPaginate": false,
			
					//"sScrollX": "100%",
					//"sScrollXInner": "120%",
					//"bScrollCollapse": true,
					//Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
					//you may want to wrap the table inside a "div.dataTables_borderWrap" element
			
					//"iDisplayLength": 50
			
			
					select: {
						style: 'multi'
					}
			    } );
			
				
				
				$.fn.dataTable.Buttons.defaults.dom.container.className = 'dt-buttons btn-overlap btn-group btn-overlap';
				
				new $.fn.dataTable.Buttons( myTable, {
					buttons: [
					  {
						"extend": "colvis",
						"text": "<i class='fa fa-search bigger-110 blue'></i> <span class='hidden'>Show/hide columns</span>",
						"className": "btn btn-white btn-primary btn-bold",
						columns: ':not(:first):not(:last)'
					  },
					  {
						"extend": "copy",
						"text": "<i class='fa fa-copy bigger-110 pink'></i> <span class='hidden'>Copy to clipboard</span>",
						"className": "btn btn-white btn-primary btn-bold"
					  },
					  {
						"extend": "csv",
						"text": "<i class='fa fa-database bigger-110 orange'></i> <span class='hidden'>Export to CSV</span>",
						"className": "btn btn-white btn-primary btn-bold"
					  },
					  {
						"extend": "print",
						"text": "<i class='fa fa-print bigger-110 grey'></i> <span class='hidden'>Print</span>",
						"className": "btn btn-white btn-primary btn-bold",
						autoPrint: true,
					  }		  
					]
				} );
				myTable.buttons().container().appendTo( $('.tableTools-container') );
				
				//style the message box
				var defaultCopyAction = myTable.button(1).action();
				myTable.button(1).action(function (e, dt, button, config) {
					defaultCopyAction(e, dt, button, config);
					$('.dt-button-info').addClass('gritter-item-wrapper gritter-info gritter-center white');
				});
				
				
				var defaultColvisAction = myTable.button(0).action();
				myTable.button(0).action(function (e, dt, button, config) {
					
					defaultColvisAction(e, dt, button, config);
					
					
					if($('.dt-button-collection > .dropdown-menu').length == 0) {
						$('.dt-button-collection')
						.wrapInner('<ul class="dropdown-menu dropdown-light dropdown-caret dropdown-caret" />')
						.find('a').attr('href', '#').wrap("<li />")
					}
					$('.dt-button-collection').appendTo('.tableTools-container .dt-buttons')
				});
			
				////
			
				setTimeout(function() {
					$($('.tableTools-container')).find('a.dt-button').each(function() {
						var div = $(this).find(' > div').first();
						if(div.length == 1) div.tooltip({container: 'body', title: div.parent().text()});
						else $(this).tooltip({container: 'body', title: $(this).text()});
					});
				}, 500);
				
				
				
				
				
				myTable.on( 'select', function ( e, dt, type, index ) {
					if ( type === 'row' ) {
						$( myTable.row( index ).node() ).find('input:checkbox').prop('checked', true);
					}
				} );
				myTable.on( 'deselect', function ( e, dt, type, index ) {
					if ( type === 'row' ) {
						$( myTable.row( index ).node() ).find('input:checkbox').prop('checked', false);
					}
				} );
			
			
			
			
				/////////////////////////////////
				//table checkboxes
				$('th input[type=checkbox], td input[type=checkbox]').prop('checked', false);
				
				//select/deselect all rows according to table header checkbox
				$('#dynamic-table > thead > tr > th input[type=checkbox], #dynamic-table_wrapper input[type=checkbox]').eq(0).on('click', function(){
					var th_checked = this.checked;//checkbox inside "TH" table header
					
					$('#dynamic-table').find('tbody > tr').each(function(){
						var row = this;
						if(th_checked) myTable.row(row).select();
						else  myTable.row(row).deselect();
					});
				});
				
				//select/deselect a row when the checkbox is checked/unchecked
				$('#dynamic-table').on('click', 'td input[type=checkbox]' , function(){
					var row = $(this).closest('tr').get(0);
					if(this.checked) myTable.row(row).deselect();
					else myTable.row(row).select();
				});
			
			
			
				$(document).on('click', '#dynamic-table .dropdown-toggle', function(e) {
					e.stopImmediatePropagation();
					e.stopPropagation();
					e.preventDefault();
				});
				
				
				
				//And for the first simple table, which doesn't have TableTools or dataTables
				//select/deselect all rows according to table header checkbox
				var active_class = 'active';
				$('#simple-table > thead > tr > th input[type=checkbox]').eq(0).on('click', function(){
					var th_checked = this.checked;//checkbox inside "TH" table header
					
					$(this).closest('table').find('tbody > tr').each(function(){
						var row = this;
						if(th_checked) $(row).addClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', true);
						else $(row).removeClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', false);
					});
				});
				
				//select/deselect a row when the checkbox is checked/unchecked
				$('#simple-table').on('click', 'td input[type=checkbox]' , function(){
					var $row = $(this).closest('tr');
					if($row.is('.detail-row ')) return;
					if(this.checked) $row.addClass(active_class);
					else $row.removeClass(active_class);
				});
			
				
			
				/********************************/
				//add tooltip for small view action buttons in dropdown menu
				$('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});
				
				//tooltip placement on right or left
				function tooltip_placement(context, source) {
					var $source = $(source);
					var $parent = $source.closest('table')
					var off1 = $parent.offset();
					var w1 = $parent.width();
			
					var off2 = $source.offset();
					//var w2 = $source.width();
			
					if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
					return 'left';
				}
				
				
				
				
				/***************/
				$('.show-details-btn').on('click', function(e) {
					e.preventDefault();
					$(this).closest('tr').next().toggleClass('open');
					$(this).find(ace.vars['.icon']).toggleClass('fa-angle-double-down').toggleClass('fa-angle-double-up');
				});
				/***************/
				
				
				
				
				
				/**
				//add horizontal scrollbars to a simple table
				$('#simple-table').css({'width':'2000px', 'max-width': 'none'}).wrap('<div style="width: 1000px;" />').parent().ace_scroll(
				  {
					horizontal: true,
					styleClass: 'scroll-top scroll-dark scroll-visible',//show the scrollbars on top(default is bottom)
					size: 2000,
					mouseWheelLock: true
				  }
				).css('padding-top', '12px');
				*/
			
			
			})
		</script>
	</body>
</html>