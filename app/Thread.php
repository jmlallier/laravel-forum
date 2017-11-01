<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model {
	protected $guarded = [];

	public function author() {
		return $this->belongsTo( User::class, 'user_id' );
	}

	public function path() {
		return "/threads/{$this->channel->slug}/{$this->id}";
	}

	public function authorName() {
		return ( $this->author )->name;
	}

	public function addReply( $reply ) {
		$this->replies()->create( $reply );
	}

	public function replies() {
		return $this->hasMany( Reply::class );
	}

	public function channel() {
		return $this->belongsTo( Channel::class );
	}

}
