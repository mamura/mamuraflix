<?php
namespace Tests\Unit;

use Modules\Videos\Models\Video;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VideoSaveTest extends TestCase
{
    use RefreshDatabase;
    
    public function test_video_save(): void
    {
        $video = Video::create([
            'title'         => 'Test Video',
            'description'   => 'test description',
            'url'           => 'test url'
        ]);

        $createdVideo = Video::find($video->id);
        $this->assertNotNull($createdVideo);
        $this->assertEquals('Test Video', $createdVideo->title);
    }
}