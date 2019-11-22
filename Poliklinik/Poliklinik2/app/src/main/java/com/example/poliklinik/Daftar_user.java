package com.example.poliklinik;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import com.example.poliklinik.Api.Client;
import com.example.poliklinik.Api.InterfaceDaftar;
import com.example.poliklinik.Model.DaftarResponse;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class Daftar_user extends AppCompatActivity {

    private EditText et_nama,et_user,et_pass;
    private Button btn_login;
    private String nama,user,pass;
    private InterfaceDaftar mInterfaceDaftar;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_daftar_user);

        et_nama = (EditText) findViewById(R.id.et_nama);
        et_user = (EditText) findViewById(R.id.et_user);
        et_pass = (EditText) findViewById(R.id.et_pass);
        btn_login = (Button) findViewById(R.id.btn_login);

        mInterfaceDaftar = (InterfaceDaftar) Client.getClient().create(InterfaceDaftar.class);

        btn_login.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                nama = et_nama.getText().toString();
                user = et_user.getText().toString();
                pass = et_pass.getText().toString();

                if(nama.isEmpty()){
                    et_nama.setError("Nama Masih Kosong");
                    return;
                }else if(user.isEmpty()){
                    et_user.setError("Username Masih Kosong");
                    return;
                }else if(pass.isEmpty()){
                    et_pass.setError("Password Masih Kosong");
                    return;
                }

                mInterfaceDaftar.daftarRequest(nama,user,pass).enqueue(new Callback<DaftarResponse>() {
                    @Override
                    public void onResponse(Call<DaftarResponse> call, Response<DaftarResponse> response) {
                        DaftarResponse daftarResponse = (DaftarResponse) response.body();
                        if(!daftarResponse.isError()){
                            Toast.makeText(Daftar_user.this, daftarResponse.getMessage(), Toast.LENGTH_SHORT).show();
                            Intent intent = new Intent(Daftar_user.this,MainActivity.class);
                            startActivity(intent);
                        }else{
                            Toast.makeText(Daftar_user.this, daftarResponse.getMessage(), Toast.LENGTH_SHORT).show();
                        }
                    }

                    @Override
                    public void onFailure(Call<DaftarResponse> call, Throwable t) {

                    }
                });
            }
        });
    }
}
