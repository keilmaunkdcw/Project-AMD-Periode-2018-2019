package com.example.poliklinik.Model;

public class AntriResponse {
    private boolean error;
    private String no_antri;
    private String no_konfirmasi;
    private String nama_pasien;
    private String spesialis;
    private String dokter;
    private String message;

    public AntriResponse(boolean error, String no_antri, String no_konfirmasi, String nama_pasien, String spesialis, String dokter, String message) {
        this.error = error;
        this.no_antri = no_antri;
        this.no_konfirmasi = no_konfirmasi;
        this.nama_pasien = nama_pasien;
        this.spesialis = spesialis;
        this.dokter = dokter;
        this.message = message;
    }

    public boolean isError() {
        return error;
    }

    public void setError(boolean error) {
        this.error = error;
    }

    public String getNo_antri() {
        return no_antri;
    }

    public void setNo_antri(String no_antri) {
        this.no_antri = no_antri;
    }

    public String getNo_konfirmasi() {
        return no_konfirmasi;
    }

    public void setNo_konfirmasi(String no_konfirmasi) {
        this.no_konfirmasi = no_konfirmasi;
    }

    public String getNama_pasien() {
        return nama_pasien;
    }

    public void setNama_pasien(String nama_pasien) {
        this.nama_pasien = nama_pasien;
    }

    public String getSpesialis() {
        return spesialis;
    }

    public void setSpesialis(String spesialis) {
        this.spesialis = spesialis;
    }

    public String getDokter() {
        return dokter;
    }

    public void setDokter(String dokter) {
        this.dokter = dokter;
    }

    public String getMessage() {
        return message;
    }

    public void setMessage(String message) {
        this.message = message;
    }
}
