<?php
include ($_SERVER['DOCUMENT_ROOT']."/system/config.php");
class ffgcontroller {
    public function checkIP() {
        $allowed = array("208.75.29.80", "67.216.96.44", "::1", "66.214.185.128", "206.207.159.28", "10.240.0.40");
        if (in_array($_SERVER['REMOTE_ADDR'], $allowed)) {
            return true;
        } else {
            return false;
        }
    }
    public function loginhandler($username, $password, $con) {
        $hashedpass = md5($password);
        $stmt = $con->prepare("SELECT * FROM members WHERE username=? AND access=1") or die(mysql_error);
        $stmt->execute();
        $stmt->bind_result($user_id, $username, $email, $db_password, $rank);
        $stmt->fetch();
        if ($stmt->num_rows == 1) {
            if ($this->checkLocked($user_id, $con)) {
                return false;
                echo "Up";
            } else {
                if ($db_password == $hashedpass) {
                    $username = preg_replace("/[^a-zA-Z0-9_\-]+/", "", $username);
                    $_SESSION['username'] = $username;
                    $user_id = preg_replace("/[^0-9]+/", "", $user_id);
                    $_SESSION['user_id'] = $user_id;
                    return true;
                    echo "You";
                } else {
                    $now = time();
                    $con->query("INSERT INTO login_attempts(user_id, time) VALUES ('$user_id', '$now')");
                    return false;
                    echo "fucked";
                }
            }
        }
    }
    public function checkLocked($user_id, $con) {
        $now = time();
        $valid_attempts = $now - (15 * 60);
        if ($stmt = $con->prepare("SELECT time FROM login_attempts WHERE user_id = ? AND time > '$valid_attempts'")) {
            $stmt->bind_param('i', $user_id);
            $stmt->execute();
            $stmt->store_result();
            if ($stmt->num_rows > 5) {
                return true;
                echo "lol";
            } else {
                return false;
                echo "suck";
            }
        }
    }
    public function login_check($con) {
        if (isset($_SESSION['username'], $_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id'];
            $username = $_SESSION['username'];
            
        }
    }
}

?>
