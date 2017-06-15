<?php
namespace Home\Event;
class UserEvent {
    public static function login(){
        echo 'login event';
    }

    public function logout(){
        echo 'logout event';
    }
}
