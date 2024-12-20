<?php

namespace Tests\Feature;

use App\Models\Note;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

class NoteTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_notes_can_be_listed(): void
    {
        $response = $this->get('/api/notes');

        $response->assertStatus(Response::HTTP_OK);
    }

    public function test_notes_can_be_created(): void{
        $response = $this->post('/api/notes', [
            'title' => 'Test title',
            'description' => 'Test description',
        ]);
        $response->assertStatus(Response::HTTP_CREATED);

    }

    public function test_notes_can_be_updated(): void
    {
        $note = app(Note::class)->factory()->create();
        $response = $this->put('/api/notes/'.$note->id, [
            'title' => 'Test title',
            'description' => 'Test description',

        ]);
        $response->assertStatus(Response::HTTP_ACCEPTED);

    }

    public function test_notes_can_be_deleted(): void
    {
        $note = app(Note::class)->factory()->create();
        $response = $this->delete('/api/notes/'.$note->id);
        $response->assertStatus(Response::HTTP_ACCEPTED);
    }


}
