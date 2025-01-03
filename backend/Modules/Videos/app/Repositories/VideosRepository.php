<?php
namespace App\Repositories;

use Illuminate\Http\Request;
use Modules\Videos\Models\Video;

class VideoRepository extends Repository
{
    protected $model = Video::class;

    public function save(Request $request)
    {
        if ($request->id !== null) {
            $video = $this->findByID($request->id, false);
        }

        $video = $video ?? new Video();
        $video->title       = $request->title;
        $video->description = $request->description;
        $video->url         = $request->url;

        return $video->save() ? true : false;
    }
}
