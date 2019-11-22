package com.example.pembelian_tiket;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.ImageView;


public class HasilFilmActivity extends AppCompatActivity {

    ImageView selectedImage;
    Button btn_beli;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_hasil_film);
        selectedImage = (ImageView) findViewById(R.id.selectedImage);
        btn_beli = (Button) findViewById(R.id.btn_Beli);
        Intent intent = getIntent();
        selectedImage.setImageResource(intent.getIntExtra("gambar", 0));

        btn_beli.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(HasilFilmActivity.this,PembayaranActivity.class);
                startActivity(intent);
            }
        });
    }
}
