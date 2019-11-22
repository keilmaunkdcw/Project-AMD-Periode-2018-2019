package com.example.poliklinik.Model;

import java.util.List;

public class DataDokterResponse {
   private boolean error;
   private String message;
   private List<DokterListItem> data;

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

    public List<DokterListItem> getData() {
        return data;
    }

    public void setData(List<DokterListItem> data) {
        this.data = data;
    }
}
