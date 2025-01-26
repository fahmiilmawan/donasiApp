<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateDonationRequest extends FormRequest
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
            'campaign_id' => 'required|exists:campaigns,id',
            'nama_donatur' => 'required|string',
            'email_donatur' => 'required|email',
            'no_hp_donatur' => 'required|string',
            'jumlah_donasi' => 'required|numeric',
            'pesan' => 'nullable|string',
        ];
    }
    public function messages()
    {
        return [
            'campaign_id.required' => 'Nama campaign harus diisi.',
            'campaign_id.exists' => 'Nama campaign tidak ditemukan.',
            'nama_donatur.required' => 'Nama Donatur harus diisi.',
            'email_donatur.required' => 'Email Donatur harus diisi.',
            'email_donatur.email' => 'Format email tidak valid.',
            'no_hp_donatur.required' => 'Nomor HP Donatur harus diisi.',
            'jumlah_donasi.required' => 'Jumlah Donasi harus diisi.',
            'jumlah_donasi.numeric' => 'Jumlah Donasi harus berupa angka.',
            'pesan.string' => 'Pesan harus berupa teks.',
        ];
    }
}
