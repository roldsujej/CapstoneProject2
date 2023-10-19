<?php

function getStatusText($statusCode)
{
    switch ($statusCode) {
        case 0:
            return "Pending Verification";
        case 1:
            return "Email Verified";
        case 2:
            return "Account Accepted";
        case 3:
            return "Member";
        case 4:
            return "Application Denied";
        default:
            return "Unknown Status";
    }
}
