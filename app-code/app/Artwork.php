<?php namespace hedron;

use Illuminate\Database\Eloquent\Model;

class Artwork extends Model{
    protected $fillable = [
            'title','date_created','type','commissioner','tools', 'display_in','featured','description'
        ];
}
