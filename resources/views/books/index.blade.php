@extends('layouts.app')

@section('title', 'Koleksi Buku')

@section('content')
<div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8">
    <div>
        <h1 class="text-3xl font-extrabold text-zinc-900 tracking-tight">Koleksi Literatur</h1>
        <p class="text-zinc-500 text-sm mt-1 font-medium">Kelola arsip dan literatur perpustakaan dengan mudah</p>
    </div>
</div>

<div class="bg-white p-2.5 rounded-2xl shadow-soft border border-zinc-200/60 mb-8 flex flex-col md:flex-row justify-between items-center gap-3">
    <form method="GET" action="{{ route('books.index') }}" class="flex gap-2 w-full md:max-w-md">
        <div class="relative w-full">
            <svg class="w-4 h-4 absolute left-3.5 top-1/2 -translate-y-1/2 text-zinc-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            <input type="text" name="search" value="{{ $search }}" placeholder="Cari judul, penulis..."
                   class="w-full pl-10 pr-4 py-2.5 bg-zinc-50/50 border border-zinc-200/50 rounded-xl text-sm font-medium focus:outline-none focus:ring-2 focus:ring-zinc-900/10 focus:border-zinc-300 focus:bg-white transition-all">
        </div>
        <button type="submit" class="bg-zinc-100 hover:bg-zinc-200 text-zinc-700 px-6 py-2.5 rounded-xl text-sm font-bold transition-colors">
            Cari
        </button>
        @if($search)
        <a href="{{ route('books.index') }}" class="flex items-center justify-center px-3 text-zinc-400 hover:text-zinc-800 transition-colors bg-white rounded-xl">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
        </a>
        @endif
    </form>
    <div class="text-sm text-zinc-500 font-bold px-4">
        {{ $books->total() }} Data
    </div>
</div>

@if($books->count() > 0)
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
    @foreach($books as $book)
    <div class="group bg-white rounded-3xl border border-zinc-200/60 shadow-soft hover:shadow-hover hover:-translate-y-1 transition-all duration-300 flex flex-col overflow-hidden">
        <div class="h-64 bg-zinc-50/80 relative p-5 flex items-center justify-center border-b border-zinc-100">
            @if($book->cover)
                <img src="{{ asset('storage/' . $book->cover) }}" alt="Cover" class="h-full w-auto object-cover rounded-md shadow-sm group-hover:scale-105 transition-transform duration-500 ease-out">
            @else
                <div class="w-28 h-40 bg-white border border-zinc-200/80 rounded-lg shadow-sm flex items-center justify-center">
                    <svg class="w-8 h-8 text-zinc-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                </div>
            @endif
            <div class="absolute top-4 left-4">
                <span class="bg-white/90 backdrop-blur-md text-zinc-800 text-[10px] font-extrabold uppercase tracking-widest px-3 py-1.5 rounded-full shadow-sm border border-zinc-200/50">
                    {{ $book->category }}
                </span>
            </div>
        </div>
        
        <div class="p-6 flex-1 flex flex-col bg-white relative z-10">
            <h2 class="font-extrabold text-zinc-900 text-lg leading-snug mb-1.5 line-clamp-2 group-hover:text-zinc-600 transition-colors">
                {{ $book->title }}
            </h2>
            <p class="text-zinc-500 text-sm font-semibold mb-4">{{ $book->author }}</p>
            
            <div class="mt-auto pt-4 border-t border-zinc-100 flex items-center justify-between">
                <span class="text-[11px] text-zinc-400 font-bold tracking-widest uppercase">{{ $book->year }}</span>
                <div class="flex gap-1.5">
                    <a href="{{ route('books.show', $book) }}" class="w-9 h-9 rounded-full bg-zinc-50 border border-zinc-200/60 hover:bg-zinc-900 hover:text-white flex items-center justify-center text-zinc-600 transition-all" title="Detail">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                    </a>
                    <a href="{{ route('books.edit', $book) }}" class="w-9 h-9 rounded-full bg-zinc-50 border border-zinc-200/60 hover:bg-zinc-900 hover:text-white flex items-center justify-center text-zinc-600 transition-all" title="Edit">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

<div class="mt-12">
    {{ $books->appends(['search' => $search])->links() }}
</div>

@else
<div class="bg-white rounded-3xl border border-zinc-200/60 p-20 text-center shadow-soft mt-8">
    <div class="w-20 h-20 bg-zinc-50 rounded-2xl border border-zinc-100 flex items-center justify-center mx-auto mb-6 transform rotate-3">
        <svg class="w-10 h-10 text-zinc-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
    </div>
    <h3 class="text-xl font-extrabold text-zinc-900 mb-2">Arsip Kosong</h3>
    <p class="text-zinc-500 text-sm font-medium mb-8">Belum ada literatur yang ditemukan. Silakan tambah data baru.</p>
    <a href="{{ route('books.create') }}" class="inline-flex items-center gap-2 bg-zinc-900 hover:bg-zinc-800 text-white px-6 py-3 rounded-xl text-sm font-bold transition-all shadow-sm">
        Tambah Literatur Baru
    </a>
</div>
@endif
@endsection
