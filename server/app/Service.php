<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Service extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug', 'owner_id',
    ];

    public static function fromUser(int $userId)
    {
        return Service::where('owner_id', $userId)->get();
    }

    public static function fromSlug(string $input)
    {
        return Service::where('slug', $input)->first();
    }

    public function store(Request $request)
    {
        // Validate the request...

        $service = new Service;

        $service->name = $request->name;
        $service->slug = $request->slug;
        $service->owner_id = $request->owner_id;

        $service->save();
    }
}
