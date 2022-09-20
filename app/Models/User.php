<?php

namespace App\Models;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Laratrust\Traits\LaratrustUserTrait;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements HasMedia,JWTSubject, MustVerifyEmail
{
    use LaratrustUserTrait;
    use HasApiTokens, HasFactory, Notifiable, InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'username',
        'password',
        'phone_number',
        'avatar_url',
        'provider_id',
        'fcm_token',
        'last_login_at',
        'last_login_ip',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
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

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function publication()
    {
        return $this->hasMany(Publiication::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function PublicationLikes()
    {
        return $this->hasMany(PublicationLike::class);
    }

    public function commentLikes()
    {
        return $this->hasMany(CommentLike::class);
    }

    public function commentDislikes()
    {
        return $this->hasMany(CommentLike::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function topicPushNotification($to, $title, $body, $publication_id, $poster)
    {
        $data['to'] = '/topics/' . $to;
        $data['notification']['title'] = $title;
        $data['notification']['body'] = $body;
        $data['data']['publication_id'] = $publication_id;
        $data['data']['poster'] = $poster;

        $http = new Client(['headers' => [
            'Content-Type' => 'application/json',
            'Authorization' => 'key=' . config('services.fcm.server_key')
        ]]);
        try {
            $response = $http->post('https://fcm.googleapis.com/fcm/send', [
                'json' => $data
            ]);
            return $response->getBody();
        } catch (GuzzleException $e) {
            return $e;
        }
    }

    public function commentPushNotification($fromUser, $comment, $publication)
    {
        $to = $this->fcm_token;

        if (!empty($to)) {
            $data['to'] = $to;
            $data['notification']['title'] = $fromUser->name . ' replied to your comment';
            $data['notification']['body'] = 'on "' . $publication->title . '" ' . str_replace('@' . $this->name, "", $comment->comment_text);
            $data['notification']['click_action'] = "FLUTTER_NOTIFICATION_CLICK";
            $data['data']['sound'] = "default";
            $data['data']['status'] = "done";
            $data['data']['screen'] = "/single_video";
            $data['data']['publication_id'] = $publication->id;
            $data['data']['poster'] = 'https://image.tmdb.org/t/p/w45/' . $publication->poster;

            $http = new Client(['headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'key=' . config('services.fcm.server_key')
            ]]);
            try {
                $response = $http->post('https://fcm.googleapis.com/fcm/send', [
                    'json' => $data
                ]);
                return $response->getBody();
            } catch (GuzzleException $e) {
                return $e;
            }
        }

        return 0;
    }


    public function sendPasswordResetNotification($token)
{
    $this->notify(new \App\Notifications\MailResetPasswordNotification($token));
}
}
