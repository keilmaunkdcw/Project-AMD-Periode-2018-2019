package com.example.pembelian_tiket;

import android.app.DatePickerDialog;
import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Spinner;
import android.widget.Toast;

import java.lang.reflect.Array;
import java.text.SimpleDateFormat;
import java.util.ArrayList;
import java.util.Locale;

import com.example.pembelian_tiket.Adapter.Tiket;
import com.example.pembelian_tiket.databases.DBTiket;

public class PembayaranActivity extends AppCompatActivity {

    private EditText Nama;
    private Spinner Hari, Jam_tayang;
    private EditText No_kursi, Jumlah_tiket, Total_harga;
    private Button Beli, Keluar;
    private DBTiket dbTiket;

    private DatePickerDialog datePickerDialog;
    private SimpleDateFormat dateFormatter = new SimpleDateFormat("dd MMM yyyy", Locale.US);

    String nama, hari, jam_Tayang,kursi,tiket,harga;
    int no_kursi=0, jumlah_tiket=0, total_harga=0;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_pembayaran);


        dbTiket = new DBTiket(getApplicationContext());
        dbTiket.open();

        Nama = (EditText) findViewById(R.id.Nama);
        Hari = (Spinner) findViewById(R.id.Hari);
        Jam_tayang = (Spinner) findViewById(R.id.jam_tayang);
        No_kursi = (EditText) findViewById(R.id.No_kursi);
        Jumlah_tiket = (EditText) findViewById(R.id.Jumlah_tiket);
        Total_harga = (EditText) findViewById(R.id.Total_harga);
        Beli = (Button) findViewById(R.id.Beli);
        Keluar = (Button) findViewById(R.id.Keluar);
        Keluar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(PembayaranActivity.this, FilmActivity.class);
                startActivity(intent);
            }
        });

        Beli.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                SimpanData();
            }
        });
        ArrayAdapter<CharSequence> adapterHari = ArrayAdapter.createFromResource(this,R.array.Hari,R.layout.spinnertext);
        Hari.setAdapter(adapterHari);

        ArrayAdapter<CharSequence> adapterJam = ArrayAdapter.createFromResource(this,R.array.jam_tayang,R.layout.spinnertext);
        Jam_tayang.setAdapter(adapterJam);
    }
    private void SimpanData() {
        nama = Nama.getText().toString();
        hari = Hari.getSelectedItem().toString();
        jam_Tayang = Jam_tayang.getSelectedItem().toString();
        kursi = No_kursi.getText().toString();
        tiket = Jumlah_tiket.getText().toString();
        harga = Total_harga.getText().toString();
        no_kursi = Integer.parseInt(kursi);
        jumlah_tiket = Integer.parseInt(tiket);
        total_harga = Integer.parseInt(harga);

//        if(nama.isEmpty()|| film.isEmpty() || hari.isEmpty() ||jam_Tayang.isEmpty() || tiket.isEmpty() ||kursi.isEmpty() ||harga.isEmpty()){
//            Toast.makeText(this,"data masi kosong",TooiNGTH_SHORT).show();
//            return;
//        }
        Tiket tiket = new Tiket(nama,jam_Tayang,hari,no_kursi,jumlah_tiket,total_harga);
        Long IDdata = dbTiket.insertTiket(tiket);

        if(IDdata != -1){
            Toast.makeText(this, "Sukses Menginput Nomor Kursi Anda "+no_kursi, Toast.LENGTH_SHORT).show();
            Intent a = new Intent(PembayaranActivity.this, HasilActivity.class);
            a.putExtra("data1", String.valueOf(nama));
            a.putExtra("data3", String.valueOf(hari));
            a.putExtra("data4", String.valueOf(jam_Tayang));
            a.putExtra("data5", String.valueOf(no_kursi));
            a.putExtra("data6", String.valueOf(jumlah_tiket));
            a.putExtra("data7", String.valueOf(total_harga));
            startActivity(a);
        }else{
            Toast.makeText(this, "Gagal Menginput Data Karena Kursi "+no_kursi+" Sudah Terisi" , Toast.LENGTH_SHORT).show();
        }



    }
}

