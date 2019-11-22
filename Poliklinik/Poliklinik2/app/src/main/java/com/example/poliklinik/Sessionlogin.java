package com.example.poliklinik;

import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;

import java.util.HashMap;

public class Sessionlogin {

    SharedPreferences pref;


    SharedPreferences.Editor editor;


    Context _context;

    int PRIVATE_MODE = 0;

    private static final String PREF_NAME = "SessionLogin";

    public static final String IS_LOGIN = "IsLoggedIn";

    public static final String KEY_USERNAME = "username";
    public static final String KEY_NAMA = "nama";
    public static final String KEY_STATUS = "status";

    public Sessionlogin(Context context){
        this._context = context;
        pref = _context.getSharedPreferences(PREF_NAME, PRIVATE_MODE);
        editor = pref.edit();
    }

    public void loginSession(String username,String nama, String status){
        editor.putBoolean(IS_LOGIN, true);
        editor.putString(KEY_USERNAME, username);
        editor.putString(KEY_NAMA, nama);
        editor.putString(KEY_STATUS,status);
        editor.commit();
    }

    public  void logoutUser(){
        editor.clear();
        editor.commit();
        Intent i = new Intent(_context, MainActivity.class);
        i.addFlags(Intent.FLAG_ACTIVITY_CLEAR_TOP);
        i.setFlags(Intent.FLAG_ACTIVITY_NEW_TASK);
        _context.startActivity(i);
    }

    public void checkLogin(){
        if(!this.isLoggedIn()){
            Intent i = new Intent(_context, MainActivity.class);
            i.addFlags(Intent.FLAG_ACTIVITY_CLEAR_TOP);
            i.setFlags(Intent.FLAG_ACTIVITY_NEW_TASK);
            _context.startActivity(i);
        }

    }

    public HashMap<String, String> getUserDetails(){
        HashMap<String, String> user = new HashMap<String, String>();
        user.put(KEY_USERNAME, pref.getString(KEY_USERNAME, null));
        user.put(KEY_NAMA, pref.getString(KEY_NAMA, null));
        user.put(KEY_STATUS, pref.getString(KEY_STATUS, null));
        return user;
    }

    public void saveSPBoolean(String keySP, boolean value){
        editor.putBoolean(keySP, value);
        editor.commit();
    }



    public boolean isLoggedIn(){
        return pref.getBoolean(IS_LOGIN, false);
    }
}
