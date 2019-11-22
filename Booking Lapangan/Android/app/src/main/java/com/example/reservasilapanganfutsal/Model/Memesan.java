package com.example.reservasilapanganfutsal.Model;

import android.app.DatePickerDialog;
import android.app.TimePickerDialog;


import com.google.gson.annotations.SerializedName;

import java.text.DateFormat;

public class Memesan {
    @SerializedName("kodeunik")
    private String kodeunik;

    @SerializedName("nama")
    private String nama;

    @SerializedName("nik")
    private String nik;

    @SerializedName("notelp")
    private String notelp;

    @SerializedName("alamat")
    private String alamat;

    @SerializedName("lapangan")
    private String lapangan;

    @SerializedName("tgl_sewa")
    private String tgl_sewa;

    @SerializedName("jammulai")
    private String jammulai;

    @SerializedName("lamajamsewa")
    private String lamajamsewa;

    @SerializedName("status")
    private String status;

    public Memesan(String kodeunik, String nama, String nik, String notelp, String alamat, String lapangan, String tgl_sewa, String jammulai, String lamajamsewa, String status) {
        this.kodeunik = kodeunik;
        this.nama = nama;
        this.nik = nik;
        this.notelp = notelp;
        this.alamat = alamat;
        this.lapangan = lapangan;
        this.tgl_sewa = tgl_sewa;
        this.jammulai = jammulai;
        this.lamajamsewa = lamajamsewa;
        this.status = status;
    }

    public String getKodeunik() {
        return kodeunik;
    }

    public void setKodeunik(String kodeunik) {
        this.kodeunik = kodeunik;
    }

    public String getNama() {
        return nama;
    }

    public void setNama(String nama) {
        this.nama = nama;
    }

    public String getNik() {
        return nik;
    }

    public void setNik(String nik) {
        this.nik = nik;
    }

    public String getNotelp() {
        return notelp;
    }

    public void setNotelp(String notelp) {
        this.notelp = notelp;
    }

    public String getAlamat() {
        return alamat;
    }

    public void setAlamat(String alamat) {
        this.alamat = alamat;
    }

    public String getLapangan() {
        return lapangan;
    }

    public void setLapangan(String lapangan) {
        this.lapangan = lapangan;
    }

    public String getTgl_sewa() {
        return tgl_sewa;
    }

    public void setTgl_sewa(String tgl_sewa) {
        this.tgl_sewa = tgl_sewa;
    }

    public String getJammulai() {
        return jammulai;
    }

    public void setJammulai(String jammulai) {
        this.jammulai = jammulai;
    }

    public String getLamajamsewa() {
        return lamajamsewa;
    }

    public void setLamajamsewa(String lamajamsewa) {
        this.lamajamsewa = lamajamsewa;
    }

    public String getStatus() {
        return status;
    }

    public void setStatus(String status) {
        this.status = status;
    }
}

