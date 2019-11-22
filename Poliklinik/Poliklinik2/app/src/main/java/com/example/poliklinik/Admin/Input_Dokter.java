package com.example.poliklinik.Admin;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Spinner;
import android.widget.Toast;

import com.example.poliklinik.Api.Client;
import com.example.poliklinik.Api.InterfaceDaftarDokter;
import com.example.poliklinik.Model.DaftarDokterResponse;
import com.example.poliklinik.R;


import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class Input_Dokter extends AppCompatActivity {

    private EditText et_iddokter,et_namadokter,et_email,et_handphone;
    private Spinner spin_spesialis;
    private Button btn_simpan;
    private InterfaceDaftarDokter mInterfaceDaftarDokter;

    String iddokter,namadokter,email,nohandphone,spesialis;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_input__dokter);

        et_iddokter = (EditText) findViewById(R.id.et_iddokter);
        et_namadokter = (EditText) findViewById(R.id.et_namadokter);
        et_email = (EditText) findViewById(R.id.et_email);
        et_handphone = (EditText) findViewById(R.id.et_nohandhpone);
        spin_spesialis = (Spinner) findViewById(R.id.sp_spesialis);
        btn_simpan = (Button) findViewById(R.id.btn_simpan);

        mInterfaceDaftarDokter = (InterfaceDaftarDokter) Client.getClient().create(InterfaceDaftarDokter.class);

        btn_simpan.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                iddokter = et_iddokter.getText().toString();
                namadokter = et_namadokter.getText().toString();
                email = et_email.getText().toString();
                nohandphone = et_handphone.getText().toString();
                spesialis = spin_spesialis.getSelectedItem().toString();

                if(iddokter.isEmpty()){
                    et_iddokter.setError("ID Dokter Masih Kosong");
                    return;
                }else if(namadokter.isEmpty()){
                    et_namadokter.setError("Nama Dokter Masih Kosong");
                    return;
                }else if(email.isEmpty()){
                    et_email.setError("Email Masih Kosong");
                    return;
                }else if(nohandphone.isEmpty()){
                    et_handphone.setError("No Handhpone Masih Kosong");
                    return;
                }else if(spesialis.equals("Spesialis")){
                    Toast.makeText(Input_Dokter.this, "Anda Belum Memilih Spesialis", Toast.LENGTH_SHORT).show();
                    return;
                }

               mInterfaceDaftarDokter.daftarDokter(iddokter,namadokter,email,nohandphone,spesialis).enqueue(new Callback<DaftarDokterResponse>() {
                   @Override
                   public void onResponse(Call<DaftarDokterResponse> call, Response<DaftarDokterResponse> response) {
                       DaftarDokterResponse daftarDokterResponse = (DaftarDokterResponse) response.body();
                       if(!daftarDokterResponse.isError()){
                           Intent intent = new Intent(Input_Dokter.this, Data_dokter.class);
                           startActivity(intent);
                           Toast.makeText(Input_Dokter.this, daftarDokterResponse.getMessage(), Toast.LENGTH_SHORT).show();
                       }else {
                           Toast.makeText(Input_Dokter.this, daftarDokterResponse.getMessage(), Toast.LENGTH_SHORT).show();
                       }
                   }

                   @Override
                   public void onFailure(Call<DaftarDokterResponse> call, Throwable t) {

                   }
               });

            }
        });

    }
}
