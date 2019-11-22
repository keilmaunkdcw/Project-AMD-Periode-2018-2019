package com.example.poliklinik.User;

import android.os.Bundle;
import android.support.annotation.Nullable;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
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

public class Listdokter extends AppCompatActivity {

    private RecyclerView rv_data;
    private Doktermodel mDoktermodel;
    private InterfaceDataDokter mInterfaceDataDokter;

    @Override
    protected void onCreate(@Nullable Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_list_dokter);

        Bundle bundle = getIntent().getExtras();
        String spesialis = bundle.getString("spesialis");

        rv_data = (RecyclerView) findViewById(R.id.rv_data);

        mInterfaceDataDokter = (InterfaceDataDokter) Client.getClient().create(InterfaceDataDokter.class);

        mInterfaceDataDokter.listDataDokter(spesialis,"user").enqueue(new Callback<DataDokterResponse>() {
            @Override
            public void onResponse(Call<DataDokterResponse> call, Response<DataDokterResponse> response) {
                DataDokterResponse dataDokterResponse = response.body();
                if(!dataDokterResponse.isError()){
                    if(dataDokterResponse.getMessage().equals("Data Tersedia")) {
                        List<DokterListItem> dokterListItems = response.body().getData();
                        mDoktermodel = new Doktermodel(Listdokter.this, dokterListItems);
                        RecyclerView.LayoutManager layoutManager = new LinearLayoutManager(Listdokter.this);
                        rv_data.setLayoutManager(layoutManager);
                        rv_data.setAdapter(mDoktermodel);
                    }else{
                        Toast.makeText(Listdokter.this, dataDokterResponse.getMessage(), Toast.LENGTH_SHORT).show();
                    }
                }else{
                    Toast.makeText(Listdokter.this, dataDokterResponse.getMessage(), Toast.LENGTH_SHORT).show();
                }
            }

            @Override
            public void onFailure(Call<DataDokterResponse> call, Throwable t) {

            }
        });
    }
}
