package com.example.poliklinik.database;

import android.content.Context;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;

public class DBHelper extends SQLiteOpenHelper {
    private static int DATABASE_VERSION = 1;
    private static String DATABASE_NAME = "db_poliklinik";

    //Table Login
    public static final String TABLE_LOGIN = "tabel_login";
    public static final String id_user = "_id";
    public static final String nama_user = "nama_user";
    public static final String username = "username";
    public static final String password = "password";
    public static final String status = "status";

    //Tabel Pasien
    public static final String TABLE_PASIEN = "tabel_pasien";
    public static final String id_pasien = "_id";
    public static final String nama_pasien = "nama_lengkap";
    public static final String agama_pasien = "agama";
    public static final String jk_pasien = "jenis_kelamin";
    public static final String darah_pasien = "golongan_darah";
    public static final String alamat_pasien = "alamat";
    public static final String nohp_pasien = "no_handphone";

    //Tbl Dokter
    public static final String TABLE_DOKTER = "tabel_dokter";
    public static final String id_dokter = "_id";
    public static final String nama_dokter = "nama_lengkap";
    public static final String email_dokter = "email";
    public static final String nowa_dokter = "no_whatsapp";
    public static final String spesialis_dokter = "spesialis";

    //Tbl konsul
    public  static final String TABLE_KONSUL = "tabel_konsul";
    public  static final String id_konsul = "_id";
    public  static final String tgl_konsul = "tanggal";
    public  static final String riwayat_penyakit_konsul = "riwayat_penyakit";
    public  static final String id_pasien_konsul = "id_pasien";
    public static final String id_dokter_konsul = "id_dokter";


    public DBHelper(Context context){
        super(context,DATABASE_NAME,null,DATABASE_VERSION);
    }

    @Override
    public void onCreate(SQLiteDatabase db) {
        String CREATE_DB_TABLE_LOGIN = "CREATE TABLE "
                +TABLE_LOGIN+" ("
                +id_user+ " INTEGER PRIMARY KEY AUTOINCREMENT,"
                +nama_user+ " VARCHAR(30) NOT NULL, "
                +username+ " VARCHAR(30) NOT NULL, "
                +password+ " VARCHAR(30) NOT NULL, "
                +status+ " VARCHAR(15) NOT NULL " + ")";

        String CREATE_DB_TABLE_PASIEN = "CREATE TABLE "
                +TABLE_PASIEN+" ("
                +id_pasien+ " INTEGER PRIMARY KEY AUTOINCREMENT,"
                +nama_pasien+ " VARCHAR(30) NOT NULL, "
                +agama_pasien+ " VARCHAR(12) NOT NULL, "
                +jk_pasien+ " VARCHAR(15) NOT NULL, "
                +darah_pasien+ " VARCHAR(5) NOT NULL, "
                +alamat_pasien+ " VARCHAR(30) NOT NULL, "
                +nohp_pasien+ " VARCHAR(15) NOT NULL " + ")";

        String CREATE_DB_TABLE_DOKTER = "CREATE TABLE "
                +TABLE_DOKTER+ " ("
                +id_dokter+ " INTEGER PRIMARY KEY AUTOINCREMENT,"
                +nama_dokter+ " VARCHAR(30) NOT NULL, "
                +email_dokter+ " VARCHAR(10) NOT NULL, "
                +nowa_dokter+ " VARCHAR(15) NOT NULL, "
                +spesialis_dokter+ " VARCHAR(30) NOT NULL " + ")";

        String CREATE_DB_TABLE_KONSUL = "CREATE TABLE "
                +TABLE_KONSUL+ " ("
                +id_konsul+ " INTEGER PRIMARY KEY AUTOINCREMENT,"
                +tgl_konsul+ " VARCHAR(30) NOT NULL, "
                +riwayat_penyakit_konsul+ " VARCHAR(30) NOT NULL, "
                +id_pasien_konsul+ " VARCHAR(10) NOT NULL, "
                +id_dokter_konsul+ " VARCHAR(30) NOT NULL " + ")";

        db.execSQL(CREATE_DB_TABLE_LOGIN);
        db.execSQL(CREATE_DB_TABLE_PASIEN);
        db.execSQL(CREATE_DB_TABLE_DOKTER);
        db.execSQL(CREATE_DB_TABLE_KONSUL);
    }

    @Override
    public void onUpgrade(SQLiteDatabase db, int oldVersion, int newVersion) {
        db.execSQL("DROP TABLE IF EXISTS "+TABLE_LOGIN);
        db.execSQL("DROP TABLE IF EXISTS "+TABLE_PASIEN);
        db.execSQL("DROP TABLE IF EXISTS "+TABLE_DOKTER);
        db.execSQL("DROP TABLE IF EXISTS "+TABLE_KONSUL);
        onCreate(db);
    }
}
