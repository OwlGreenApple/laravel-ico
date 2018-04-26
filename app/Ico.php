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
													"rating_project", 
													"rating_profile", 
													"rating_team", 
													"rating_hype", 
													"package", 
													"package_until", 
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
		'package_until',
		'deleted_at',
	];
	
	public function setPresaleStartAttribute($date)
	{
			// $this->attributes['presale_start'] = Carbon::parse($date);
			$this->attributes['presale_start'] = $date ? Carbon::parse($date)->toDateString() : null;
	}
	public function setPresaleEndAttribute($date)
	{
			$this->attributes['presale_end'] = $date ? Carbon::parse($date)->toDateString() : null;
	}
	public function setSaleStartAttribute($date)
	{
			$this->attributes['sale_start'] = $date ? Carbon::parse($date)->toDateString() : null;
	}
	public function setSaleEndAttribute($date)
	{
			$this->attributes['sale_end'] = $date ? Carbon::parse($date)->toDateString() : null;
	}
	public function setPackageUntilAttribute($date)
	{
			$this->attributes['package_until'] = $date ? Carbon::parse($date)->toDateString() : null;
	}
}
