<?php

namespace app\Services;
use DB;

use App\Models\MonthDay;
use App\Models\Calculation;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DateCalculatorServices 
{
    public function findMonthByNumber($monthNumber)
    {
        //$monthname =  MonthDay::select('monthName')->where('monthNumber', 3)->get();
        return DB::table('month_days')->where('monthNumber', $monthNumber)->pluck('daysInMonth')[0];
    }

    public function CalculateDateDifference(Request $request)
    {
        $earlierdate = $request->input('earlierDate');
        $laterdate = $request->input('laterDate');
        $difference = $this->ConvertToEpoch($laterdate) - $this->ConvertToEpoch($earlierdate);

        $calculation = new Calculation;
        $calculation->earlierDate = $earlierdate;
        $calculation->laterDate = $laterdate;
        $calculation->difference = $difference;
        $calculation->save();
        //$year = Carbon::parse($request->input('earlierDate'))->year;
        //return $this->isLeapYear($year);
        //return $this->ConvertToEpoch($date);
        //return $this->findMonthByNumber(1);
        //$monthname =  MonthDay::select('monthName')->where('monthNumber', 3)->get();
        //return DB::table('month_days')->where('monthNumber', 3)->pluck('monthNumber')[0];
    }
    public function ConvertToEpoch($date){
        $daysBetweenCurrentDateAndStartofMonth = 0;
        $year = date('Y', strtotime($date));
        (int)$month = date('m', strtotime($date));
        (int)$day = date('d', strtotime($date));
        $yearsInseconds = $this->yearsSince1970($year) * 31556926;
        for ($i=1;$i<=$month;$i++) { 
            $isLeapYear = $this->isLeapYear($year);
            if ($isLeapYear == 'true' && $i == 2) {
                $daysBetweenCurrentDateAndStartofMonth+=(int)$this->findMonthByNumber($i)+1;
            }
             if($i == $month){
                $daysBetweenCurrentDateAndStartofMonth += $day;
            }
            else{
                $daysBetweenCurrentDateAndStartofMonth +=(int)$this->findMonthByNumber($i);
            } 
        }       
        return (($daysBetweenCurrentDateAndStartofMonth*86400) + $yearsInseconds)/86400;
    } 
    public function yearsSince1970($year){
        return (int)$year - 1970;
    }
    public function isLeapYear($year){
        $response = 'false';
        if($year%4 == 0 ){
            $response = 'true';
        }
        if($year%100 == 0 ){
            if($year%400 == 0 ){
                $response = 'true';
            }
        }
        return $response;
    }
}

