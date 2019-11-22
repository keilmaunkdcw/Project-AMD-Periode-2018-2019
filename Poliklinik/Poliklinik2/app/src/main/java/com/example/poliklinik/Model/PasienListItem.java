package com.example.poliklinik.Model;

public class PasienListItem {
    private String no_konfirmasi;
    private String nama;
    private String jenis_kelamin;
    private String gol_darah;
    private String alamat;
    private String umur;
    private String riwayat_penyakit;
    private String no_hp;
    private String tanggal_kunjungan;
    private String nama_dokter;
    private String id_dokter;
    private String user_create;

    public PasienListItem(String no_konfirmasi, String nama, String jenis_kelamin, String gol_darah, String alamat, String umur, String riwayat_penyakit, String no_hp, String tanggal_kunjungan, String nama_dokter, String id_dokter, String user_create) {
        this.no_konfirmasi = no_konfirmasi;
        this.nama = nama;
        this.jenis_kelamin = jenis_kelamin;
        this.gol_darah = gol_darah;
        this.alamat = alamat;
        this.umur = umur;
        this.riwayat_penyakit = riwayat_penyakit;
        this.no_hp = no_hp;
        this.tanggal_kunjungan = tanggal_kunjungan;
        this.nama_dokter = nama_dokter;
        this.id_dokter = id_dokter;
        this.user_create = user_create;
    }

    public String getNo_konfirmasi() {
        return no_konfirmasi;
    }

    public void setNo_konfirmasi(String no_konfirmasi) {
        this.no_konfirmasi = no_konfirmasi;
    }

    public String getNama() {
        return nama;
    }

    public void setNama(String nama) {
        this.nama = nama;
    }

    public String getJenis_kelamin() {
        return jenis_kelamin;
    }

    public void setJenis_kelamin(String jenis_kelamin) {
        this.jenis_kelamin = jenis_kelamin;
    }

    public String getGol_darah() {
        return gol_darah;
    }

    public void setGol_darah(String gol_darah) {
        this.gol_darah = gol_darah;
    }

    public String getAlamat() {
        return alamat;
    }

    public void setAlamat(String alamat) {
        this.alamat = alamat;
    }

    public String getUmur() {
        return umur;
    }

    public void setUmur(String umur) {
        this.umur = umur;
    }

    public String getRiwayat_penyakit() {
        return riwayat_penyakit;
    }

    public void setRiwayat_penyakit(String riwayat_penyakit) {
        this.riwayat_penyakit = riwayat_penyakit;
    }

    public String getNo_hp() {
        return no_hp;
    }

    public void setNo_hp(String no_hp) {
        this.no_hp = no_hp;
    }

    public String getTanggal_kunjungan() {
        return tanggal_kunjungan;
    }

    public void setTanggal_kunjungan(String tanggal_kunjungan) {
        this.tanggal_kunjungan = tanggal_kunjungan;
    }

    public String getNama_dokter() {
        return nama_dokter;
    }

    public void setNama_dokter(String nama_dokter) {
        this.nama_dokter = nama_dokter;
    }

    public String getId_dokter() {
        return id_dokter;
    }

    public void setId_dokter(String id_dokter) {
        this.id_dokter = id_dokter;
    }

    public String getUser_create() {
        return user_create;
    }

    public void setUser_create(String user_create) {
        this.user_create = user_create;
    }
}
