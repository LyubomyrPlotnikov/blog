<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostTest extends TestCase
{
    /**
     * Perform successful post creation.
     */
    public function testCreatePost()
    {
        $this->actingAs($this->getAdminUser())
           ->visit(route('home'))
           ->see(__('Create Post'))
           ->click(__('Create Post'))
           ->see(__('New blog entry'))
           ->type('New blog entry', 'title')
           ->type('Blog entry body', 'body')
           ->press(__('Create'))
           ->seeText('Your post has been successfully created!');
    }

    /**
     * Test Post list.
     *
     * @return void
     */
    public function testPostList()
    {
        $this->visit(route('home'))
            ->seeText(__('New blog entry'));
    }

    /**
     * Perform post creation with empty field.
     */
    public function testCreatePostFailure()
    {
        $this->actingAs($this->getAdminUser())
            ->visit(route('home'))
            ->see(__('Create Post'))
            ->click(__('Create Post'))
            ->see(__('New blog entry'))
            ->type('New blog entry', 'title')
            ->press(__('Create'))
            ->seeText(__('validation.required', ['attribute' => 'body']));
    }
}
