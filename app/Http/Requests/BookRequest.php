<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [
            'title'       => 'required|string|max:255',
            'author'      => 'required|string|max:255',
            'publisher'   => 'required|string|max:255',
            'year'        => 'required|integer|min:1000|max:' . date('Y'),
            'category'    => 'required|string|max:100',
            'description' => 'required|string',
        ];

        if ($this->isMethod('post')) {
            $rules['cover'] = 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048';
        } else {
            $rules['cover'] = 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048';
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'title.required'       => 'Judul buku wajib diisi.',
            'title.max'            => 'Judul buku maksimal 255 karakter.',
            'author.required'      => 'Nama penulis wajib diisi.',
            'publisher.required'   => 'Nama penerbit wajib diisi.',
            'year.required'        => 'Tahun terbit wajib diisi.',
            'year.integer'         => 'Tahun terbit harus berupa angka.',
            'year.min'             => 'Tahun terbit tidak valid.',
            'year.max'             => 'Tahun terbit tidak boleh melebihi tahun ini.',
            'category.required'    => 'Kategori buku wajib diisi.',
            'description.required' => 'Deskripsi buku wajib diisi.',
            'cover.image'          => 'File cover harus berupa gambar.',
            'cover.mimes'          => 'Format cover harus jpeg, png, jpg, atau webp.',
            'cover.max'            => 'Ukuran cover maksimal 2MB.',
        ];
    }
}
