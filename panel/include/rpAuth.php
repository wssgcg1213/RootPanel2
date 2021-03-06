<?php

class rpAuth extends lpTrackAuth
{
    static public function getPasswd($uname)
    {
        return rpUserModel::find(["uname" => $uname])["passwd"];
    }

    static public function succeedCallback($user)
    {
        $row["lastlogintime"] = time();
        $row["lastloginip"] = rpTools::getIP();
        $row["lastloginua"] = $_SERVER["HTTP_USER_AGENT"];

        rpUserModel::update(["uname" => $user], $row);
    }

    static public function uname()
    {
        $realUName = parent::uname();
        if(rpUserModel::by("uname", $realUName)->isAdmin() && isset($_COOKIE["rp_changeuname"]))
            return $_COOKIE["rp_changeuname"];
        else
            return $realUName;
    }
}
