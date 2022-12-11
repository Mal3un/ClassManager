<?php
namespace App\Factory\Schedule;

abstract class ScheduleFactory{
    public $user;
    public function __construct($user) {$this->user = $user;}
    abstract public function getSchedule();

}
