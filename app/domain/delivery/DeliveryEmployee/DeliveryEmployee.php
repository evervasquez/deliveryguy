<?php
namespace domain\delivery\DeliveryEmployee;

class DeliveryEmployee extends \Eloquent {
	protected $fillable = [];
	use SoftDeletingTrait;

        protected $dates = ['deleted_at'];
        protected $hidden = array('created_at','updated_at','deleted_at');
}