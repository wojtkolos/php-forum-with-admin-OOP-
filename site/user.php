<?php
class User 
{
    private $userid;
    private $nickname;
    private $password;
    private $privilege;

    //---------------------------------------------------------------//
    //                      class constructor
    //---------------------------------------------------------------//
    function __construct($userid, $nickname, $password, $privilege)
    {
        $this->userid = $userid;
        $this->nickname = $nickname;
        $this->password = $password;
        $this->privilege = $password;
    }

    //---------------------------------------------------------------//
    //                           user get
    //---------------------------------------------------------------//
    public function get_user()
    {
        $user=array( 
                    "userid"      => hex2bin($this->userid),
                    "nickname"    => hex2bin($this->nickname),
                    "pass"        => md5($this->password),
                    "privilege"   => hex2bin($this->privilege)
        );
        return $user;
    }
    
    public function get_user_id()
    {
        return hex2bin($this->userid);
    }

    //---------------------------------------------------------------//
    //                           user put
    //---------------------------------------------------------------//
    public function set_user($userid, $nickname, $password, $privilege = "user")
    {
        $this->userid = bin2hex($userid);
        $this->nickname = bin2hex($nickname);
        $this->password = md5($password);
        $this->privilege = bin2hex($privilege);
        
        $user=array( 
            "userid"      => hex2bin($this->userid),
            "nickname"    => hex2bin($this->nickname),
            "pass"        => md5($this->password),
            "privilege"   => hex2bin($this->privilege)
        );
        return $user;
    }

    //---------------------------------------------------------------//
    //                           user pass check
    //---------------------------------------------------------------//
    public function user_pass_check($pass)
    {
        if($this->password == md5($pass))
        {
            return TRUE;
        }  
        return FALSE;
    }
}

?>