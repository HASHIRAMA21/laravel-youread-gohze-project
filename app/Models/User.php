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

/**
 * App\Models\User
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $username
 * @property string $password
 * @property string|null $phone_number
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $active_status
 * @property string $avatar
 * @property int $dark_mode
 * @property string $messenger_color
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Client[] $clients
 * @property-read int|null $clients_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\CommentLike[] $commentDislikes
 * @property-read int|null $comment_dislikes_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\CommentLike[] $commentLikes
 * @property-read int|null $comment_likes_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Comment[] $comments
 * @property-read int|null $comments_count
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|\Spatie\MediaLibrary\MediaCollections\Models\Media[] $media
 * @property-read int|null $media_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Review[] $reviews
 * @property-read int|null $reviews_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Token[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User orWherePermissionIs($permission = '')
 * @method static \Illuminate\Database\Eloquent\Builder|User orWhereRoleIs($role = '', $team = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereActiveStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDarkMode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDoesntHavePermission()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDoesntHaveRole()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereMessengerColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePermissionIs($permission = '', $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRoleIs($role = '', $team = null, $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUsername($value)
 * @mixin \Eloquent
 */
class User extends Authenticatable implements HasMedia, MustVerifyEmail # JWTSubject,
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
