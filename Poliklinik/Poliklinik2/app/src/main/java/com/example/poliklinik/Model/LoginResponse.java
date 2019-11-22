package com.example.poliklinik.Model;

public class LoginResponse {
    private boolean error;
    private String status;
    private String username;
    private String nama;

    public LoginResponse(boolean error, String status, String username, String nama) {
        this.error = error;
        this.status = status;
        this.username = username;
        this.nama = nama;
    }

    public boolean isError() {
        return error;
    }

    public void setError(boolean error) {
        this.error = error;
    }

    public String getStatus() {
        return status;
    }

    public void setStatus(String status) {
        this.status = status;
    }

    public String getUsername() {
        return username;
    }

    public void setUsername(String username) {
        this.username = username;
    }

    public String getNama() {
        return nama;
    }

    public void setNama(String nama) {
        this.nama = nama;
    }
}
