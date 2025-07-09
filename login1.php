<?php session_start(); ?>
<?php 
include('config.php');
include('time_settings.php');
?>
<?php
            
	if(isset($_POST['Submit']))
	{
		//$firm = $_POST['firm'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		//echo $firm."<br>";
		//echo $username."<br>";
		//echo $password."<br>";
		$query1 = "SELECT login_tab.REST_ID, login_tab.KITCHEN_ID, login_tab.USER_ID, login_tab.ACCOUNT_STATUS, 
					login_tab.GROUP_ID, login_tab.RECORD_STATUS,
					group_tab.GROUP_NAME , group_type_tab.GROUP_TYPE, 
					user_tab.WORK_TIME_S, user_tab.WORK_TIME_E 
					FROM login_tab, group_tab, group_type_tab, user_tab
					WHERE group_tab.GROUP_ID = login_tab.GROUP_ID 
					AND group_type_tab.GROUP_TYPE_ID = login_tab.GROUP_TYPE_ID 
					AND user_tab.USER_ID = login_tab.USER_ID 
					AND login_tab.USER_ID like '$username' 
					AND login_tab.PASSWORD like '$password' 
					ORDER BY group_tab.GROUP_ID ASC";
		$result1 = mysql_query($query1) or die('Query failed: ' . mysql_error());
		$num = mysql_numrows($result1);
		//echo $num;
		//mysql_close();
		$i = 0;
		while($i < $num)
		{
			//$name = mysql_result($result1,$i, "user_tab.USER_NAME" );
			$restid = mysql_result($result1,$i, "login_tab.REST_ID" );
			$kit_id = mysql_result($result1,$i, "login_tab.KITCHEN_ID" );
			$userid = mysql_result($result1,$i, "login_tab.USER_ID" );
			$status = mysql_result($result1,$i, "login_tab.RECORD_STATUS" );
			$groupid = mysql_result($result1,$i, "login_tab.GROUP_ID" );
			$reg_status = mysql_result($result1,$i, "login_tab.ACCOUNT_STATUS" );
			$groupname = mysql_result($result1,$i, "group_tab.GROUP_NAME" );
			$grouptype = mysql_result($result1,$i, "group_type_tab.GROUP_TYPE" );
			$time_s = mysql_result($result1,$i, "user_tab.WORK_TIME_S" );
			$time_e = mysql_result($result1,$i, "user_tab.WORK_TIME_E" );
			$i++;
		}
		//echo "<br>".$f0."<br>";
		//echo "<br>".$groupname."<br>";
		//echo "<br>".$grouptype."<br>";
		//echo "If Part Executed";
		if(mysql_num_rows($result1) != 0)
		{
			if($status != "logout")
			{
				include('already_login.php');
			}
			else if(($current_time <= $time_s && $current_time < $time_e) || ($current_time > $time_s && $current_time >= $time_e))
			{
				include('not_allowed.php');
			}
			else
			{
				$_SESSION['username'] = $userid;
				$_SESSION['password'] = $password;
				$_SESSION['restid'] = $restid;
				$_SESSION['kitid'] = $kit_id;
				
				$update = "UPDATE login_tab SET RECORD_STATUS = 'logedin', LAST_ACTIVITY = '$current_time' WHERE USER_ID like '$userid' AND PASSWORD like '$password'";
				mysql_query($update) or die ('Query failed!'.mysql_error());
				
				$quer = "INSERT INTO logfile_tab VALUES('$restid','$userid', '$current_date', '$current_time','','')";
				mysql_query($quer) or die ('Query failed!'.mysql_error());
		
				if($groupname == "ADMINISTRATOR")
				{
					if($grouptype == "ADMIN_MASTER")
					{
						header('Location: admin_master.php');
					}
					else
					{
						if($reg_status == "E")
						{
							header('Location: admin_rest.php');
						}
						else if($reg_status == "T")
						{
							header('Location: admin_rest_ts.php');
						}
						else if($reg_status == "S")
						{
							header('Location: admin_rest_suspend.php');
						}
						else if($reg_status == "D")
						{
							header('Location: firm_disable.php');
						}
						else
						{
							header('Location: head_freeze.php');
						}
					}
				} //Administrator if ends here
				else if($groupname == "KITCHEN")
				{
					if($reg_status == "E")
					{
						header('Location: kitchen.php');
					}
					else if($reg_status == "T")
					{
						header('Location: kitchen_temp_suspend.php');
					}
					else if($reg_status == "S")
					{
						header('Location: kitchen_suspend.php');
					}
					else if($reg_status == "D")
					{
						header('Location: firm_disable.php');
					}
					else
					{
						header('Location: head_freeze.php');
					}
				} // else if ends here
				else if($groupname == "KITCHEN_SUP")
				{
					if($reg_status == "E")
					{
						header('Location: kitchen_sup.php');
					}
					else if($reg_status == "T")
					{
						header('Location: kitchen_temp_suspend.php');
					}
					else if($reg_status == "S")
					{
						header('Location: kitchen_suspend.php');
					}
					else if($reg_status == "D")
					{
						header('Location: firm_disable.php');
					}
					else
					{
						header('Location: head_freeze.php');
					}
				} // else if ends here
				else if($groupname == "STORE")
				{
					if($reg_status == "E")
					{
						header('Location: store.php');
					}
					else if($reg_status == "T")
					{
						header('Location: store_temp_suspend.php');
					}
					else if($reg_status == "S")
					{
						header('Location: store_suspend.php');
					}
					else if($reg_status == "D")
					{
						header('Location: firm_disable.php');
					}
					else
					{
						header('Location: head_freeze.php');
					}
				} // else if ends here
				else if($groupname == "ACCOUNTS")
				{
					if($reg_status == "E")
					{
						header('Location: accounts.php');
					}
					else if($reg_status == "T")
					{
						header('Location: accounts_temp_suspend.php');
					}
					else if($reg_status == "S")
					{
						header('Location: accounts_suspend.php');
					}
					else if($reg_status == "D")
					{
						header('Location: firm_disable.php');
					}
					else
					{
						header('Location: head_freeze.php');
					}	
				} // else if ends here
				
				else if($groupname == "ACCOUNTS1")
				{
					if($reg_status == "E")
					{
						header('Location: accounts1.php');
					}
					else if($reg_status == "T")
					{
						header('Location: accounts_temp_suspend.php');
					}
					else if($reg_status == "S")
					{
						header('Location: accounts_suspend.php');
					}
					else if($reg_status == "D")
					{
						header('Location: firm_disable.php');
					}
					else
					{
						header('Location: head_freeze.php');
					}	
				} // else if ends here
				
				else if($groupname == "DISCOUNT")
				{
					if($reg_status == "E")
					{
						header('Location: discount.php');
					}
					else if($reg_status == "T")
					{
						header('Location: kitchen_temp_suspend.php');
					}
					else if($reg_status == "S")
					{
						header('Location: kitchen_suspend.php');
					}
					else if($reg_status == "D")
					{
						header('Location: firm_disable.php');
					}
					else
					{
						header('Location: head_freeze.php');
					}
				} // else if ends here
				else if($groupname == "SALES")
				{
					if($reg_status == "E")
					{
						header('Location: sales.php');
					}
					else if($reg_status == "T")
					{
						header('Location: kitchen_temp_suspend.php');
					}
					else if($reg_status == "S")
					{
						header('Location: kitchen_suspend.php');
					}
					else if($reg_status == "D")
					{
						header('Location: firm_disable.php');
					}
					else
					{
						header('Location: head_freeze.php');
					}
				} // else if ends here
				else if($groupname == "GUEST")
				{
					if($reg_status == "E")
					{
						header('Location: guest.php');
					}
					else if($reg_status == "T")
					{
						header('Location: kitchen_temp_suspend.php');
					}
					else if($reg_status == "S")
					{
						header('Location: kitchen_suspend.php');
					}
					else if($reg_status == "D")
					{
						header('Location: firm_disable.php');
					}
					else
					{
						header('Location: head_freeze.php');
					}
				} // else if ends here
				else if($groupname == "ORDER_MAN")
				{
					if($reg_status == "E")
					{
						header('Location: order_man.php');
					}
					else if($reg_status == "T")
					{
						header('Location: order_man_ts.php');
					}
					else if($reg_status == "S")
					{
						header('Location: order_man_suspend.php');
					}
					else if($reg_status == "D")
					{
						header('Location: firm_disable.php');
					}
					else
					{
						header('Location: head_freeze.php');
					}
				}
				else if($groupname == "RECEPTION")
				{
					if($reg_status == "E")
					{
						header('Location: reception.php');
					}
					else if($reg_status == "T")
					{
						header('Location: reception_ts.php');
					}
					else if($reg_status == "S")
					{
						header('Location: reception_suspend.php');
					}
					else if($reg_status == "D")
					{
						header('Location: firm_disable.php');
					}
					else
					{
						header('Location: head_freeze.php');
					}
				}
			} // else ends here
		} // if ends here
		else/* if($groupname == "Receptionist")*/
		{
			header('Location: password_incorrect.php');
		}
	} // login if ends here			
	else
	{	
		//$firm = $_SESSION['firm'];
		$us = $_SESSION['username'];
		$pa = $_SESSION['password'];
		//echo "<br>".$firm."<br>";
		//echo "<br>".$username."<br>";
		//echo "<br>".$password."<br>";
		$query1 = "SELECT login_tab.REST_ID, login_tab.KITCHEN_ID, login_tab.USER_ID, login_tab.ACCOUNT_STATUS, 
					login_tab.GROUP_ID, login_tab.RECORD_STATUS,
					group_tab.GROUP_NAME , group_type_tab.GROUP_TYPE, 
					user_tab.WORK_TIME_S, user_tab.WORK_TIME_E 
					FROM login_tab, group_tab, group_type_tab, user_tab
					WHERE group_tab.GROUP_ID = login_tab.GROUP_ID 
					AND group_type_tab.GROUP_TYPE_ID = login_tab.GROUP_TYPE_ID 
					AND user_tab.USER_ID = login_tab.USER_ID 
					AND login_tab.USER_ID like '$us' 
					AND login_tab.PASSWORD like '$pa' 
					ORDER BY group_tab.GROUP_ID ASC";
		$result1 = mysql_query($query1) or die('Query failed: ' . mysql_error());
		$num = mysql_numrows($result1);
		//echo $num;
		//mysql_close();
		$i = 0;
		while($i < $num)
		{
			$restid = mysql_result($result1,$i, "login_tab.REST_ID" );
			$kit_id = mysql_result($result1,$i, "login_tab.KITCHEN_ID" );
			$userid = mysql_result($result1,$i, "login_tab.USER_ID" );
			$status = mysql_result($result1,$i, "login_tab.RECORD_STATUS" );
			$groupid = mysql_result($result1,$i, "login_tab.GROUP_ID" );
			$reg_status = mysql_result($result1,$i, "login_tab.ACCOUNT_STATUS" );
			$groupname = mysql_result($result1,$i, "group_tab.GROUP_NAME" );
			$grouptype = mysql_result($result1,$i, "group_type_tab.GROUP_TYPE" );
			$time_s = mysql_result($result1,$i, "user_tab.WORK_TIME_S" );
			$time_e = mysql_result($result1,$i, "user_tab.WORK_TIME_E" );
			$i++;
		}
		
		//echo "<br>".$time_s."<br>";
		//echo "<br>".$time_e."<br>";
		//echo "<br>".$groupname."<br>";
		//echo "<br>".$grouptype."<br>";
		
		if($status == "logout")
		{
			session_destroy();
			include('already_login.php');
		}
		else if(($current_time <= $time_s && $current_time < $time_e) || ($current_time > $time_s && $current_time >= $time_e))
		{
			session_destroy();
			include('not_allowed.php');
			//header('Location: not_allowed.php');
		} // login else if ends here
		else
		{
			$update = "UPDATE login_tab SET RECORD_STATUS = 'logedin', LAST_ACTIVITY = '$current_time' WHERE USER_ID like '$user' AND PASSWORD like '$password'";
			
			mysql_query($update) or die ('Query failed!'.mysql_error());
			
			if($groupname == "ADMINISTRATOR")
			{
				if($grouptype == "ADMIN_MASTER")
				{
					header('Location: admin_master.php');
				}
				else
				{
					if($reg_status == "E")
					{
						header('Location: admin_rest.php');
					}
					else if($reg_status == "T")
					{
						header('Location: admin_rest_ts.php');
					}
					else if($reg_status == "S")
					{
						header('Location: admin_rest_suspend.php');
					}
					else if($reg_status == "D")
					{
						header('Location: firm_disable.php');
					}
					else
					{
						header('Location: head_freeze.php');
					}
				}
			} //Administrator if ends here
			else if($groupname == "KITCHEN")
			{
				if($reg_status == "E")
				{
					header('Location: kitchen.php');
				}
				else if($reg_status == "T")
				{
					header('Location: kitchen_temp_suspend.php');
				}
				else if($reg_status == "S")
				{
					header('Location: kitchen_suspend.php');
				}
				else if($reg_status == "D")
				{
					header('Location: firm_disable.php');
				}
				else
				{
					header('Location: head_freeze.php');
				}
			} // else if ends here
			else if($groupname == "KITCHEN_SUP")
			{
				if($reg_status == "E")
				{
					header('Location: kitchen_sup.php');
				}
				else if($reg_status == "T")
				{
					header('Location: kitchen_temp_suspend.php');
				}
				else if($reg_status == "S")
				{
					header('Location: kitchen_suspend.php');
				}
				else if($reg_status == "D")
				{
					header('Location: firm_disable.php');
				}
				else
				{
					header('Location: head_freeze.php');
				}
			} // else if ends here
			else if($groupname == "STORE")
			{
				if($reg_status == "E")
				{
					header('Location: store.php');
				}
				else if($reg_status == "T")
				{
					header('Location: store_temp_suspend.php');
				}
				else if($reg_status == "S")
				{
					header('Location: store_suspend.php');
				}
				else if($reg_status == "D")
				{
					header('Location: firm_disable.php');
				}
				else
				{
					header('Location: head_freeze.php');
				}
			} // else if ends here
			else if($groupname == "ACCOUNTS")
			{
				if($reg_status == "E")
				{
					header('Location: accounts.php');
				}
				else if($reg_status == "T")
				{
					header('Location: accounts_temp_suspend.php');
				}
				else if($reg_status == "S")
				{
					header('Location: accounts_suspend.php');
				}
				else if($reg_status == "D")
				{
					header('Location: firm_disable.php');
				}
				else
				{
					header('Location: head_freeze.php');
				}
			} // else if ends here
			else if($groupname == "DISCOUNT")
			{
				if($reg_status == "E")
				{
					header('Location: discount.php');
				}
				else if($reg_status == "T")
				{
					header('Location: kitchen_temp_suspend.php');
				}
				else if($reg_status == "S")
				{
					header('Location: kitchen_suspend.php');
				}
				else if($reg_status == "D")
				{
					header('Location: firm_disable.php');
				}
				else
				{
					header('Location: head_freeze.php');
				}
			} // else if ends here
			else if($groupname == "SALES")
			{
				if($reg_status == "E")
				{
					header('Location: sales.php');
				}
				else if($reg_status == "T")
				{
					header('Location: kitchen_temp_suspend.php');
				}
				else if($reg_status == "S")
				{
					header('Location: kitchen_suspend.php');
				}
				else if($reg_status == "D")
				{
					header('Location: firm_disable.php');
				}
				else
				{
					header('Location: head_freeze.php');
				}
			} // else if ends here
			else if($groupname == "GUEST")
			{
				if($reg_status == "E")
				{
					header('Location: guest.php');
				}
				else if($reg_status == "T")
				{
					header('Location: kitchen_temp_suspend.php');
				}
				else if($reg_status == "S")
				{
					header('Location: kitchen_suspend.php');
				}
				else if($reg_status == "D")
				{
					header('Location: firm_disable.php');
				}
				else
				{
					header('Location: head_freeze.php');
				}
			} // else if ends here
			else if($groupname == "ORDER_MAN")
			{
				if($reg_status == "E")
				{
					header('Location: order_man.php');
				}
				else if($reg_status == "T")
				{
					header('Location: order_man_ts.php');
				}
				else if($reg_status == "S")
				{
					header('Location: order_man_suspend.php');
				}
				else if($reg_status == "D")
				{
					header('Location: firm_disable.php');
				}
				else
				{
					header('Location: head_freeze.php');
				}
			}
			else if($groupname == "RECEPTION")
			{
				if($reg_status == "E")
				{
					header('Location: reception.php');
				}
				else if($reg_status == "T")
				{
					header('Location: reception_ts.php');
				}
				else if($reg_status == "S")
				{
					header('Location: reception_suspend.php');
				}
				else if($reg_status == "D")
				{
					header('Location: firm_disable.php');
				}
				else
				{
					header('Location: head_freeze.php');
				}
			}
		} // else ends here		
	} //  else ends here
?>