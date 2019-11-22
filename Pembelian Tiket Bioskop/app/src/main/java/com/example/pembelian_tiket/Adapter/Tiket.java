package com.example.pembelian_tiket.Adapter;

public class Tiket {
    private String Nama;
    private String Jam_Tayang;
    private String Hari;
    private int No_kursi;
    private int Jumlah_tiket;
    private int Total_harga;

    public Tiket(String nama, String jam_tayang, String hari, int no_kursi, int jumlah_tiket, int total_harga) {
        Nama = nama;
        Jam_Tayang = jam_tayang;
        Hari = hari;
        No_kursi = no_kursi;
        Jumlah_tiket = jumlah_tiket;
        Total_harga = total_harga;
    }


    public String getNama() {
        return Nama;

    }

    public String getJam_tayang() {
        return Jam_Tayang;
    }

    public String getHari() {
        return Hari;
    }

    public int getNo_kursi() {
        return No_kursi;
    }

    public int getJumlah_tiket() {
        return Jumlah_tiket;
    }

    public int getTotal_harga() {
        return Total_harga;
    }

    public void setNama(String nama) {
        Nama = nama;


    }

    public void setJam_tayang(String jam_tayang) {
        this.Jam_Tayang = jam_tayang;
    }

    public void setHari(String hari) {
        Hari = hari;
    }

    public void setNo_kursi(int no_kursi) {
        No_kursi = no_kursi;
    }

    public void setJumlah_tiket(int jumlah_tiket) {
        Jumlah_tiket = jumlah_tiket;
    }

    public void setTotal_harga(int total_harga) {
        Total_harga = total_harga;
    }
}