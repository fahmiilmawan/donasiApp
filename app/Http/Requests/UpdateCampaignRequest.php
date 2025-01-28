<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCampaignRequest extends FormRequest
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
            'donasi_terkumpul' => 'required',
            'tanggal_dimulai' => 'required',
            'tanggal_berakhir' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
        ];
    }

    public function messages():array
    {
        return [
            'judul.required' => 'Judul campaign wajib diisi',
            'deskripsi.required' => 'Deskripsi campaign wajib diisi',
            'target_donasi.required' => 'Target donasi wajib diisi',
            'donasi_terkumpul.required' => 'Donasi terkumpul wajib diisi',
            'tanggal_dimulai.required' => 'Tanggal dimulai wajib diisi',
            'tanggal_berakhir.required' => 'Tanggal berakhir wajib diisi',
            'foto.image' => 'Foto campaign wajib berupa gambar',
            'foto.mimes' => 'Foto campaign wajib berupa file JPEG, PNG, JPG, GIF, atau SVG',
            'foto.max' => 'Foto campaign wajib berukuran maksimal 5MB',
        ];
    }
}
