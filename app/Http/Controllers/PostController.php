<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post as Request;
use App\Models\Post;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        return view('posts.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('posts.create');
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $post = auth()->user()->posts()->create($request->only(['title', 'body']));

        return redirect()
            ->route('posts.edit', ['post' => $post->slug])
            ->with('success', 'Your post has been successfully created!');
    }

    /**
     * Display the specified resource.
     *
     * @param $post Post
     *
     * @return View
     */
    public function show(Post $post): View
    {
        return view('posts.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $post Post
     * @return View
     */
    public function edit(Post $post): View
    {
        return view('posts.edit', [
            'post' => $post
        ]);
    }

    /**
     * Update post.
     *
     * @param Request $request
     * @param $post Post
     *
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Post $post): RedirectResponse
    {
        $post->fill($request->only(['title', 'body']))
            ->save();

        return redirect()
            ->route('posts.edit', ['post' => $post->slug])
            ->with('success', 'Your post was successfully saved!');
    }

    /**
     * @param $post Post
     *
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Post $post): RedirectResponse
    {
        $post->delete();

        return redirect()->route('home')->with('success', 'Your post has been successfully removed!');
    }
}
