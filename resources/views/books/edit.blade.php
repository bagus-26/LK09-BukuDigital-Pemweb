@extends('layouts.app')

@section('title', 'Update Buku')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="mb-8 flex items-center gap-5">
        <a href="{{ route('books.index') }}" class="w-12 h-12 rounded-2xl bg-white border border-zinc-200/80 flex items-center justify-center text-zinc-500 hover:bg-zinc-50 hover:text-zinc-900 transition-all shadow-sm">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
        </a>
        <div>
            <h1 class="text-3xl font-extrabold text-zinc-900 tracking-tight">Perbarui Arsip</h1>
            <p class="text-zinc-500 text-sm font-medium mt-1">Update informasi literatur yang ada di sistem</p>
        </div>
    </div>

    <div class="bg-white rounded-[2rem] shadow-soft border border-zinc-200/60 overflow-hidden">
        <form action="{{ route('books.update', $book) }}" method="POST" enctype="multipart/form-data" class="p-8 sm:p-10">
            @csrf
            @method('PUT')

            @if($errors->any())
            <div class="bg-red-50/80 border border-red-100 text-red-600 p-5 rounded-2xl mb-8 text-sm shadow-sm">
                <p class="font-bold mb-2 flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                    Mohon periksa kembali form:
                </p>
                <ul class="list-disc list-inside space-y-1 font-medium pl-6">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="space-y-7">
                <div>
                    <label class="block text-sm font-extrabold text-zinc-800 mb-2">Judul Lengkap <span class="text-red-500">*</span></label>
                    <input type="text" name="title" value="{{ old('title', $book->title) }}" 
                           class="w-full px-5 py-3.5 bg-zinc-50/50 border border-zinc-200 rounded-2xl text-sm font-medium focus:outline-none focus:ring-4 focus:ring-zinc-900/5 focus:border-zinc-400 transition-all {{ $errors->has('title') ? 'border-red-300 bg-red-50/30 focus:ring-red-500/10' : '' }}">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-7">
                    <div>
                        <label class="block text-sm font-extrabold text-zinc-800 mb-2">Penulis <span class="text-red-500">*</span></label>
                        <input type="text" name="author" value="{{ old('author', $book->author) }}" 
                               class="w-full px-5 py-3.5 bg-zinc-50/50 border border-zinc-200 rounded-2xl text-sm font-medium focus:outline-none focus:ring-4 focus:ring-zinc-900/5 focus:border-zinc-400 transition-all">
                    </div>
                    <div>
                        <label class="block text-sm font-extrabold text-zinc-800 mb-2">Penerbit <span class="text-red-500">*</span></label>
                        <input type="text" name="publisher" value="{{ old('publisher', $book->publisher) }}" 
                               class="w-full px-5 py-3.5 bg-zinc-50/50 border border-zinc-200 rounded-2xl text-sm font-medium focus:outline-none focus:ring-4 focus:ring-zinc-900/5 focus:border-zinc-400 transition-all">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-7">
                    <div>
                        <label class="block text-sm font-extrabold text-zinc-800 mb-2">Tahun Terbit <span class="text-red-500">*</span></label>
                        <input type="number" name="year" value="{{ old('year', $book->year) }}" min="1000" max="{{ date('Y') }}"
                               class="w-full px-5 py-3.5 bg-zinc-50/50 border border-zinc-200 rounded-2xl text-sm font-medium focus:outline-none focus:ring-4 focus:ring-zinc-900/5 focus:border-zinc-400 transition-all">
                    </div>
                    <div>
                        <label class="block text-sm font-extrabold text-zinc-800 mb-2">Klasifikasi <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <select name="category" class="w-full px-5 py-3.5 bg-zinc-50/50 border border-zinc-200 rounded-2xl text-sm font-medium focus:outline-none focus:ring-4 focus:ring-zinc-900/5 focus:border-zinc-400 transition-all appearance-none cursor-pointer">
                                <option value="" disabled>Pilih Kategori...</option>
                                @foreach(['Fiksi','Non-Fiksi','Sains','Teknologi','Sejarah','Biografi','Agama','Pendidikan','Bisnis','Lainnya'] as $cat)
                                    <option value="{{ $cat }}" {{ old('category', $book->category) === $cat ? 'selected' : '' }}>{{ $cat }}</option>
                                @endforeach
                            </select>
                            <svg class="w-5 h-5 absolute right-4 top-1/2 -translate-y-1/2 text-zinc-400 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4"/></svg>
                        </div>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-extrabold text-zinc-800 mb-2">Catatan / Sinopsis <span class="text-red-500">*</span></label>
                    <textarea name="description" rows="4" 
                              class="w-full px-5 py-4 bg-zinc-50/50 border border-zinc-200 rounded-2xl text-sm font-medium focus:outline-none focus:ring-4 focus:ring-zinc-900/5 focus:border-zinc-400 transition-all resize-y">{{ old('description', $book->description) }}</textarea>
                </div>

                <div class="pt-3">
                    <label class="block text-sm font-extrabold text-zinc-800 mb-3">Ganti Cover Literatur <span class="text-zinc-400 font-medium ml-1">(Opsional)</span></label>
                    
                    @if($book->cover)
                    <div class="mb-4 flex items-start gap-4 p-4 rounded-2xl bg-zinc-50 border border-zinc-200/60">
                        <img src="{{ asset('storage/' . $book->cover) }}" alt="Cover Saat Ini" class="h-24 w-16 object-cover rounded shadow-sm">
                        <div class="flex-1">
                            <p class="text-sm font-extrabold text-zinc-800">Cover Saat Ini Terpasang</p>
                            <p class="text-xs font-medium text-zinc-500 mt-1">Mengunggah gambar baru akan menggantikan cover ini.</p>
                        </div>
                    </div>
                    @endif

                    <div class="group relative flex flex-col items-center justify-center w-full px-6 py-8 border-2 border-zinc-200 border-dashed rounded-3xl hover:border-zinc-900 hover:bg-zinc-50 transition-all bg-white cursor-pointer" onclick="document.getElementById('cover').click()">
                        <div class="space-y-2 text-center flex flex-col items-center">
                            <div class="w-12 h-12 bg-zinc-100 text-zinc-400 rounded-full flex items-center justify-center mb-2 group-hover:bg-zinc-200 group-hover:text-zinc-600 transition-colors">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/></svg>
                            </div>
                            <div class="text-sm text-zinc-600 font-bold">
                                {{ $book->cover ? 'Pilih file cover baru' : 'Klik untuk mengunggah file cover' }}
                            </div>
                            <p class="text-xs text-zinc-400 font-medium">PNG, JPG atau WEBP (Maks 2MB)</p>
                        </div>
                        <input id="cover" name="cover" type="file" class="hidden" accept="image/*">
                    </div>
                </div>
            </div>

            <div class="mt-10 flex flex-col sm:flex-row gap-3 pt-6 border-t border-zinc-100">
                <a href="{{ route('books.index') }}" class="px-8 py-3.5 rounded-2xl text-sm font-extrabold text-zinc-600 bg-zinc-100 hover:bg-zinc-200 transition-colors text-center order-2 sm:order-1">Batal</a>
                <button type="submit" class="flex-1 px-8 py-3.5 bg-zinc-900 hover:bg-zinc-800 text-white rounded-2xl text-sm font-extrabold transition-all shadow-md hover:shadow-lg text-center order-1 sm:order-2">Simpan Pembaruan</button>
            </div>
        </form>
    </div>
</div>
@endsection
