package com.example.pembelian_tiket.databases;

import android.content.Context;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;

public class DBhelper extends SQLiteOpenHelper {

    private static final int DATABASE_VERSION = 1;
    private static final String DATABASE_NAME = "pembelian_tiket";
    public static final String TABEL_NAME = "Pembelian_tiket";

    public static final String Nama = "Nama";
    public static final String jam_tayang ="jam_tayang";
    public static final String Hari ="Hari";
    public static final String No_kursi ="No_kursi";
    public static final String Jumlah_tiket ="Jumlah_tiket";
    public static final String Total_harga ="Total_harga";


    public DBhelper(Context context){

        super(context, DATABASE_NAME, null, DATABASE_VERSION);
    }


    @Override
    public void onCreate(SQLiteDatabase db) {

        String CREATE_DB_PESERTA = " CREATE TABLE "
                +TABEL_NAME+"("
                +Nama+" VARCHAR (30) NOT NULL,"
                +jam_tayang+ " VARCHAR (30) NOT NULL,"
                +Hari+ " VARCHAR (30) NOT NULL,"
                +No_kursi+" INTEGER (30) PRIMARY KEY NOT NULL,"
                +Jumlah_tiket+" VARCHAR (15) NOT NULL,"
                +Total_harga+" INTEGER (50) NOT NULL "+")";
        db.execSQL(CREATE_DB_PESERTA);
    }

    @Override
    public void onUpgrade(SQLiteDatabase db, int oldVersion, int newVersion) {
        db.execSQL("DROP TABLE IF EXISTS "+TABEL_NAME);
        onCreate(db);

    }
}

