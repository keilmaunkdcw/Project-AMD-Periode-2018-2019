package com.example.pembelian_tiket;

import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.AdapterView;
import android.widget.GridView;

import com.example.pembelian_tiket.Adapter.CostumAdapter;

public class FilmActivity extends AppCompatActivity {

    GridView simpleGrid;
    int logos[] = {R.drawable.logo1, R.drawable.logo2, R.drawable.logo3, R.drawable.logo4, R.drawable.logo5, R.drawable.logo6, R.drawable.logo7, R.drawable.logo8};

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_film);

        simpleGrid = (GridView) findViewById(R.id.simpleGridView);
        CostumAdapter costumAdapter = new CostumAdapter(getApplicationContext(),logos);
        simpleGrid.setAdapter(costumAdapter);

        simpleGrid.setOnItemClickListener(new AdapterView.OnItemClickListener() {
            @Override
            public void onItemClick(AdapterView<?> parent, View view, int position, long id) {
                Intent intent = new Intent(FilmActivity.this,HasilFilmActivity.class);
                intent.putExtra("gambar",logos[position]);
                startActivity(intent);
            }
        });
    }

}
