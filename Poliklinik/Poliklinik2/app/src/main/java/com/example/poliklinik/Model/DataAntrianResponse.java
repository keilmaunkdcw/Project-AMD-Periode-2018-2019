package com.example.poliklinik.Model;

import java.util.List;

public class DataAntrianResponse {
    private boolean error;
    private String message;
    private List<AntrianListItem> data;

    public DataAntrianResponse(boolean error, String message, List<AntrianListItem> data) {
        this.error = error;
        this.message = message;
        this.data = data;
    }

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

    public List<AntrianListItem> getData() {
        return data;
    }

    public void setData(List<AntrianListItem> data) {
        this.data = data;
    }
}
