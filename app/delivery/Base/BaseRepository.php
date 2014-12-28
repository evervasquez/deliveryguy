<?php
/**
 * Created by PhpStorm.
 * User: Investigación2
 * Date: 04/11/14
 * Time: 01:23 AM
 */

namespace delivery\Base;


use Carbon\Carbon;

class BaseRepository
{
    public function getCreatedAt()
    {
        $carbon = Carbon::now();
        return $carbon->toDateTimeString();
    }

    public function getUpdateAt()
    {
        $carbon = Carbon::now();
        return $carbon->toDateTimeString();
    }

    public function getDeletedAt()
    {
        $carbon = Carbon::now();
        return $carbon->toDateTimeString();
    }
} 