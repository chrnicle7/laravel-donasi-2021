<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\KontenBlog;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

class KontenBlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kontens = KontenBlog::all();

        return view('pages.admin.list-kontenblog', compact('kontens'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.create-blog');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tambah_judul_blog' => 'required',
            'tambah_id_user' => 'required',
            'tambah_isi_blog' => 'required'
        ]);

        if($validator->fails()) {
            return redirect()->route('admin.konten-blogs.create')->with(session()->flash('alert-warning', 'Silahkan melengkapi konten!'))
                                                                 ->withInput();
        }

        $timenow = Carbon::now();
        $newContent = new KontenBlog();
        $newContent->id_user = $request->tambah_id_user;
        $newContent->judul = $request->tambah_judul_blog;
        $newContent->konten = $request->tambah_isi_blog;
        $newContent->inserted_by = $request->tambah_id_user;
        $newContent->inserted_at = $timenow;
        $newContent->edited_by = $request->tambah_id_user;
        $newContent->edited_at = $timenow;
        $newContent->verified_at = $timenow;
        $newContent->verified_by = $request->tambah_id_user;
        $newContent->save();

        return redirect()->route('admin.konten-blogs.index')->with(session()->flash('alert-success', 'Blog berhasil ditambahkan'))
                                                                 ->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog = KontenBlog::find($id);

        return view('pages.admin.detail-blog', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = KontenBlog::find($id);

        return view('pages.admin.edit-blog', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'edit_judul_blog' => 'required',
            'edit_isi_blog' => 'required'
        ]);

        if($validator->fails()) {
            return redirect()->route('admin.konten-blogs.edit', $id)->with(session()->flash('alert-warning', 'Silahkan melengkapi konten!'))
                                                                 ->withInput();
        }

        $timenow = Carbon::now();
        $updateContent = KontenBlog::find($id);
        $updateContent->judul = $request->edit_judul_blog;
        $updateContent->konten = $request->edit_isi_blog;
        $updateContent->edited_by = auth()->user()->id;
        $updateContent->edited_at = $timenow;
        $updateContent->save();

        return redirect()->route('admin.konten-blogs.show', $id)->with(session()->flash('alert-success', 'Konten blog berhasil diperbarui!'))
                                                                 ->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $foundContent = KontenBlog::find($id);
        $foundContent->delete();

        return redirect()->route('admin.konten-blogs.index')->with(session()->flash('alert-success', 'Konten blog berhasil dihapus!'))
                                                                 ->withInput();
    }
}
