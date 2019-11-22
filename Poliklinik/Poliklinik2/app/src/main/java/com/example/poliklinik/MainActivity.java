package com.example.poliklinik;

import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import com.example.poliklinik.Admin.Halamanutama_Admin;
import com.example.poliklinik.Api.Client;
import com.example.poliklinik.Api.InterfaceLogin;
import com.example.poliklinik.Model.LoginResponse;
import com.example.poliklinik.User.Halamanutama_User;

import java.util.HashMap;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class MainActivity extends AppCompatActivity {

    private EditText et_user, et_pass;
    private Button btn_login,btn_daftar;
    private String username,password;
    private InterfaceLogin mInterfaceLogin;
    private Sessionlogin sessionlogin;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        et_user = (EditText) findViewById(R.id.et_user);
        et_pass = (EditText) findViewById(R.id.et_pass);
        btn_login = (Button) findViewById(R.id.btn_login);
        btn_daftar = (Button) findViewById(R.id.btn_reg);

        mInterfaceLogin = (InterfaceLogin) Client.getClient().create(InterfaceLogin.class);

        sessionlogin = new Sessionlogin(getApplicationContext());
        if(sessionlogin.isLoggedIn() == true){
            HashMap<String, String> userData = sessionlogin.getUserDetails();
            if(userData.get(Sessionlogin.KEY_STATUS).equals("user")){
                pindahActivity(Halamanutama_User.class);
            }else if(userData.get(Sessionlogin.KEY_STATUS).equals("admin")){
                pindahActivity(Halamanutama_Admin.class);
            }
        }

        btn_login.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                username = et_user.getText().toString().trim();
                password = et_pass.getText().toString().trim();
                mInterfaceLogin.loginRequest(username,password).enqueue(new Callback<LoginResponse>() {
                    @Override
                    public void onResponse(Call<LoginResponse> call, Response<LoginResponse> response) {
                        LoginResponse loginResponse = (LoginResponse) response.body();
                        if(!loginResponse.isError()){
                            sessionlogin.loginSession(loginResponse.getUsername(),loginResponse.getNama(),loginResponse.getStatus());
                            if(loginResponse.getStatus().equals("user")){
                                pindahActivity(Halamanutama_User.class);
                            }else if(loginResponse.getStatus().equals("admin")){
                                pindahActivity(Halamanutama_Admin.class);
                            }
                        }else{
                            Toast.makeText(MainActivity.this, "Username atau Password salah", Toast.LENGTH_SHORT).show();
                        }
                    }

                    @Override
                    public void onFailure(Call<LoginResponse> call, Throwable t) {

                    }
                });

            }
        });

        btn_daftar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(MainActivity.this, Daftar_user.class);
                startActivity(intent);
            }
        });




    }

    private void pindahActivity(Class activity){
        Intent intent = new Intent(MainActivity.this, activity);
        startActivity(intent);
    }
}