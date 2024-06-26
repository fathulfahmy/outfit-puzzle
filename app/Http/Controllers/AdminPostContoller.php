<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class AdminPostContoller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('admin.posts.index', [
            'posts' => Post::with('user')->latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:140',
            'body' => 'nullable|string|max:255',
            'image' => 'nullable'
        ]);

        $post = $request->user()->posts()->create($validated);

        if ($request->hasFile('image')) {
            $post->addMediaFromRequest('image')->toMediaCollection();
        }

        return redirect(route('admin.posts.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post): View
    {
        return view('admin.posts.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post): View
    {
        Gate::authorize('update', $post);

        return view('admin.posts.edit', [
            'post' => $post,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post): RedirectResponse
    {
        Gate::authorize('update', $post);

        $validated = $request->validate([
            'title' => 'required|string|max:140',
            'body' => 'nullable|string|max:255',
            'image' => 'nullable'
        ]);

        if ($request->hasFile('image')) {
            $post->clearMediaCollection();
            $post->addMediaFromRequest('image')->toMediaCollection();
        }
        $post->update($validated);

        return redirect(route('admin.posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post): RedirectResponse
    {
        Gate::authorize('delete', $post);

        $post->delete();

        return redirect(route('admin.posts.index'));
    }
}
