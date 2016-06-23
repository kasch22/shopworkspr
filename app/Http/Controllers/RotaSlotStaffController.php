<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\RotaSlotStaff as RotaSlotStaff;

class RotaSlotStaffController extends Controller
{

    // Array holding the total hours worked for each day
    protected $_daytotals;

    // Router Function, Index
    public function index()
    {

      // Set _daytotals parameter
      $this->setDayTotals();

      // Varible holding all the staff Ids for staff that have worked
      $staffids = RotaSlotStaff::select('staffid')->where('slottype', '=', 'shift')
                                    ->whereNotNull('staffid')->groupBy('staffid')->get();

      // Initalized array to hold the hours and shifts worked by staff members
      $staffhoursworked = [];


      // foreach loop to assign the hours and shifts worked by staff members
      foreach ($staffids as $staffid) {

        $newstaffhours = new NewStaffHours($staffid);


        // each staff memebrs shift times and hours worked is pushed the $staffhoursworked array
        array_push($staffhoursworked, $newstaffhours);

      }// end foreach

      //dd($staffhoursworked);

      // Return View with Staff data and individual Day totals
      return view('rotaslotstaff/index', ['staffhoursworked' => $staffhoursworked, 'daytotals' => $this->getDayTotals()]);

    }

// Setters

    protected function setDayTotals()
    {
      $this->_daytotals = [
        "monday" => $this->totalHoursWorkedPerDay(0),
        "tuesday" => $this->totalHoursWorkedPerDay(1),
        "wednesday" => $this->totalHoursWorkedPerDay(2),
        "thursday" => $this->totalHoursWorkedPerDay(3),
        "friday" => $this->totalHoursWorkedPerDay(4),
        "saturday" => $this->totalHoursWorkedPerDay(5),
        "sunday" => $this->totalHoursWorkedPerDay(6),
      ];
    }


//Getters

    protected function getDayTotals()
    {
      return $this->_daytotals;
    }


// Methods

    // Method for assigning the total hours worked by all staff, per day
    private function totalHoursWorkedPerDay($dayId)
    {
      $totalhours = RotaSlotStaff::where('slottype', '=', 'shift')
                                    ->whereNotNull('staffid')
                                    ->where('daynumber', '=', $dayId)
                                    ->sum('workhours');

      return number_format((float)$totalhours, 2, '.', '');
    }// end totalHoursWorkedPerDay


// Method for assigning the total hours worked per staff member per a day
/*
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
*/

    // method for assigning the start time of a shift
    /*
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
    */


    // method for assigning the end time of a shift
    /*
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
    */


} //End RotaSlotStaffController
