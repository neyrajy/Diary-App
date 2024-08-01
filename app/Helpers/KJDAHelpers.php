<?php

namespace App\Helpers;
use App\Models\School;
use App\Models\Student;
// use App\Models\Subject;
use Hashids\Hashids;

use Illuminate\Support\Facades\Auth;

class KJDAHelpers
{
    public static function getAppCode()
    {
        return self::getSetting('system_title') ?: 'Diary';
    }
    
    /*User Image*/
    public static function getDefaultUserImage()
    {
        return asset('backend/assets/images/users/user.png');
    }
    public static function hash($id)
    {
        $date = date('dMY').'KJDA';
        $hash = new Hashids($date, 14);
        return $hash->encode($id);
    }
    public static function getStudentData($remove = [])
    {
        $data = ['s_class_id', 'section_id', 'my_parent_id', 'year_admitted', 'age'];

        return $remove ? array_values(array_diff($data, $remove)) : $data;

    }
    public static function getSetting($type)
    {
        return School::where('type', $type)->first()->description;
    }

    public static function getCurrentSession()
    {
        return self::getSetting('current_session');
    }

    public static function getNextSession()
    {
        $oy = self::getCurrentSession();
        $old_yr = explode('-', $oy);
        return ++$old_yr[0].'-'.++$old_yr[1];
    }

    public static function getSystemName()
    {
        return self::getSetting('system_name');
    }
    // public static function getUserRecord($remove = [])
    // {
    //     $data = ['name', 'email', 'phone', 'phone2', 'dob', 'gender', 'address', 'bg_id', 'nal_id', 'state_id', 'lga_id'];

    //     return $remove ? array_values(array_diff($data, $remove)) : $data;
    // }
    public static function getPanelOptions()
    {
        return '    <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="remove"></a>
                    </div>
                </div>';
    }
}
