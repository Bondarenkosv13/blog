<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.blog.postCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\CreatePostRequest
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(CreatePostRequest $request)
    {
        $post = $request->all();
        switch ($post['is_published']) {
            case 'on':
                $post['is_published'] = 1;
                $post['published_at'] = Carbon::now()->toDateTimeString();
                break;
            case 'off':
                $post['is_published'] = 0;
                break;
        }

        unset($post['image']);
        unset($post['_token']);
        $post['user_id'] = auth()->user()->id;
        if(!empty($request->file('image'))) {
            $imageService = app()->make(\App\Services\ImageService::class);
            $filePath = $imageService->upload($request->file('image'));
            $post['image'] = $filePath;
        }

        Post::create($post);

        return redirect(route('admin.home'))->with(['status' => 'The post has been created!']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $post
     * @return void
     */
    public function edit(Post $post)
    {
        return view('admin.blog.postEdit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param $post
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|void
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $newPost = $request->all();
        if (!empty($newPost['is_published'])) {
            $newPost['is_published'] = 1;
            if ($post['published_at'] == null) {
                $post->update([
                    'published_at' => $newPost['published_at'] = Carbon::now()->toDateTimeString()
                ]);
            };
        }
        if (empty($newPost['is_published'])) {
            $newPost['is_published'] = 0;
        }

        $imageService = app()->make(\App\Services\ImageService::class);

        if(!empty($request->file('image'))) {
            $imageService->remove($post->image);
            $filePath = $imageService->upload($request->file('image'));
            $post->update([
                'image' => $filePath
            ]);
        }

        $post->update([
            'title'               => $newPost['title'],
            'small_description'   => $newPost['small_description'],
            'description'         => $newPost['description'],
            'is_published'        => $newPost['is_published'],
        ]);

        return redirect(route('admin.home'))->with(['status' => 'The post has been update!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Post $post
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function destroy(Post $post)
    {
        $imageService = app()->make(\App\Services\ImageService::class);
        $imageService->remove($post->image);

        $post->delete();

        return redirect(route('admin.home'))
            ->with(['status' => 'The post was successfully delete.']);
    }
}
