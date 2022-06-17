<?php

namespace App\Models;

// use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail {
	use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array<int, string>
	 */
	protected $fillable = [
		'user_is_active', 'user_is_approved', 'user_fname', 'user_lname', 'user_company', 'user_location', 'user_email', 'user_contact_main', 'user_contact_mobile', 'user_initial_notes', 'user_datetime_registered', 'user_datetime_lastlogin', 'user_ip_address', 'user_password_last_reset_changed',
	];

	/**
	 * The attributes that should be hidden for serialization.
	 *
	 * @var array<int, string>
	 */
	protected $hidden = [
		'user_password',
		'remember_token',
	];

	/**
	 * The attributes that should be cast.
	 *
	 * @var array<string, string>
	 */
	protected $casts = [
		'email_verified_at' => 'datetime',
	];

	public function getAuthPassword() {
		return $this->user_password;
	}

	public function user_role() {
		return $this->belongsTo(UserRole::class, 'id', 'user_id');
	}

	public function qna() {
		return $this->hasMany(Qna::class, 'qna_user_id', 'id');
	}

	public function user_qna() {
		return $this->hasMany(Qna::class, 'qna_user_id', 'id');
	}

	// public function sendEmailVerificationNotification() {
	// 	$this->notify(new \App\Notifications\QueuedVerifyEmail);
	// }

}
