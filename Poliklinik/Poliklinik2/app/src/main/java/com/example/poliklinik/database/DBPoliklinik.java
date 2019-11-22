package com.example.poliklinik.database;

import android.content.ContentValues;
import android.content.Context;
import android.database.Cursor;
import android.database.SQLException;
import android.database.sqlite.SQLiteDatabase;
import com.example.poliklinik.Model.Model_daftaruser;
import com.example.poliklinik.Model.Model_datauser;

public class DBPoliklinik {
    private SQLiteDatabase database;
    private DBHelper dbHelper;

    public DBPoliklinik(Context context){
        dbHelper = new DBHelper(context);
    }

    public void open() throws SQLException {
        database = dbHelper.getWritableDatabase();
    }

    public void close() {
        dbHelper.close();
    }

    //input Login user
    public long inputLogin(Model_daftaruser daftaruser){
        ContentValues valuesLogin = new ContentValues();
        valuesLogin.put(dbHelper.nama_user, daftaruser.getNama());
        valuesLogin.put(dbHelper.username, daftaruser.getUsername());
        valuesLogin.put(dbHelper.password, daftaruser.getPassword());
        valuesLogin.put(dbHelper.status, daftaruser.getStatus());
        long insertIdUser = database.insert(DBHelper.TABLE_LOGIN,null,valuesLogin);
        return insertIdUser;
    }

    //check Login
    public boolean checkLogin(String username, String password){
        Cursor cursor = database.rawQuery("SELECT * FROM "+dbHelper.TABLE_LOGIN+" WHERE username=? AND password=?", new String[]{username,password});
        if(cursor != null) {
            int cursorCount = cursor.getCount();
            if (cursorCount > 0) {
                Model_datauser model_datauser= new Model_datauser();
                model_datauser.setNama(cursor.getString(cursor.getColumnIndex(DBHelper.nama_user)));
                return true;
            }
        }
        close();
        return false;
    }

}
