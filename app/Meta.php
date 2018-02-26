<?php namespace Icocheckr;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Meta extends Model {

	protected $table = 'metas';
  
	protected function createMeta($name,$table_name,$table_id,$value)
	{
		$meta = Meta::where("meta_name","=",$name)
									->where("table_name","=",$table_name)
									->where("table_id","=",$table_id)
									->first();
		if (is_null($meta)) {
			$meta = new Meta;
		}
    $meta->meta_name = $name;
    $meta->table_name = $table_name;
    $meta->table_id = $table_id;
    $meta->meta_value = $value;
    $meta->save();
  }
  
	protected function getMeta($name,$table_name,$table_id)
	{
		$meta = Meta::where("meta_name","=",$name)
						->where("table_name","=",$table_name)
						->where("table_id","=",$table_id)
						->first();
		if (!is_null($meta)) {
			return $meta->meta_value;
		} else {
			return "";
		}
	}
}
