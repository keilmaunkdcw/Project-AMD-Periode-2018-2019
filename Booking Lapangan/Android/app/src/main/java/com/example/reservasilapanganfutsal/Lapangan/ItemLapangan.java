package com.example.reservasilapanganfutsal.Lapangan;

import com.google.gson.annotations.SerializedName;

public class ItemLapangan {
    @SerializedName("jenis_lapangan")
    private String jenis_lapangan;

    @SerializedName("lapangan")
    private String lapangan;

    @SerializedName("gambar")
    private String gambar;

    @SerializedName("harga")
    private String harga;

    public String getJenis_lapangan() {
        return jenis_lapangan;
    }

    public void setJenis_lapangan(String jenis_lapangan) {
        this.jenis_lapangan = jenis_lapangan;
    }

    public String getLapangan() {
        return lapangan;
    }

    public void setLapangan(String lapangan) {
        this.lapangan = lapangan;
    }

    public String getGambar() {
        return gambar;
    }

    public void setGambar(String gambar) {
        this.gambar = gambar;
    }

    public String getHarga() {
        return harga;
    }

    public void setHarga(String harga) {
        this.harga = harga;
    }
}

