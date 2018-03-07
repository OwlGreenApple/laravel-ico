<?php namespace Icocheckr;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

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
													"presale_start",
													"presale_end",
													"sale_start",
													"sale_end",
													"token_for_sale",
													"list_exchange",
													"twitter_username",
													"financial",
													"tagline",
												];
	/**
	 * The attributes that should be mutated to dates.
	 *
	 * @var array
	 */
	protected $dates = [
		'presale_start',
		'presale_end',
		'sale_start',
		'sale_end',
		'deleted_at',
	];
	
	public function setPresaleStartAttribute($date)
	{
			$this->attributes['presale_start'] = Carbon::parse($date);
	}
	public function setPresaleEndAttribute($date)
	{
			$this->attributes['presale_end'] = Carbon::parse($date);
	}
	public function setSaleStartAttribute($date)
	{
			$this->attributes['sale_start'] = Carbon::parse($date);
	}
	public function setSaleEndAttribute($date)
	{
			$this->attributes['sale_end'] = Carbon::parse($date);
	}
}
