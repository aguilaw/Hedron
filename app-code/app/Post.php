<?php namespace hedron;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {

	protected $fillable = [
            'type','date_created','message','link','tools', 'icon_class','slug'
        ];

}
