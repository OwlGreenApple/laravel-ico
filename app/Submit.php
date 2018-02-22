<?php namespace Icocheckr;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Submit extends Model {
	use SoftDeletes;
	protected $table = 'submits';
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [ 
													"type_application", 
													"ico_name", 
													"categories",
													"ofc_website",
													"about",
													"description",
													"sale_date",
													"token_ticker",
													"link_whitepaper",
													"link_bounty",
													"platform",
													"price",
													"restrictions",
													"contact_email",
												];
	/**
	 * The attributes that should be mutated to dates.
	 *
	 * @var array
	 */
	protected $dates = ['deleted_at'];												
}
