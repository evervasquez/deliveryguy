<?php
namespace domain\delivery\Throttle;
class Throttle extends \Eloquent {
	protected $fillable = [];
	use SoftDeletingTrait;

	protected $dates = ['deleted_at'];
	protected $hidden = array('created_at','updated_at','deleted_at');
}