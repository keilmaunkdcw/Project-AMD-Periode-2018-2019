package com.example.poliklinik.Model;

public class AntrianListItem {
    private String no_konfirmasi;
    private String nama;
    private String jenis_kelamin;
    private String nama_dokter;
    private String id_dokter;
    private String user_create;
    private String no_antri;

    public AntrianListItem(String no_konfirmasi, String nama, String jenis_kelamin, String nama_dokter, String id_dokter, String user_create, String no_antri) {
        this.no_konfirmasi = no_konfirmasi;
        this.nama = nama;
        this.jenis_kelamin = jenis_kelamin;
        this.nama_dokter = nama_dokter;
        this.id_dokter = id_dokter;
        this.user_create = user_create;
        this.no_antri = no_antri;
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

    public String getNo_antri() {
        return no_antri;
    }

    public void setNo_antri(String no_antri) {
        this.no_antri = no_antri;
    }
}
