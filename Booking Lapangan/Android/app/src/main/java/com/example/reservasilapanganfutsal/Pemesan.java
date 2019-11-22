package com.example.reservasilapanganfutsal;

import android.app.DatePickerDialog;
import android.app.ProgressDialog;
import android.app.TimePickerDialog;
import android.content.Intent;
import android.os.Bundle;
import android.support.annotation.Nullable;
import android.support.v7.app.AppCompatActivity;
import android.text.format.DateFormat;
import android.view.View;
import android.widget.Button;
import android.widget.DatePicker;
import android.widget.EditText;
import android.widget.Spinner;
import android.widget.TextView;
import android.widget.TimePicker;
import android.widget.Toast;

import com.example.reservasilapanganfutsal.Model.Value;
import com.example.reservasilapanganfutsal.api.RegiterAPI;
import com.google.gson.Gson;
import com.google.gson.GsonBuilder;

import java.text.SimpleDateFormat;
import java.util.Calendar;
import java.util.Locale;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;
import retrofit2.Retrofit;
import retrofit2.converter.gson.GsonConverterFactory;


public class Pemesan extends AppCompatActivity {
    private static final String URL = "http://192.168.43.164/futsalapps/";
    private ProgressDialog mProgressDialog;
    private DatePickerDialog datePickerDialog;
    private EditText et_nama, et_nik, et_no_hp, et_alamat, et_lama_jam_sewa;
    private TextView tv_tgl_sewa, tv_jam_mulai;
    private Button btn_send, btn_lihat;
    private SimpleDateFormat dateFormatter = new SimpleDateFormat("yyyy MM dd", Locale.US);

    String nama, nik, alamat, tgl_sewa, jammulai, lamajamsewa, lapangan, notelp;

    @Override
    protected void onCreate(@Nullable Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);


        et_nama = (EditText) findViewById(R.id.et_nama);
        et_nik = (EditText) findViewById(R.id.et_nik);
        et_no_hp = (EditText) findViewById(R.id.et_no_hp);
        et_alamat = (EditText) findViewById(R.id.et_alamat);
        tv_tgl_sewa = (TextView) findViewById(R.id.tv_tgl_sewa);
        tv_jam_mulai = (TextView) findViewById(R.id.tv_jam_mulai);
        et_lama_jam_sewa = (EditText) findViewById(R.id.et_lawa_jam_sewa);
        btn_send = (Button) findViewById(R.id.btn_send);
        btn_lihat = (Button) findViewById(R.id.btn_lihat);
        tv_tgl_sewa.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                showDataDialog();
            }
        });
        tv_jam_mulai.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                showTimeDialogMulai();
            }
        });
        btn_lihat.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(Pemesan.this, Pemesanan.class);
                startActivity(intent);
            }
        });
        btn_send.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Toast.makeText(Pemesan.this, "", Toast.LENGTH_SHORT).show();
                Mengirim_Data();
            }
        });
    }


    private void Mengirim_Data() {
        //untuk menampilkan progresDioalog
        mProgressDialog = new ProgressDialog(this);
        mProgressDialog.setCancelable(false);
        mProgressDialog.setMessage("Loading....");
        mProgressDialog.show();

        nama = et_nama.getText().toString();
        nik = et_nik.getText().toString();
        notelp = et_no_hp.getText().toString();
        alamat = et_alamat.getText().toString();
        tgl_sewa = tv_tgl_sewa.getText().toString();
        jammulai = tv_jam_mulai.getText().toString();
        lamajamsewa = et_lama_jam_sewa.getText().toString();

        Gson gson = new GsonBuilder() .setLenient() .create();
        Retrofit retrofit = new Retrofit.Builder()
                .baseUrl(URL)
                .addConverterFactory(GsonConverterFactory.create(gson))
                .build();
        RegiterAPI api = retrofit.create(RegiterAPI.class);
        Call<Value> call = api.booking(nama,nik,notelp,alamat,lapangan,tgl_sewa,jammulai,lamajamsewa);
        call.enqueue(new Callback<Value>() {
            @Override
            public void onResponse(Call<Value> call, Response<Value> response) {
                String value = response.body().getValue();
                String message = response.body().getMessage();
                mProgressDialog.dismiss();
                if (value.equals("1")) {
                    Toast.makeText(Pemesan.this, message, Toast.LENGTH_SHORT).show();
                } else {
                    Toast.makeText(Pemesan.this, message, Toast.LENGTH_SHORT).show();
                }
            }

            @Override
            public void onFailure(Call<Value> call, Throwable t) {
                mProgressDialog.dismiss();
                Toast.makeText(Pemesan.this, "Jaringan error", Toast.LENGTH_SHORT).show();
            }
        });
    }

    private void showDataDialog() {
        // Calendar untuk mendapatkan tanggal sekarang
        Calendar newCalendar = Calendar.getInstance();

        //inisialisasi datePickerDialog
        datePickerDialog = new DatePickerDialog(Pemesan.this, new DatePickerDialog.OnDateSetListener() {


            @Override
            public void onDateSet(DatePicker view, int year, int monthOfYear, int dayOfMonth) {

                //akan diapanggi saat selesai memilih tanggal di DatePicker
                Calendar newDate = Calendar.getInstance();

                //masukkan Calendar untuk menampung tanggal yang dipilih
                newDate.set(year, monthOfYear, dayOfMonth);

                //update TextView dengan tanggal yang kita pilih
                tv_tgl_sewa.setText(dateFormatter.format(newDate.getTime()));
            }

        }, newCalendar.get(Calendar.YEAR), newCalendar.get(Calendar.MONTH), newCalendar.get(Calendar.DAY_OF_MONTH));

        datePickerDialog.show();
    }


    private void showTimeDialogMulai() {

        //Calendar untuk mendapatkan waktu saat ini
        Calendar calendar = Calendar.getInstance();

        // Initialize TimePicker Dialog
        TimePickerDialog timePickerDialog = new TimePickerDialog(Pemesan.this, new TimePickerDialog.OnTimeSetListener() {
            @Override
            public void onTimeSet(TimePicker view, int hourOfDay, int minute) {

                // Method ini dipanggil saat kita selesai memilih waktu di DatePicker
                tv_jam_mulai.setText(+ hourOfDay + ":" + minute);
            }
        },
                //Tampilkan jam saat ini ketika TimePicker pertama kali dibuka
                calendar.get(Calendar.HOUR_OF_DAY), calendar.get(Calendar.MINUTE),

                //Cek apakah format waktu menggunakan 24-hour format
                DateFormat.is24HourFormat(Pemesan.this));

        timePickerDialog.show();
    }
}




