<?php
// Start error logging
ini_set('log_errors', 1);
ini_set('error_log', 'error_log.txt'); // Log errors to error_log.txt
error_reporting(E_ALL);

session_start();

include('config.php');
include('time_settings.php');

if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $query1 = "SELECT login_tab.REST_ID, login_tab.KITCHEN_ID, login_tab.USER_ID, login_tab.ACCOUNT_STATUS, 
                login_tab.GROUP_ID, login_tab.RECORD_STATUS,
                group_tab.GROUP_NAME, group_type_tab.GROUP_TYPE, group_tab.DISPLAY_NAME, 
                user_tab.WORK_TIME_S, user_tab.WORK_TIME_E 
                FROM login_tab
                JOIN group_tab ON group_tab.GROUP_ID = login_tab.GROUP_ID 
                JOIN group_type_tab ON group_type_tab.GROUP_TYPE_ID = login_tab.GROUP_TYPE_ID 
                JOIN user_tab ON user_tab.USER_ID = login_tab.USER_ID 
                WHERE login_tab.USER_ID = ? 
                AND login_tab.PASSWORD = ? 
                ORDER BY group_tab.GROUP_ID ASC";

    $stmt = mysqli_prepare($conn, $query1);
    if (!$stmt) {
        error_log("Prepare failed: " . mysqli_error($conn));
        die('Database error occurred. Please try again later.');
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $password);
    if (!mysqli_stmt_execute($stmt)) {
        error_log("Execute failed: " . mysqli_stmt_error($stmt));
        die('Database error occurred. Please try again later.');
    }

    $result1 = mysqli_stmt_get_result($stmt);
    if (!$result1) {
        error_log("Get result failed: " . mysqli_stmt_error($stmt));
        die('Database error occurred. Please try again later.');
    }

    $num = mysqli_num_rows($result1);

    $row = null; // Initialize $row to avoid undefined variable issues
    if ($num > 0) {
        $row = mysqli_fetch_assoc($result1);
        $restid = $row['REST_ID'];
        $kit_id = $row['KITCHEN_ID'];
        $userid = $row['USER_ID'];
        $status = $row['RECORD_STATUS'];
        $groupid = $row['GROUP_ID'];
        $reg_status = $row['ACCOUNT_STATUS'];
        $groupname = $row['GROUP_NAME'];
        $grouptype = $row['GROUP_TYPE'];
        $display_name = $row['DISPLAY_NAME'];
        $time_s = $row['WORK_TIME_S'];
        $time_e = $row['WORK_TIME_E'];
    }

    if ($num != 0) {
        if ($status != "logout") {
            error_log("User $userid attempted login but status is $status");
            include('index.php');
            exit;
        } elseif (($current_time <= $time_s && $current_time < $time_e) || ($current_time > $time_s && $current_time >= $time_e)) {
            error_log("User $userid login attempt outside allowed hours: $current_time (Allowed: $time_s to $time_e)");
            include('not_allowed.php');
            exit;
        } else {
            $_SESSION['username'] = $userid;
            $_SESSION['password'] = $password;
            $_SESSION['restid'] = $restid;
            $_SESSION['kitid'] = $kit_id;
            $_SESSION['dname'] = $display_name;

            $update = "UPDATE login_tab SET RECORD_STATUS = 'logedin', LAST_ACTIVITY = ? WHERE USER_ID = ? AND PASSWORD = ?";
            $stmt_update = mysqli_prepare($conn, $update);
            if (!$stmt_update) {
                error_log("Update prepare failed: " . mysqli_error($conn));
                die('Database error occurred. Please try again later.');
            }

            mysqli_stmt_bind_param($stmt_update, "sss", $acc_date_time, $userid, $password);
            if (!mysqli_stmt_execute($stmt_update)) {
                error_log("Update execute failed: " . mysqli_stmt_error($stmt_update));
                die('Database error occurred. Please try again later.');
            }

            $quer = "INSERT INTO logfile_tab (REST_ID, USER_ID, LOGIN_DATE, LOGIN_TIME, LOGOUT_DATE, LOGOUT_TIME) VALUES (?, ?, ?, ?, '', '')";
            $stmt_quer = mysqli_prepare($conn, $quer);
            if (!$stmt_quer) {
                error_log("Logfile prepare failed: " . mysqli_error($conn));
                die('Database error occurred. Please try again later.');
            }

            mysqli_stmt_bind_param($stmt_quer, "ssss", $restid, $userid, $current_date, $current_time);
            if (!mysqli_stmt_execute($stmt_quer)) {
                error_log("Logfile execute failed: " . mysqli_stmt_error($stmt_quer));
                die('Database error occurred. Please try again later.');
            }

            // Redirect based on groupname and grouptype
            try {
                if ($groupname == "ADMINISTRATOR") {
                    if ($grouptype == "ADMIN_MASTER") {
                        header('Location: admin_master.php');
                    } else {
                        switch ($reg_status) {
                            case "E":
                                header('Location: admin_semi.php');
                                break;
                            case "T":
                                header('Location: admin_semi_ts.php');
                                break;
                            case "S":
                                header('Location: admin_semi_suspend.php');
                                break;
                            case "D":
                                header('Location: admin_semi_disable.php');
                                break;
                            default:
                                header('Location: admin_semi_freeze.php');
                                break;
                        }
                    }
                } elseif ($groupname == "BANQUET") {
                    if ($grouptype == "BANQ_ADMIN") {
                        switch ($reg_status) {
                            case "E":
                                header('Location: banq_admin.php');
                                break;
                            case "T":
                                header('Location: banq_admin_ts.php');
                                break;
                            case "S":
                                header('Location: banq_admin_suspend.php');
                                break;
                            case "D":
                                header('Location: banq_admin_disable.php');
                                break;
                            default:
                                header('Location: banq_admin_freeze.php');
                                break;
                        }
                    } else {
                        switch ($reg_status) {
                            case "E":
                                header('Location: banq_emp.php');
                                break;
                            case "T":
                                header('Location: banq_emp_ts.php');
                                break;
                            case "S":
                                header('Location: banq_emp_suspend.php');
                                break;
                            case "D":
                                header('Location: banq_emp_disable.php');
                                break;
                            default:
                                header('Location: banq_emp_freeze.php');
                                break;
                        }
                    }
                } elseif ($groupname == "RESTAURANT") {
                    if ($grouptype == "REST_ADMIN") {
                        switch ($reg_status) {
                            case "E":
                                header('Location: admin_rest.php');
                                break;
                            case "T":
                                header('Location: rest_reception_ts.php');
                                break;
                            case "S":
                                header('Location: rest_reception_suspend.php');
                                break;
                            case "D":
                                header('Location: rest_reception_disable.php');
                                break;
                            default:
                                header('Location: rest_reception_freeze.php');
                                break;
                        }
                    } elseif ($grouptype == "REST_RECEPTION") {
                        switch ($reg_status) {
                            case "E":
                                header('Location: reception.php');
                                break;
                            case "T":
                                header('Location: rest_reception_ts.php');
                                break;
                            case "S":
                                header('Location: rest_reception_suspend.php');
                                break;
                            case "D":
                                header('Location: rest_reception_disable.php');
                                break;
                            default:
                                header('Location: rest_reception_freeze.php');
                                break;
                        }
                    } elseif ($grouptype == "REST_WAITER") {
                        switch ($reg_status) {
                            case "E":
                                header('Location: order_man.php');
                                break;
                            case "T":
                                header('Location: rest_orderman_ts.php');
                                break;
                            case "S":
                                header('Location: rest_orderman_suspend.php');
                                break;
                            case "D":
                                header('Location: rest_orderman_disable.php');
                                break;
                            default:
                                header('Location: rest_orderman_freeze.php');
                                break;
                        }
                    } elseif ($grouptype == "REST_KITCHEN") {
                        switch ($reg_status) {
                            case "E":
                                header('Location: rest_kitchen.php');
                                break;
                            case "T":
                                header('Location: rest_kitchen_ts.php');
                                break;
                            case "S":
                                header('Location: rest_kitchen_suspend.php');
                                break;
                            case "D":
                                header('Location: rest_kitchen_disable.php');
                                break;
                            default:
                                header('Location: rest_kitchen_freeze.php');
                                break;
                        }
                    } else {
                        switch ($reg_status) {
                            case "E":
                                header('Location: rest_kitsup.php');
                                break;
                            case "T":
                                header('Location: rest_kitsup_ts.php');
                                break;
                            case "S":
                                header('Location: rest_kitsup_suspend.php');
                                break;
                            case "D":
                                header('Location: rest_kitsup_disable.php');
                                break;
                            default:
                                header('Location: rest_kitsup_freeze.php');
                                break;
                        }
                    }
                } elseif ($groupname == "STORE") {
                    if ($grouptype == "STORE_ADMIN") {
                        switch ($reg_status) {
                            case "E":
                                header('Location: store_admin.php');
                                break;
                            case "T":
                                header('Location: store_admin_ts.php');
                                break;
                            case "S":
                                header('Location: store_admin_suspend.php');
                                break;
                            case "D":
                                header('Location: store_admin_disable.php');
                                break;
                            default:
                                header('Location: store_admin_freeze.php');
                                break;
                        }
                    } else {
                        switch ($reg_status) {
                            case "E":
                                header('Location: store_emp.php');
                                break;
                            case "T":
                                header('Location: store_emp_ts.php');
                                break;
                            case "S":
                                header('Location: store_emp_suspend.php');
                                break;
                            case "D":
                                header('Location: store_emp_disable.php');
                                break;
                            default:
                                header('Location: store_emp_freeze.php');
                                break;
                        }
                    }
                } elseif ($groupname == "RECEPTION") {
                    if ($grouptype == "RECEPTION_ADMIN") {
                        switch ($reg_status) {
                            case "E":
                                header('Location: reception_admin.php');
                                break;
                            case "T":
                                header('Location: reception_admin_ts.php');
                                break;
                            case "S":
                                header('Location: reception_admin_suspend.php');
                                break;
                            case "D":
                                header('Location: reception_admin_disable.php');
                                break;
                            default:
                                header('Location: reception_admin_freeze.php');
                                break;
                        }
                    } else {
                        switch ($reg_status) {
                            case "E":
                                header('Location: reception_emp.php');
                                break;
                            case "T":
                                header('Location: reception_emp_ts.php');
                                break;
                            case "S":
                                header('Location: reception_emp_suspend.php');
                                break;
                            case "D":
                                header('Location: reception_emp_disable.php');
                                break;
                            default:
                                header('Location: reception_emp_freeze.php');
                                break;
                        }
                    }
                } elseif ($groupname == "GYM") {
                    if ($grouptype == "GYM_ADMIN") {
                        switch ($reg_status) {
                            case "E":
                                header('Location: gym_admin.php');
                                break;
                            case "T":
                                header('Location: gym_admin_option_ts.php');
                                break;
                            case "S":
                                header('Location: reception_admin_suspend.php');
                                break;
                            case "D":
                                header('Location: reception_admin_disable.php');
                                break;
                            default:
                                header('Location: reception_admin_freeze.php');
                                break;
                        }
                    } else {
                        switch ($reg_status) {
                            case "E":
                                header('Location: gym_emp_option.php');
                                break;
                            case "T":
                                header('Location: gym_emp_option_ts.php');
                                break;
                            case "S":
                                header('Location: reception_emp_suspend.php');
                                break;
                            case "D":
                                header('Location: reception_emp_disable.php');
                                break;
                            default:
                                header('Location: reception_emp_freeze.php');
                                break;
                        }
                    }
                } elseif ($groupname == "POOL") {
                    if ($grouptype == "POOL_ADMIN") {
                        switch ($reg_status) {
                            case "E":
                                header('Location: pool_admin.php');
                                break;
                            case "T":
                                header('Location: pool_admin_option_ts.php');
                                break;
                            case "S":
                                header('Location: reception_admin_suspend.php');
                                break;
                            case "D":
                                header('Location: reception_admin_disable.php');
                                break;
                            default:
                                header('Location: reception_admin_freeze.php');
                                break;
                        }
                    } else {
                        switch ($reg_status) {
                            case "E":
                                header('Location: pool_emp_option.php');
                                break;
                            case "T":
                                header('Location: pool_emp_option_ts.php');
                                break;
                            case "S":
                                header('Location: reception_emp_suspend.php');
                                break;
                            case "D":
                                header('Location: reception_emp_disable.php');
                                break;
                            default:
                                header('Location: reception_emp_freeze.php');
                                break;
                        }
                    }
                } elseif ($groupname == "FINANCE") {
                    if ($grouptype == "FINANCE_ADMIN") {
                        switch ($reg_status) {
                            case "E":
                                header('Location: finance_admin.php');
                                break;
                            case "T":
                                header('Location: finance_admin_ts.php');
                                break;
                            case "S":
                                header('Location: finance_admin_suspend.php');
                                break;
                            case "D":
                                header('Location: finance_admin_disable.php');
                                break;
                            default:
                                header('Location: finance_admin_freeze.php');
                                break;
                        }
                    } else {
                        switch ($reg_status) {
                            case "E":
                                header('Location: finance_emp.php');
                                break;
                            case "T":
                                header('Location: finance_emp_ts.php');
                                break;
                            case "S":
                                header('Location: finance_emp_suspend.php');
                                break;
                            case "D":
                                header('Location: finance_emp_disable.php');
                                break;
                            default:
                                header('Location: finance_emp_freeze.php');
                                break;
                        }
                    }
                } else {
                    error_log("Unknown groupname: $groupname for user $userid");
                    header('Location: pass_error.php');
                }
                exit;
            } catch (Exception $e) {
                error_log("Redirect error for user $userid: " . $e->getMessage());
                die('An error occurred. Please try again later.');
            }
        }
    } else {
        error_log("Login failed for username: $username");
        header('Location: pass_error.php');
        exit;
    }
} else {
    $us = isset($_SESSION['username']) ? mysqli_real_escape_string($conn, $_SESSION['username']) : '';
    $pa = isset($_SESSION['password']) ? mysqli_real_escape_string($conn, $_SESSION['password']) : '';

    $query1 = "SELECT login_tab.REST_ID, login_tab.KITCHEN_ID, login_tab.USER_ID, login_tab.ACCOUNT_STATUS, 
                login_tab.GROUP_ID, login_tab.RECORD_STATUS,
                group_tab.GROUP_NAME, group_type_tab.GROUP_TYPE, group_tab.DISPLAY_NAME, 
                user_tab.WORK_TIME_S, user_tab.WORK_TIME_E 
                FROM login_tab
                JOIN group_tab ON group_tab.GROUP_ID = login_tab.GROUP_ID 
                JOIN group_type_tab ON group_type_tab.GROUP_TYPE_ID = login_tab.GROUP_TYPE_ID 
                JOIN user_tab ON user_tab.USER_ID = login_tab.USER_ID 
                WHERE login_tab.USER_ID = ? 
                AND login_tab.PASSWORD = ? 
                ORDER BY group_tab.GROUP_ID ASC";

    $stmt = mysqli_prepare($conn, $query1);
    if (!$stmt) {
        error_log("Session check prepare failed: " . mysqli_error($conn));
        die('Database error occurred. Please try again later.');
    }

    mysqli_stmt_bind_param($stmt, "ss", $us, $pa);
    if (!mysqli_stmt_execute($stmt)) {
        error_log("Session check execute failed: " . mysqli_stmt_error($stmt));
        die('Database error occurred. Please try again later.');
    }

    $result1 = mysqli_stmt_get_result($stmt);
    if (!$result1) {
        error_log("Session check get result failed: " . mysqli_stmt_error($stmt));
        die('Database error occurred. Please try again later.');
    }

    $num = mysqli_num_rows($result1);

    $row = null;
    if ($num > 0) {
        $row = mysqli_fetch_assoc($result1);
        $restid = $row['REST_ID'];
        $kit_id = $row['KITCHEN_ID'];
        $userid = $row['USER_ID'];
        $status = $row['RECORD_STATUS'];
        $groupid = $row['GROUP_ID'];
        $reg_status = $row['ACCOUNT_STATUS'];
        $groupname = $row['GROUP_NAME'];
        $grouptype = $row['GROUP_TYPE'];
        $display_name = $row['DISPLAY_NAME'];
        $time_s = $row['WORK_TIME_S'];
        $time_e = $row['WORK_TIME_E'];
    }

    if ($num > 0 && $status == "logout") {
        error_log("Session destroyed for user $userid: status is logout");
        session_destroy();
        include('index.php');
        exit;
    } elseif ($num > 0 && (($current_time <= $time_s && $current_time < $time_e) || ($current_time > $time_s && $current_time >= $time_e))) {
        error_log("Session destroyed for user $userid: outside allowed hours $current_time (Allowed: $time_s to $time_e)");
        session_destroy();
        include('not_allowed.php');
        exit;
    } elseif ($num > 0) {
        $update = "UPDATE login_tab SET RECORD_STATUS = 'logedin', LAST_ACTIVITY = ? WHERE USER_ID = ? AND PASSWORD = ?";
        $stmt_update = mysqli_prepare($conn, $update);
        if (!$stmt_update) {
            error_log("Session update prepare failed: " . mysqli_error($conn));
            die('Database error occurred. Please try again later.');
        }

        mysqli_stmt_bind_param($stmt_update, "sss", $acc_date_time, $userid, $pa);
        if (!mysqli_stmt_execute($stmt_update)) {
            error_log("Session update execute failed: " . mysqli_stmt_error($stmt_update));
            die('Database error occurred. Please try again later.');
        }

        try {
            if ($groupname == "ADMINISTRATOR") {
                if ($grouptype == "ADMIN_MASTER") {
                    header('Location: admin_master.php');
                } else {
                    switch ($reg_status) {
                        case "E":
                            header('Location: admin_semi.php');
                            break;
                        case "T":
                            header('Location: admin_semi_ts.php');
                            break;
                        case "S":
                            header('Location: admin_semi_suspend.php');
                            break;
                        case "D":
                            header('Location: admin_semi_disable.php');
                            break;
                        default:
                            header('Location: admin_semi_freeze.php');
                            break;
                    }
                }
            } elseif ($groupname == "BANQUET") {
                if ($grouptype == "BANQ_ADMIN") {
                    switch ($reg_status) {
                        case "E":
                            header('Location: banq_admin.php');
                            break;
                        case "T":
                            header('Location: banq_admin_ts.php');
                            break;
                        case "S":
                            header('Location: banq_admin_suspend.php');
                            break;
                        case "D":
                            header('Location: banq_admin_disable.php');
                            break;
                        default:
                            header('Location: banq_admin_freeze.php');
                            break;
                    }
                } else {
                    switch ($reg_status) {
                        case "E":
                            header('Location: banq_emp.php');
                            break;
                        case "T":
                            header('Location: banq_emp_ts.php');
                            break;
                        case "S":
                            header('Location: banq_emp_suspend.php');
                            break;
                        case "D":
                            header('Location: banq_emp_disable.php');
                            break;
                        default:
                            header('Location: banq_emp_freeze.php');
                            break;
                    }
                }
            } elseif ($groupname == "RESTAURANT") {
                if ($grouptype == "REST_ADMIN") {
                    switch ($reg_status) {
                        case "E":
                            header('Location: admin_rest.php');
                            break;
                        case "T":
                            header('Location: rest_reception_ts.php');
                            break;
                        case "S":
                            header('Location: rest_reception_suspend.php');
                            break;
                        case "D":
                            header('Location: rest_reception_disable.php');
                            break;
                        default:
                            header('Location: rest_reception_freeze.php');
                            break;
                    }
                } elseif ($grouptype == "REST_RECEPTION") {
                    switch ($reg_status) {
                        case "E":
                            header('Location: reception.php');
                            break;
                        case "T":
                            header('Location: rest_reception_ts.php');
                            break;
                        case "S":
                            header('Location: rest_reception_suspend.php');
                            break;
                        case "D":
                            header('Location: rest_reception_disable.php');
                            break;
                        default:
                            header('Location: rest_reception_freeze.php');
                            break;
                    }
                } elseif ($grouptype == "REST_WAITER") {
                    switch ($reg_status) {
                        case "E":
                            header('Location: order_man.php');
                            break;
                        case "T":
                            header('Location: rest_orderman_ts.php');
                            break;
                        case "S":
                            header('Location: rest_orderman_suspend.php');
                            break;
                        case "D":
                            header('Location: rest_orderman_disable.php');
                            break;
                        default:
                            header('Location: rest_orderman_freeze.php');
                            break;
                    }
                } elseif ($grouptype == "REST_KITCHEN") {
                    switch ($reg_status) {
                        case "E":
                            header('Location: rest_kitchen.php');
                            break;
                        case "T":
                            header('Location: rest_kitchen_ts.php');
                            break;
                        case "S":
                            header('Location: rest_kitchen_suspend.php');
                            break;
                        case "D":
                            header('Location: rest_kitchen_disable.php');
                            break;
                        default:
                            header('Location: rest_kitchen_freeze.php');
                            break;
                    }
                } else {
                    switch ($reg_status) {
                        case "E":
                            header('Location: rest_kitsup.php');
                            break;
                        case "T":
                            header('Location: rest_kitsup_ts.php');
                            break;
                        case "S":
                            header('Location: rest_kitsup_suspend.php');
                            break;
                        case "D":
                            header('Location: rest_kitsup_disable.php');
                            break;
                        default:
                            header('Location: rest_kitsup_freeze.php');
                            break;
                    }
                }
            } elseif ($groupname == "STORE") {
                if ($grouptype == "STORE_ADMIN") {
                    switch ($reg_status) {
                        case "E":
                            header('Location: store_admin.php');
                            break;
                        case "T":
                            header('Location: store_admin_ts.php');
                            break;
                        case "S":
                            header('Location: store_admin_suspend.php');
                            break;
                        case "D":
                            header('Location: store_admin_disable.php');
                            break;
                        default:
                            header('Location: store_admin_freeze.php');
                            break;
                    }
                } else {
                    switch ($reg_status) {
                        case "E":
                            header('Location: store_emp.php');
                            break;
                        case "T":
                            header('Location: store_emp_ts.php');
                            break;
                        case "S":
                            header('Location: store_emp_suspend.php');
                            break;
                        case "D":
                            header('Location: store_emp_disable.php');
                            break;
                        default:
                            header('Location: store_emp_freeze.php');
                            break;
                    }
                }
            } elseif ($groupname == "RECEPTION") {
                if ($grouptype == "RECEPTION_ADMIN") {
                    switch ($reg_status) {
                        case "E":
                            header('Location: reception_admin.php');
                            break;
                        case "T":
                            header('Location: reception_admin_ts.php');
                            break;
                        case "S":
                            header('Location: reception_admin_suspend.php');
                            break;
                        case "D":
                            header('Location: reception_admin_disable.php');
                            break;
                        default:
                            header('Location: reception_admin_freeze.php');
                            break;
                    }
                } else {
                    switch ($reg_status) {
                        case "E":
                            header('Location: reception_emp.php');
                            break;
                        case "T":
                            header('Location: reception_emp_ts.php');
                            break;
                        case "S":
                            header('Location: reception_emp_suspend.php');
                            break;
                        case "D":
                            header('Location: reception_emp_disable.php');
                            break;
                        default:
                            header('Location: reception_emp_freeze.php');
                            break;
                    }
                }
            } elseif ($groupname == "GYM") {
                if ($grouptype == "GYM_ADMIN") {
                    switch ($reg_status) {
                        case "E":
                            header('Location: gym_admin.php');
                            break;
                        case "T":
                            header('Location: gym_admin_option_ts.php');
                            break;
                        case "S":
                            header('Location: reception_admin_suspend.php');
                            break;
                        case "D":
                            header('Location: reception_admin_disable.php');
                            break;
                        default:
                            header('Location: reception_admin_freeze.php');
                            break;
                    }
                } else {
                    switch ($reg_status) {
                        case "E":
                            header('Location: gym_emp_option.php');
                            break;
                        case "T":
                            header('Location: gym_emp_option_ts.php');
                            break;
                        case "S":
                            header('Location: reception_emp_suspend.php');
                            break;
                        case "D":
                            header('Location: reception_emp_disable.php');
                            break;
                        default:
                            header('Location: reception_emp_freeze.php');
                            break;
                    }
                }
            } elseif ($groupname == "POOL") {
                if ($grouptype == "POOL_ADMIN") {
                    switch ($reg_status) {
                        case "E":
                            header('Location: pool_admin.php');
                            break;
                        case "T":
                            header('Location: pool_admin_option_ts.php');
                            break;
                        case "S":
                            header('Location: reception_admin_suspend.php');
                            break;
                        case "D":
                            header('Location: reception_admin_disable.php');
                            break;
                        default:
                            header('Location: reception_admin_freeze.php');
                            break;
                    }
                } else {
                    switch ($reg_status) {
                        case "E":
                            header('Location: pool_emp_option.php');
                            break;
                        case "T":
                            header('Location: pool_emp_option_ts.php');
                            break;
                        case "S":
                            header('Location: reception_emp_suspend.php');
                            break;
                        case "D":
                            header('Location: reception_emp_disable.php');
                            break;
                        default:
                            header('Location: reception_emp_freeze.php');
                            break;
                    }
                }
            } elseif ($groupname == "FINANCE") {
                if ($grouptype == "FINANCE_ADMIN") {
                    switch ($reg_status) {
                        case "E":
                            header('Location: finance_admin.php');
                            break;
                        case "T":
                            header('Location: finance_admin_ts.php');
                            break;
                        case "S":
                            header('Location: finance_admin_suspend.php');
                            break;
                        case "D":
                            header('Location: finance_admin_disable.php');
                            break;
                        default:
                            header('Location: finance_admin_freeze.php');
                            break;
                    }
                } else {
                    switch ($reg_status) {
                        case "E":
                            header('Location: finance_emp.php');
                            break;
                        case "T":
                            header('Location: finance_emp_ts.php');
                            break;
                        case "S":
                            header('Location: finance_emp_suspend.php');
                            break;
                        case "D":
                            header('Location: finance_emp_disable.php');
                            break;
                        default:
                            header('Location: finance_emp_freeze.php');
                            break;
                    }
                }
            } else {
                error_log("Unknown groupname: $groupname for user $userid in session check");
                session_destroy();
                header('Location: pass_error.php');
            }
            exit;
        } catch (Exception $e) {
            error_log("Session redirect error for user $userid: " . $e->getMessage());
            die('An error occurred. Please try again later.');
        }
    } else {
        error_log("Session check failed for username: $us");
        session_destroy();
        header('Location: pass_error.php');
        exit;
    }
}

mysqli_close($conn);
?>