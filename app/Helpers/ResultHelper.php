<?php

if (! function_exists('getGrade')) {
    function getGrade($score)
    {
        return match (true) {
            $score >= 70 => 'A',
            $score >= 60 => 'B',
            $score >= 50 => 'C',
            $score >= 45 => 'D',
            $score >= 40 => 'E',
            default => 'F',
        };
    }
}

if (!function_exists('getRemark')) {
    function getRemark($score)
    {
        return match (true) {
            $score >= 70 => 'Excellent',
            $score >= 60 => 'Very Good',
            $score >= 50 => 'Good',
            $score >= 45 => 'Credit',
            $score >= 40 => 'Pass',
            default => 'Fail',
        };
    }
}

if (! function_exists('gradeColorClass')) {
    function gradeColorClass($grade)
    {
        return match ($grade) {
            'A' => 'bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400',
            'B' => 'bg-blue-100 text-blue-800 dark:bg-blue-900/30 dark:text-blue-400',
            'C' => 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900/30 dark:text-yellow-400',
            'D' => 'bg-orange-100 text-orange-800 dark:bg-orange-900/30 dark:text-orange-400',
            'E' => 'bg-purple-100 text-purple-800 dark:bg-purple-900/30 dark:text-purple-400',
            'F' => 'bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-400',
            default => 'bg-gray-100 text-gray-800 dark:bg-gray-900/30 dark:text-gray-400',
        };
    }
}

if (! function_exists('ordinal')) {
    function ordinal($number)
    {
        if (($number % 100) >= 11 && ($number % 100) <= 13) {
            return [$number . 'th'];
        }

        return match ($number % 10) {
            1 => [$number, 'st'],
            2 => [$number, 'nd'],
            3 => [$number, 'rd'],
            default => [$number, 'th'],
        };
    }
}
