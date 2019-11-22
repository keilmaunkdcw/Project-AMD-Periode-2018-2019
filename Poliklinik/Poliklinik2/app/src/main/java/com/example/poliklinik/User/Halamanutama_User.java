package com.example.poliklinik.User;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.CardView;
import android.view.View;
import android.widget.Button;
import android.widget.LinearLayout;
import android.widget.TextView;
import android.content.SharedPreferences;
import android.content.SharedPreferences;
import android.widget.Toast;

import com.example.poliklinik.Api.Client;
import com.example.poliklinik.Api.InterfaceAntri;
import com.example.poliklinik.MainActivity;
import com.example.poliklinik.Model.AntriResponse;
import com.example.poliklinik.Sessionlogin;
import com.example.poliklinik.R;


import java.util.HashMap;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class Halamanutama_User<activity> extends AppCompatActivity {

    public Sessionlogin sessionlogin;
    private Button btn_logout;
    private CardView cv_polianak,cv_poligigi,cv_poliumum;
    private TextView tv_nama,tv_noantri;
    private InterfaceAntri mInterfaceAntri;
    private TextView tv_nokonfirmasi,tv_spesialis,tv_namapasien,tv_dokter;
    private LinearLayout ly_info;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_halaman_utama_user);

        cv_polianak = (CardView) findViewById(R.id.cv_polianak);
        cv_poligigi = (CardView) findViewById(R.id.cv_poligigi);
        cv_poliumum = (CardView) findViewById(R.id.cv_poliumum);
        btn_logout = (Button) findViewById(R.id.btn_logout);
        tv_nama = (TextView) findViewById(R.id.tv_namauser);
        tv_noantri = (TextView) findViewById(R.id.tv_noantri);
        tv_nokonfirmasi = (TextView) findViewById(R.id.tv_nokonfirmasi);
        tv_spesialis = (TextView) findViewById(R.id.tv_spesialis);
        tv_dokter = (TextView) findViewById(R.id.tv_dokter);
        tv_namapasien = (TextView) findViewById(R.id.tv_namapasien);
        ly_info = (LinearLayout) findViewById(R.id.ly_data);

        mInterfaceAntri = (InterfaceAntri) Client.getClient().create(InterfaceAntri.class);


        sessionlogin = new Sessionlogin(getApplicationContext());
        sessionlogin.checkLogin();

        HashMap<String, String> userData = sessionlogin.getUserDetails();
        String username = userData.get(Sessionlogin.KEY_USERNAME);
        String nama = userData.get(Sessionlogin.KEY_NAMA);

        tv_nama.setText(nama);

        mInterfaceAntri.noAntri(username).enqueue(new Callback<AntriResponse>() {
            @Override
            public void onResponse(Call<AntriResponse> call, Response<AntriResponse> response) {
                AntriResponse antriResponse = (AntriResponse) response.body();
                if(!antriResponse.isError()){
                    tv_noantri.setText(antriResponse.getNo_antri());
                    ly_info.setVisibility(View.VISIBLE);
                    tv_nokonfirmasi.setText(antriResponse.getNo_konfirmasi());
                    tv_spesialis.setText(antriResponse.getSpesialis());
                    tv_namapasien.setText(antriResponse.getNama_pasien());
                    tv_dokter.setText(antriResponse.getDokter());
                }else{
                    tv_noantri.setText("0");
                    ly_info.setVisibility(View.GONE);
                }
            }

            @Override
            public void onFailure(Call<AntriResponse> call, Throwable t) {
                tv_noantri.setText("0");
                ly_info.setVisibility(View.GONE);
            }
        });

        cv_polianak.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                pindahActivity(Listdokter.class,"Poli Anak");
            }
        });

        cv_poligigi.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                pindahActivity(Listdokter.class,"Poli Gigi");
            }
        });

        cv_poliumum.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                pindahActivity(Listdokter.class,"Poli Umum");
            }
        });

        btn_logout.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                sessionlogin.saveSPBoolean(sessionlogin.IS_LOGIN, false);
                startActivity(new Intent(Halamanutama_User.this, MainActivity.class)
                        .addFlags(Intent.FLAG_ACTIVITY_CLEAR_TOP | Intent.FLAG_ACTIVITY_NEW_TASK));
                finish();
            }
        });

    }


    private void pindahActivity(Class activity, String spesialis){
        Intent intent = new Intent(Halamanutama_User.this,activity);
        intent.putExtra("spesialis",spesialis);
        startActivity(intent);
    }


}
