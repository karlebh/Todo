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
        $this->post('todo', [
                    'name' => 'Caleb Akeju',
                    'message' => 'Lorem ipsum dolor sit.',
                    'details' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae, ad, blanditiis. Fugiat unde, similique beatae mollitia ut recusandae enim blanditiis? Assumenda corporis velit illo aut veritatis veniam magni voluptatem, similique.',
                    'image' => '/images/cv.jpg',
                    'date' => '2020-07-09',
             ])->assertOk(); //This Fails and I don't know why;

        $this->assertCount(1, Todo::all());
     
    }

    /** @test */
    public function image_and_details_fields_are_not_required()
    {
        $this->post('todo', [
                    'name' => 'Caleb Akeju',
                    'message' => 'Lorem ipsum dolor sit.',
                    'details' => '',
                    'image' => '',
                    'date' => '2020-07-09',
             ])->assertOk();

        $this->assertCount(1, Todo::all());
    }

    /** @test */
    public function todo_can_be_updated()
    {
        $todo = factory(Todo::class)->create();

        $this->patch('todo/' . $todo->id, [
                'message' => 'Lorem ipsum dolor sit am.',
                'details' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
                              Commodi error, eaque!'
            ])->asssertOK();
        $this->assertCount(2, Todo::all());
    }

    /** @test */
    public function todo_can_be_deleted()
    {
        $todo = $this->post('todo', [
                'message' => 'Lorem ipsum dolor sit am.',
                'details' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
                              Commodi error, eaque!'
            ]);
        $this->assertCount(1, Todo::all());

        $this->delete('todo/' . $todo->id)->asssertOK();
        $this->assertCount(0, Todo::all());
    }

    /** @test */
    public function todo_can_be_searched()
    {
        $todo = factory(Todo::class)->create(['name' => 'gym']);

        $response = $this->post('search?q=gym')->assertOk();
    }

}