@extends('layouts.app')

@section('title', $book->title)

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="mb-8 flex items-center justify-between">
        <a href="{{ route('books.index') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-white rounded-xl border border-zinc-200 text-zinc-600 hover:bg-zinc-50 hover:text-zinc-900 transition-colors text-sm font-extrabold shadow-sm">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            Kembali
        </a>
        <div class="flex items-center gap-3">
            <a href="{{ route('books.edit', $book) }}" class="px-5 py-2.5 bg-white border border-zinc-200 hover:border-zinc-900 text-zinc-900 rounded-xl text-sm font-extrabold transition-all shadow-sm">
                Edit Data
            </a>
            <form action="{{ route('books.destroy', $book) }}" method="POST" onsubmit="return confirm('Hapus arsip literatur ini dari sistem secara permanen?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-5 py-2.5 bg-red-50 text-red-600 hover:bg-red-600 hover:text-white rounded-xl text-sm font-extrabold transition-all shadow-sm">
                    Hapus
                </button>
            </form>
        </div>
    </div>

    <div class="bg-white rounded-[2rem] shadow-soft border border-zinc-200/60 overflow-hidden flex flex-col md:flex-row p-2">
        <div class="md:w-[40%] lg:w-[35%] bg-zinc-50/50 rounded-3xl p-8 flex flex-col items-center justify-center border border-zinc-100">
            @if($book->cover)
                <img src="{{ asset('storage/' . $book->cover) }}" alt="{{ $book->title }}" class="w-full max-w-[220px] h-auto rounded-xl shadow-md border border-zinc-200/50 object-cover transform hover:scale-105 transition-transform duration-500">
            @else
                <div class="w-full aspect-[2/3] max-w-[220px] bg-white border border-zinc-200/80 rounded-2xl shadow-sm flex flex-col items-center justify-center text-zinc-400 gap-4">
                    <div class="w-16 h-16 bg-zinc-50 rounded-full flex items-center justify-center">
                        <svg class="w-8 h-8 text-zinc-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                    </div>
                    <span class="text-sm font-extrabold text-zinc-300 uppercase tracking-widest">No Cover</span>
                </div>
            @endif
        </div>
        
        <div class="p-8 md:p-10 md:w-[60%] lg:w-[65%] flex flex-col justify-center">
            <div class="mb-8">
                <span class="inline-block bg-white border border-zinc-200 shadow-sm text-zinc-900 text-[10px] font-extrabold uppercase tracking-widest px-4 py-1.5 rounded-full mb-5">
                    {{ $book->category }}
                </span>
                <h1 class="text-4xl sm:text-5xl font-extrabold text-zinc-900 mb-4 leading-[1.1] tracking-tight">{{ $book->title }}</h1>
                <p class="text-xl text-zinc-500 font-semibold flex items-center gap-2">
                    Milik <span class="text-zinc-800">{{ $book->author }}</span>
                </p>
            </div>
            
            <div class="grid grid-cols-2 gap-y-8 gap-x-8 py-8 border-y border-zinc-100 my-2">
                <div>
                    <h3 class="text-[11px] font-extrabold text-zinc-400 uppercase tracking-widest mb-1.5 flex items-center gap-2">
                        <div class="w-1.5 h-1.5 rounded-full bg-zinc-300"></div> Penerbit
                    </h3>
                    <p class="text-zinc-900 font-bold text-lg">{{ $book->publisher }}</p>
                </div>
                <div>
                    <h3 class="text-[11px] font-extrabold text-zinc-400 uppercase tracking-widest mb-1.5 flex items-center gap-2">
                        <div class="w-1.5 h-1.5 rounded-full bg-zinc-300"></div> Tahun Terbit
                    </h3>
                    <p class="text-zinc-900 font-bold text-lg">{{ $book->year }}</p>
                </div>
            </div>
            
            <div class="mt-8">
                <h3 class="text-[11px] font-extrabold text-zinc-400 uppercase tracking-widest mb-4 flex items-center gap-2">
                    <div class="w-1.5 h-1.5 rounded-full bg-zinc-300"></div> Sinopsis & Catatan
                </h3>
                <div class="text-zinc-600 leading-loose text-[15px] font-medium whitespace-pre-line">{{ $book->description }}</div>
            </div>
            
            <div class="mt-12 pt-6 border-t border-zinc-100 flex items-center justify-between text-xs font-bold text-zinc-400 uppercase tracking-widest">
                <span>Data masuk: {{ $book->created_at->format('d M Y') }}</span>
                <span class="bg-zinc-100 text-zinc-500 px-2 py-1 rounded">ID: {{ str_pad($book->id, 5, '0', STR_PAD_LEFT) }}</span>
            </div>
        </div>
    </div>
</div>
@endsection
