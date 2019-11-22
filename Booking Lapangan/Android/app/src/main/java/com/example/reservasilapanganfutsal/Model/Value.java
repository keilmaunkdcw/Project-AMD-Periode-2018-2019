package com.example.reservasilapanganfutsal.Model;


import com.example.reservasilapanganfutsal.Lapangan.ItemLapangan;
import com.google.gson.annotations.SerializedName;

import java.util.List;

public class Value {
    @SerializedName("value")
    String value;
    @SerializedName("message")
    String message;
    @SerializedName("result")
    List<Memesan> result;
    @SerializedName("Lapangan")
    private List<ItemLapangan> lapangan;

    public Value(String value, String message, List<Memesan> result, List<ItemLapangan> lapangan) {
        this.value = value;
        this.message = message;
        this.result = result;
        this.lapangan = lapangan;
    }

    public List<ItemLapangan> getLapangan() {
        return lapangan;
    }

    public void setLapangan(List<ItemLapangan> lapangan) {
        this.lapangan = lapangan;
    }

    public String getValue() {
        return value;
    }

    public String getMessage() {
        return message;
    }

    public List<Memesan> getResult() {
        return result;
    }
}
