package com.example.poliklinik.Model;

import java.util.List;

public class DataPasienResponse {
    private boolean error;
    private String message;
    private List<PasienListItem> data;

    public boolean isError() {
        return error;
    }

    public void setError(boolean error) {
        this.error = error;
    }

    public String getMessage() {
        return message;
    }

    public void setMessage(String message) {
        this.message = message;
    }

    public List<PasienListItem> getData() {
        return data;
    }

    public void setData(List<PasienListItem> data) {
        this.data = data;
    }
}
