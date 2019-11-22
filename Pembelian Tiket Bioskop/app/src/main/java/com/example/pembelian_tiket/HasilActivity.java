package com.example.pembelian_tiket;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;
import android.widget.Toast;

public class HasilActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_hasil);

        Button btn_close = (Button) findViewById(R.id.btn_close);
        TextView tvDataHasil1 = (TextView) findViewById(R.id.tv_nama);
        TextView tvDataHasil3 = (TextView) findViewById(R.id.tv_jam);
        TextView tvDataHasil4 = (TextView) findViewById(R.id.tv_hari);
        TextView tvDataHasil5 = (TextView) findViewById(R.id.tv_nomorKursi);
        TextView tvDataHasil6 = (TextView) findViewById(R.id.tv_jumlahTiket);
        TextView tvDataHasil7 = (TextView) findViewById(R.id.tv_totalHarga);

        tvDataHasil1.setText(getIntent().getStringExtra("data1"));
        tvDataHasil3.setText(getIntent().getStringExtra("data3"));
        tvDataHasil4.setText(getIntent().getStringExtra("data4"));
        tvDataHasil5.setText(getIntent().getStringExtra("data5"));
        tvDataHasil6.setText(getIntent().getStringExtra("data6"));
        tvDataHasil7.setText(getIntent().getStringExtra("data7"));

        btn_close.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(HasilActivity.this, FilmActivity.class);
                startActivity(intent);
            }
        });

    }
}
