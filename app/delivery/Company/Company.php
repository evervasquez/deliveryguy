<?php
namespace delivery\Company;
use Illuminate\Database\Eloquent\SoftDeletingTrait;
class Company extends \Eloquent {
	protected $fillable = [];
    use SoftDeletingTrait;

    protected $dates = ['deleted_at'];
    protected $hidden = array('created_at','updated_at','deleted_at');

}