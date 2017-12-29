<?php 

namespace App;

 trait Favoritable
 {
 	public function favorites()
    {
    	return $this->morphMany(Favorite::class, 'favorited');
    }

    public function favorite()
    {
    	$attributes = ['user_id' => auth()->id()];


        if (! $this->favorites()->where($attributes)->exists()){
            $attributes = ['user_id' => auth()->id()];

            return $this->favorites()->create($attributes);
        }        
    }

    public function isFavorited()
    {
        return $this->favorites->where('user_id', auth()->id())->count();
    }
 }