package com.example.poliklinik.User;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.CardView;
import android.view.View;
import android.widget.TextView;

import com.example.poliklinik.R;

public class halaman_utama_user<activity> extends AppCompatActivity {

    CardView cv_polianak,cv_poligigi,cv_poliumum;
    TextView tv_nama;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_halaman_utama_user);

        cv_polianak = (CardView) findViewById(R.id.cv_polianak);
        cv_poligigi = (CardView) findViewById(R.id.cv_poligigi);
        cv_poliumum = (CardView) findViewById(R.id.cv_poliumum);
        tv_nama = (TextView) findViewById(R.id.tv_namauser);

        tv_nama.setText("Anu");

        cv_polianak.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                pindahActivity(listdokter.class);
            }
        });

        cv_poligigi.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                pindahActivity(menu_poligigi.class);
            }
        });

        cv_poliumum.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                pindahActivity(menu_poliumum.class);
            }
        });

    }

    private void pindahActivity(Class activity){
        Intent intent = new Intent(halaman_utama_user.this,activity);
        startActivity(intent);
    }
}
