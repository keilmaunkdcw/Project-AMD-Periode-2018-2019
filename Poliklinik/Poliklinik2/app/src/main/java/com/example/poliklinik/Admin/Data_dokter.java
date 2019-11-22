package com.example.poliklinik.Admin;

import android.content.Intent;
import android.support.design.widget.FloatingActionButton;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.view.View;
import android.widget.Toast;

import com.example.poliklinik.Api.Client;
import com.example.poliklinik.Api.InterfaceDataDokter;
import com.example.poliklinik.Model.DataDokterResponse;
import com.example.poliklinik.Model.DokterListItem;
import com.example.poliklinik.R;

import java.util.List;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class Data_dokter extends AppCompatActivity {

    private RecyclerView rv_data;
    private Doktermodel mDoktermodel;
    private InterfaceDataDokter mInterfaceDataDokter;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_data_dokter);

        mInterfaceDataDokter = (InterfaceDataDokter) Client.getClient().create(InterfaceDataDokter.class);

        rv_data = (RecyclerView) findViewById(R.id.rv_data);

        mInterfaceDataDokter.listDataDokter(null,"admin").enqueue(new Callback<DataDokterResponse>() {
            @Override
            public void onResponse(Call<DataDokterResponse> call, Response<DataDokterResponse> response) {
                    DataDokterResponse dataDokterResponse = response.body();
                    if(!dataDokterResponse.isError()){
                        if(dataDokterResponse.getMessage().equals("Data Tersedia")) {
                            List<DokterListItem> dokterListItemList = response.body().getData();
                            mDoktermodel = new Doktermodel(Data_dokter.this,dokterListItemList);
                            RecyclerView.LayoutManager layoutManager = new LinearLayoutManager(Data_dokter.this);
                            rv_data.setLayoutManager(layoutManager);
                            rv_data.setAdapter(mDoktermodel);
                        }else{
                            Toast.makeText(Data_dokter.this, dataDokterResponse.getMessage(), Toast.LENGTH_SHORT).show();
                        }
                    }
            }

            @Override
            public void onFailure(Call<DataDokterResponse> call, Throwable t) {

            }
        });


        FloatingActionButton fab = findViewById(R.id.FAB);
        fab.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(Data_dokter.this, Input_Dokter.class);
                startActivity(intent);
            }
        });

    }
}
