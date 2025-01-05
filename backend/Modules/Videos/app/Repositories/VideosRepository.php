<?php
namespace Modules\Videos\Repositories;

use Illuminate\Http\Request;
use Modules\Videos\Models\Video;

class VideosRepository extends Repository
{
    protected $model = Video::class;

    public function list()
    {
        $query = $this->newQuery();
        $videos = $this->doQuery($query, 15, false);

        return $this->makeReturn(true, 'Lista de Videos', $videos);
    }

    public function find($id)
    {
        $video = $this->findByID($id, false);

        return $video === null ? 
            $this->makeReturn(false, 'Video não encontrado', []) :
            $this->makeReturn(true, 'Video', $video);
    }

    public function save(Request $request)
    {
        if ($request->id !== null) {
            $video = $this->findByID($request->id, false);
        }

        $video = $video ?? new Video();
        $video->title       = $request->title;
        $video->description = $request->description;
        $video->url         = $request->url;

        if ($video->save()) {
            return $this->makeReturn(true, 'Video salvo com sucesso', $video);
        }

        return $this->makeReturn(false, 'O video não pode ser salvo', []);
    }

    public function delete($id)
    {
        return Video::where('id', $id)->delete() ?
            $this->makeReturn(false, 'Video não encontrado', []) :
            $this->makeReturn(true, 'Video deletado', []);
    }
}
