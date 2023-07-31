<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserImage extends Model
{
    use HasFactory;

    // Create a new user image entry
    // UserImage::create([
    //     'users_id' => 1,
    //     'img' => 'base64_encoded_image_here',
    //     'img_size' => 1024,
    //     'img_name' => 'user_image.jpg',
    // ]);

    // // Access the user related to an image entry
    // $userImage = UserImage::find(1);
    // $user = $userImage->user; // This will retrieve the related User instance


    protected $table = 'usersimg_table';

    protected $fillable = [
        'users_id',
        'img',
        'img_size',
        'img_name',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
}
