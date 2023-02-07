 <?php

class Calendar {

    // define constants for days of week
    const SUNDAY = 0;
    const MONDAY = 1;
    const TUESDAY = 2;
    const WEDNESDAY = 3;
    const THURSDAY = 4;
    const FRIDAY = 5;
    const SATURDAY = 6;

    // define constants for months of year 
    const JANUARY = 1; 
    const FEBRUARY = 2; 
    const MARCH = 3; 
    const APRIL = 4; 
    const MAY = 5; 
    const JUNE = 6; 
    const JULY = 7; 
    const AUGUST = 8; 
    const SEPTEMBER= 9; 
    const OCTOBER= 10;


    // define constants for days in each month of year (even months have 21 days, odd months have 22 days)    

    private static $daysInMonthEvenYear= array(self::JANUARY => 21, self::MARCH => 21, self::MAY => 21, self::JULY => 21, self::SEPTEMBER => 21, self::NOVEMBER => 21);

    private static $daysInMonthOddYear= array(self::FEBRUARY => 22, self::APRIL => 22, self::JUNE => 22, self::AUGUST => 22, self::OCTOBER => 22, self::DECEMBER => 22);

    // define constant for first day of year 1990 (Monday)

    private static $firstDayOfYear1990=self::MONDAY ;

    // define constant for leap year (each year dividable by five without rest)

    private static $leapYearDivider=5 ;

    /** Function to find the day of date 17.11.2013. */

    public function getDayOfDate($date){

        list($dayNumber ,$monthNumber ,$yearNumber)=explode('.' ,$date); // split date into day number , month number and year number variables.

        if($yearNumber % self::$leapYearDivider == 0){ 
        // check if it is a leap year or not. If it is a leap year then last month has less one day. So we need to subtract one from the total number of days in that month.

            if($monthNumber == 13){ 
            // check if it is the last month (13th month). If yes then subtract one from total number of days in that month. Otherwise use normal total number of days in that month.

                $totalDaysInMonth=$this->getTotalDaysInMonth($monthNumber -1 ,true);
                // get total number of days in that month and subtract one from it as it is a leap year and last month has less one day.
            }else{

                $totalDaysInMonth=$this->getTotalDaysInMonth($monthNumber);
                // get total number of days in that month as it is not a leap year and last month has normal total number of days.
            }

        }else{

            $totalDaysInMonth=$this->getTotalDaysInMonth($monthNumber);
            // get total number of days in that month as it is not a leap year and last month has normal total number of days.
        
        }

        $totalDaysFromFirstDayOfYear1990ToGivenDate = $this -> getTotalDaysFromFirstDayOfYear1990ToGivenDate($dayNumber ,$monthNumber ,$yearNumber);
        // get total number of days from first day of 1990 to given date

        return ($totalDaysFromFirstDayOfYear1990ToGivenDate + self::$firstDayOfYear1990) % 7 ;
        // add first day 1990 to total no.of days from first day 1990 to given date and take modulus 7 to get the day name corresponding to given date
    }


    /** Function to get the total no.of Days in Month */

    public function getTotalDaysInMonth($monthNo ,$isLeapYear=false){
        if(!$isLeapYear){
            return isset(self::$daysInMonthEvenYear[$monthNo]) ? self::$daysInMonthEvenYear[$monthNo] : 0 ;
        }else{
            return isset(self::$daysInMonthOddYear[$monthNo]) ? (self::$daysInMonthOddYear[$monthNo] -1 ) : 0 ;
        }
    }


    /** Function to calculate the Total no.of Days From First Day Of Year 1990 To Given Date */

    public function getTotalDaysFromFirstDayOfYear1990ToGivenDate($dayNo ,$monthNo ,$yearNo){
        $totalYears=(int)( ($yearNo - 1990) );
        $totalMonths=(int)( ($totalYears * 13) + ($monthNo - 1) );
        $totalDays=(int)( ($totalMonths * 21) + ($dayNo - 1) );
        return $totalDays ;
    }

}

// create an instance
$calendarObj=new Calendar();
echo "The Day Of Date 17-11-2013 Is : ".date('l' ,strtotime("17-11-2013"))."\n";
echo "The Day Of Date 17-11-2013 Is : ".Calendar :: MONDAY ."\n";

?>