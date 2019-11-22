package com.example.poliklinik.User;

import android.content.DialogInterface;
import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AlertDialog;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.RadioGroup;
import android.widget.Spinner;
import android.widget.Toast;

import com.example.poliklinik.Admin.Halamanutama_Admin;
import com.example.poliklinik.Api.Client;
import com.example.poliklinik.Api.InterfaceDaftarPasien;
import com.example.poliklinik.Model.DaftarPasienResponse;
import com.example.poliklinik.R;
import com.example.poliklinik.Sessionlogin;

import java.text.DateFormat;
import java.text.SimpleDateFormat;
import java.util.Calendar;
import java.util.HashMap;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class Input_Pasien extends AppCompatActivity {

    private EditText et_namapasien,et_alamat,et_umur,et_riwayatpenyakit,et_nohandhpone;
    private RadioGroup rg_jnskelamin;
    private Spinner spin_golongandarah;
    private Button btn_simpan, btn_batal;
    private InterfaceDaftarPasien mInterfaceDaftarPasien;
    private Sessionlogin sessionlogin;

    String nama_pasien,jns_kelamin,golongan_darah,alamat,umur,riwayat_penyakit,nohandphone,username;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_input__pasien);

        sessionlogin = new Sessionlogin(getApplicationContext());
        if(sessionlogin.isLoggedIn() == true){
            HashMap<String, String> userData = sessionlogin.getUserDetails();
            username = userData.get(Sessionlogin.KEY_USERNAME);
        }

        et_namapasien = (EditText) findViewById(R.id.et_namapasien);
        rg_jnskelamin = (RadioGroup) findViewById(R.id.rg_jnskelamin);
        spin_golongandarah = (Spinner) findViewById(R.id.spin_golongandarah);
        et_alamat = (EditText) findViewById(R.id.et_alamat);
        et_umur = (EditText) findViewById(R.id.et_umur);
        et_riwayatpenyakit = (EditText) findViewById(R.id.et_riwayatpenyakit);
        et_nohandhpone = (EditText) findViewById(R.id.et_nohandhpone);
        btn_simpan = (Button) findViewById(R.id.btn_simpan);
        btn_batal = (Button) findViewById(R.id.btn_batal);

        mInterfaceDaftarPasien = (InterfaceDaftarPasien) Client.getClient().create(InterfaceDaftarPasien.class);

        Bundle bundle = getIntent().getExtras();
        final String id_dokter = bundle.getString("id_dokter");

        rg_jnskelamin.setOnCheckedChangeListener(new RadioGroup.OnCheckedChangeListener() {
            @Override
            public void onCheckedChanged(RadioGroup group, int checkedId) {
                if(checkedId == R.id.rb_laki){
                    jns_kelamin = "Laki-Laki";
                }else if(checkedId == R.id.rb_perempuan){
                    jns_kelamin = "Perempuan";
                }else{
                    jns_kelamin = null;
                }
            }
        });

        btn_simpan.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                nama_pasien = et_namapasien.getText().toString();
                golongan_darah = spin_golongandarah.getSelectedItem().toString();
                alamat = et_alamat.getText().toString();
                umur = et_umur.getText().toString();
                riwayat_penyakit = et_riwayatpenyakit.getText().toString();
                nohandphone = et_nohandhpone.getText().toString();

                if(nama_pasien.isEmpty()){
                    et_namapasien.setError("Nama Pasien Masih Kosong");
                }else if(jns_kelamin == null){
                    Toast.makeText(Input_Pasien.this, "Anda Belum Memilih Jenis Kelamin", Toast.LENGTH_SHORT).show();
                }else if(golongan_darah.equals("Golongan Darah")){
                    Toast.makeText(Input_Pasien.this, "Anda Belum Memilih Golongan Darah", Toast.LENGTH_SHORT).show();
                }else if(alamat.isEmpty()){
                    et_alamat.setError("Alamat Masih Kosong");
                }else if(umur.isEmpty()){
                    et_umur.setError("Umur Masih Kosong");
                }else if(riwayat_penyakit.isEmpty()){
                    et_riwayatpenyakit.setError("Riwayat Penyakit Masih Kosong");
                }else if(nohandphone.isEmpty()){
                    et_nohandhpone.setError("Handphone Masih Kosong");
                }else{
                    DateFormat df = new SimpleDateFormat("d MMM yyyy");
                    String date = df.format(Calendar.getInstance().getTime());
                    DateFormat dfforrandom = new SimpleDateFormat("yy-MMmmss");
                    String dateforrandom = dfforrandom.format(Calendar.getInstance().getTime());
                    final String nokonfirmasi = dateforrandom+"-"+nama_pasien;
                    mInterfaceDaftarPasien.daftarPasien(nokonfirmasi,nama_pasien,jns_kelamin,golongan_darah,alamat,umur,riwayat_penyakit,nohandphone,id_dokter,username).enqueue(new Callback<DaftarPasienResponse>() {
                        @Override
                        public void onResponse(Call<DaftarPasienResponse> call, Response<DaftarPasienResponse> response) {
                            DaftarPasienResponse daftarPasienResponse = (DaftarPasienResponse) response.body();
                            if(!daftarPasienResponse.isError()){
                                tampilkanKonfirmasi(nokonfirmasi,nama_pasien,jns_kelamin,golongan_darah,alamat,umur,riwayat_penyakit,nohandphone);
                            }else{
                                Toast.makeText(Input_Pasien.this, daftarPasienResponse.getMessage(), Toast.LENGTH_SHORT).show();
                            }
                        }

                        @Override
                        public void onFailure(Call<DaftarPasienResponse> call, Throwable t) {

                        }
                    });
                }

            }
        });


    }

    private void  tampilkanKonfirmasi(String nokonfirmasi, String nama, String jeniskelamin, String golongandarah, String alamat, String umur, String riwayat_penyakit, String no_handphone){
        AlertDialog.Builder alertDialogBuilder = new AlertDialog.Builder(this);
        alertDialogBuilder.setTitle("No Konfirmasi Anda");
        alertDialogBuilder.setMessage(" No. Konfirmasi "+nokonfirmasi+
                                      "\n Nama : "+nama+
                                      "\n Jenis Kelamin : "+jeniskelamin+
                                      "\n Golongan Darah : "+golongandarah+
                                      "\n Alamat : "+alamat+
                                      "\n Umur : "+umur+
                                      "\n Riwayat Penyakit : "+riwayat_penyakit+
                                      "\n No. Telfon : "+no_handphone+
                                      "\n\n - Simpan No. Konfirmasi Anda -")
                .setCancelable(false)
                .setPositiveButton("Ya", new DialogInterface.OnClickListener() {
                    @Override
                    public void onClick(DialogInterface dialog, int which) {
                        Intent intent = new Intent(Input_Pasien.this, Halamanutama_User.class);
                        startActivity(intent);
                    }
                });
        AlertDialog alertDialog = alertDialogBuilder.create();
        alertDialog.show();

    }
}
