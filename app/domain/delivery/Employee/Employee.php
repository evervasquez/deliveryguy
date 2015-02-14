<?php
namespace domain\delivery\Employee;

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Employee extends \Eloquent {
	protected $fillable = [];
    protected $guarded = [];
	use SoftDeletingTrait;

        protected $dates = ['deleted_at'];
        protected $hidden = array('created_at','updated_at','deleted_at');
}