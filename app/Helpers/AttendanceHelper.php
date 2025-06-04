<?php

namespace App\Helpers;

class AttendanceHelper {
    public static function calculateLateStatus($intime) {

        $expected_intime = "09:00:00"; // the expected intime is 9:00 AM
        $late_threshold = "00:15:00"; //  the late threshold is 15 minutes

        $diff = strtotime($intime) - strtotime($expected_intime);

        if ($diff > 0 && $diff <= strtotime($late_threshold)) {
            return "Late";
        } elseif ($diff > strtotime($late_threshold)) {
            return "Very Late";
        } else {
            return "On Time";
        }


    }

    public static function calculateTotalDuty($intime, $outtime)
    {
        $intime_timestamp = strtotime($intime);
        $outtime_timestamp = strtotime($outtime);

        $diff_seconds = $outtime_timestamp - $intime_timestamp;
        $hours = floor($diff_seconds / 3600);
        $minutes = floor(($diff_seconds / 60) % 60);

        return $hours . " hours " . $minutes . " minutes";
    }

}
