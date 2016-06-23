<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\RotaSlotStaff as RotaSlotStaff;

class NewStaffHours extends Controller
{

  public $_staffid;

  public $_monday;
  public $_mostarttime;
  public $_mofinishtime;

  public $_tuesday;
  public $_tustarttime;
  public $_tufinishtime;

  public $_wednesday;
  public $_westarttime;
  public $_wefinishtime;

  public $_thursday;
  public $_thstarttime;
  public $_thfinishtime;

  public $_friday;
  public $_frstarttime;
  public $_frfinishtime;

  public $_saturday;
  public $_sastarttime;
  public $_safinishtime;

  public $_sunday;
  public $_sustarttime;
  public $_sufinishtime;




    public function __construct($staffid)
    {
      $this->_staffid  = $staffid;

      $this->_monday = $this->dailyHoursWorked($staffid, 0);
      $this->_mostarttime = $this->getStartTime($staffid, 0);
      $this->_mofinishtime = $this->getEndTime($staffid, 0);

      $this->_tuesday = $this->dailyHoursWorked($staffid, 1);
      $this->_tustarttime = $this->getStartTime($staffid, 1);
      $this->_tufinishtime = $this->getEndTime($staffid, 1);

      $this->_wednesday = $this->dailyHoursWorked($staffid, 2);
      $this->_westarttime = $this->getStartTime($staffid, 2);
      $this->_wefinishtime = $this->getEndTime($staffid, 2);

      $this->_thursday = $this->dailyHoursWorked($staffid, 3);
      $this->_thstarttime = $this->getStartTime($staffid, 3);
      $this->_thfinishtime = $this->getEndTime($staffid, 3);

      $this->_friday = $this->dailyHoursWorked($staffid, 4);
      $this->_frstarttime = $this->getStartTime($staffid, 4);
      $this->_frfinishtime = $this->getEndTime($staffid, 4);

      $this->_saturday = $this->dailyHoursWorked($staffid, 5);
      $this->_sastarttime = $this->getStartTime($staffid, 5);
      $this->_safinishtime = $this->getEndTime($staffid, 5);

      $this->_sunday = $this->dailyHoursWorked($staffid, 6);
      $this->_sustarttime = $this->getStartTime($staffid, 6);
      $this->_sufinishtime = $this->getEndTime($staffid, 6);

    }

    // Method for assigning the total hours worked per staff member per a day
        protected function dailyHoursWorked($staffid, $daynumber)
        {
          if ($totaldayhoursworked = RotaSlotStaff::where('slottype', '=', 'shift')
                                        ->whereNotNull('staffid')
                                        ->where('staffid', '=', $staffid)
                                        ->where('daynumber', '=', $daynumber)
                                        ->sum('workhours'))
                                        {
                                          return number_format((float)$totaldayhoursworked, 2, '.', '');
                                        } else{
                                          return number_format((float)0, 2, '.', '');
                                        }//end if else
        }// end dailyHoursWorked


        // method for assigning the start time of a shift
        protected function getStartTime($staffid, $daynumber)
        {
          if($starttime = RotaSlotStaff::where('slottype', '=', 'shift')
                                        ->whereNotNull('staffid')
                                        ->select('starttime')
                                        ->where('staffid', '=', $staffid)
                                        ->where('daynumber', '=', $daynumber)
                                        ->first())
                                        {
                                          //dd($starttime->starttime);
                                          return $starttime->starttime;

                                        } else {
                                          $starttime = "--";
                                          return $starttime;

                                        }
        }// end getStartTime


        // method for assigning the end time of a shift
        protected function getEndTime($staffid, $daynumber)
        {
          if($endtime = RotaSlotStaff::where('slottype', '=', 'shift')
                                        ->whereNotNull('staffid')
                                        ->select('endtime')
                                        ->where('staffid', '=', $staffid)
                                        ->where('daynumber', '=', $daynumber)
                                        ->first())
                                        {
                                          //dd($starttime->starttime);
                                          return $endtime->endtime;

                                        } else {

                                          $endtime = "--";
                                          return $endtime;

                                        }
        }// end getFinishTime




}
