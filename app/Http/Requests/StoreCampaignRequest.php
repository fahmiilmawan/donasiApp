<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCampaignRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'judul' => 'required',
            'deskripsi' => 'required',
            'target_donasi' => 'required',
            'donasi_terkumpul' => 'nullable',
            'tanggal_dimulai' => 'required',
            'tanggal_berakhir' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5120',

        ];
    }

    public function messages() : array
    {
        return [
            'judul.required' => 'Judul Harus Diisi!',
            'deskripsi.required' => 'Deskripsi Harus Diisi!',
            'target_donasi.required' => 'Target Donasi Harus Diisi!',
            'tanggal_dimulai.required' => 'Tanggal Dimulai Harus Diisi!',
            'tanggal_berakhir.required' => 'Tanggal Berakhir Harus Diisi!',
            'foto.image' => 'Foto Harus Berupa Gambar!',
            'foto.mimes' => 'Foto Harus Berupa File JPEG, PNG, JPG, GIF, atau SVG!',
            'foto.max' => 'Foto Harus Berukuran Maksimal 5MB!',
        ];
    }
}
