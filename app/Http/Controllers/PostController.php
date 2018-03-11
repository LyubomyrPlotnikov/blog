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
        $posts = Post::with('user')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('posts.index', [
            'posts' => $posts
        ]);
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
        try {
            $post = auth()->user()->posts()->create($request->only(['title', 'body']));
        } catch (\Exception $exception) {
            \Log::error($exception);
            return redirect()
               ->back()
               ->withErrors(['Your post has not been created. Please contact support.']);
        }

        return redirect()
            ->route('posts.edit', $post)
            ->with('success', 'Your post has been successfully created!');
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     *
     * @return View
     */
    public function show(string $id): View
    {
        $post = Post::findOrFail($id);

        return view('posts.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  $id
     * @return View
     */
    public function edit(string $id): View
    {
        $post = Post::findOrFail($id);

        return view('posts.edit', [
            'post' => $post
        ]);
    }

    /**
     * Update post.
     *
     * @param Request $request
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $post = Post::findOrFail($id);
        $post->fill($request->only(['title', 'body']))
            ->save();

        return redirect()->back()->with('success', 'Your post was successfully saved!');
    }

    /**
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(string $id): RedirectResponse
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('index')->with('success', 'Your post was successfully removed!');
    }
}
