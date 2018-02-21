<?php namespace Icocheckr;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ico extends Model {
	use SoftDeletes;
	protected $table = 'icos';
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [ 
													"name", 
													"rating", 
													"about",
													"description",
													"categories",
													"status",
													"url_link_video",
													"url_link_blog",
													"ofc_website",
													"price",
													"platform",
													"country_operation",
													"token_ticker",
													"restrictions",
													"start_after",
													"end_before",
													"contact_email",
												];
	/**
	 * The attributes that should be mutated to dates.
	 *
	 * @var array
	 */
	protected $dates = ['deleted_at'];												
}
