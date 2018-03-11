<?php

namespace Tests\Feature;

use App\Models\User;
use MongoDB\Driver\Exception\AuthenticationException;
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
    public function testCreatePostValidatonFailure()
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

    /**
     * Perform post show.
     */
    public function testPostShow()
    {
        $this->actingAs($this->getAdminUser())
            ->visit(route('home'))
            ->see(__('New blog entry'))
            ->click(__('Read More'))
            ->seeText('Back to list');
    }

    /**
     * Perform post show.
     */
    public function testPostEdit()
    {
        $this->actingAs($this->getAdminUser())
            ->visit(route('home'))
            ->see(__('New blog entry'))
            ->click(__('Edit'))
            ->see(__('Title'))
            ->see(__('Body'))
            ->type('New blog entry Edit', 'title')
            ->press(__('Save'))
            ->see(__('Your post was successfully saved!'));
    }

    /**
     * Perform post show.
     */
    public function testPostDelete()
    {
        $this->actingAs($this->getAdminUser())
            ->visit(route('home'))
            ->see(__('New blog entry Edit'))
            ->click(__('Delete'))
            ->see(__('Your post has been successfully removed!'));
    }
}
