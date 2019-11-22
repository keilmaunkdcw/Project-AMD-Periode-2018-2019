package com.example.pembelian_tiket.databases;

import android.content.ContentValues;
import android.content.Context;
import android.database.SQLException;
import android.database.sqlite.SQLiteDatabase;

import com.example.pembelian_tiket.Adapter.Tiket;

public class DBTiket {
    private SQLiteDatabase database;
    private DBhelper dbHelper;
    private String[] allColumns = {
            dbHelper.Nama,
            dbHelper.jam_tayang,
            dbHelper.Hari,
            dbHelper.No_kursi,
            dbHelper.Jumlah_tiket,
            dbHelper.Total_harga };

   public DBTiket(Context context){
        dbHelper = new DBhelper(context);

    }

    public void open () throws SQLException {
        database = dbHelper.getWritableDatabase();

    }

    public void close () {
        dbHelper.close();
    }
    public long insertTiket (Tiket tiket){
        ContentValues values = new ContentValues();
        values.put(dbHelper.Nama, tiket.getNama());
        values.put(dbHelper.jam_tayang, tiket.getJam_tayang());
        values.put(dbHelper.Hari, tiket.getHari());
        values.put(dbHelper.No_kursi, tiket.getNo_kursi());
        values.put(dbHelper.Jumlah_tiket, tiket.getJumlah_tiket());
        values.put(dbHelper.Total_harga, tiket.getTotal_harga());
        long insertId = database.insert(dbHelper.TABEL_NAME, null, values);
        return insertId;

    }

}

