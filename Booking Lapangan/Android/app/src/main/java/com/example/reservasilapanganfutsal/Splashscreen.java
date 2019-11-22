package com.example.reservasilapanganfutsal;

import android.content.Intent;
import android.os.Handler;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;

import com.example.reservasilapanganfutsal.Lapangan.Listlapangan;
import com.example.reservasilapanganfutsal.Lapangan.MainActivity;

public class Splashscreen extends AppCompatActivity {
    //set waktu lama sPlashscreen
    private static int LamaTampilSplash = 3000;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_splashscreen);

    new Handler().postDelayed(new Runnable() {
            @Override
            public void run() {

                // to do auto generated stub
                Intent intent = new Intent(Splashscreen.this, MainActivity.class);
                startActivity(intent);

                // jeda setelah splashscren
                this.selesai();
            }

            private void selesai() {
                //auto

            }
        }, LamaTampilSplash);
    }
}
