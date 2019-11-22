package com.example.poliklinik.Model;

public class Model_daftaruser {
    private String nama;
    private String username;
    private String password;
    private String status;

    public Model_daftaruser(String nama, String username, String password, String status) {
        this.nama = nama;
        this.username = username;
        this.password = password;
        this.status = status;
    }

    public String getNama() {
        return nama;
    }

    public void setNama(String nama) {
        this.nama = nama;
    }

    public String getUsername() {
        return username;
    }

    public void setUsername(String username) {
        this.username = username;
    }

    public String getPassword() {
        return password;
    }

    public void setPassword(String password) {
        this.password = password;
    }

    public String getStatus() {
        return status;
    }

    public void setStatus(String status) {
        this.status = status;
    }
}