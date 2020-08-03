<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Todo;


class TodoTest extends TestCase
{
    use RefreshDatabase;


    /** @test */
    public function todo_can_be_created()
    {
        $this->withoutExceptionHandling();

        $this->post('/todo', 
            factory(Todo::class)->make()->toArray()

        )->assertRedirect('todo'); 
        $this->assertCount(1, Todo::all());
    }

     /** @test */
    public function details_fields_is_not_required()
    {
        $this->post('todo', [
                    'name' => 'Caleb Akeju',
                    'message' => 'Lorem ipsum dolor sit.',
                    'details' => '',
             ])->assertRedirect('todo');

        $this->assertCount(1, Todo::all());
    }

     /** @test */
    public function todo_can_be_updated()
    {
        $todo = factory(Todo::class)->create();

        $this->patch('todo/' . $todo->slug, [
                'message' => 'Lorem ipsum dolor sit am.',
                'details' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
                              Commodi error, eaque!'
            ])->assertStatus(302)->assertOk();

        $this->assertCount(2, Todo::all());
    }

     /** @test */
    public function todo_can_be_deleted()
    {
        $todo = $this->post('todo', factory(Todo::class)->make()->toArray());
        $this->assertCount(1, Todo::all());

        $this->delete('todo/' . $todo->slug)->assertStatus(302)->asssertOK();
        $this->assertCount(0, Todo::all());
    }

    /** @test */
    public function todo_can_be_searched()
    {
        $todo = factory(Todo::class)->create(['name' => 'gym']);

        $response = $this->post('search?todo=gym')->assertStatus(302)->asssertOK();
    }

}