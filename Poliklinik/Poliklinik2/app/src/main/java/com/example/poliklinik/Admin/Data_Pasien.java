package com.example.poliklinik.Admin;

import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.widget.Toast;

import com.example.poliklinik.Api.Client;
import com.example.poliklinik.Api.InterfaceDataAntrian;
import com.example.poliklinik.Api.InterfaceDataDokter;
import com.example.poliklinik.Model.AntrianListItem;
import com.example.poliklinik.Model.DataAntrianResponse;
import com.example.poliklinik.Model.DataDokterResponse;
import com.example.poliklinik.Model.DataPasienResponse;
import com.example.poliklinik.Model.DokterListItem;
import com.example.poliklinik.R;

import java.util.List;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class Data_Pasien extends AppCompatActivity {
    private RecyclerView rv_data;
    private AntrianModel mAntrianModel;
    private InterfaceDataAntrian mInterfaceDataAntrian;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_data__pasien);

        mInterfaceDataAntrian = (InterfaceDataAntrian) Client.getClient().create(InterfaceDataAntrian.class);

        rv_data = (RecyclerView) findViewById(R.id.rv_data);

       mInterfaceDataAntrian.showAllAntrian().enqueue(new Callback<DataAntrianResponse>() {
           @Override
           public void onResponse(Call<DataAntrianResponse> call, Response<DataAntrianResponse> response) {
               DataAntrianResponse dataAntrianResponse = response.body();
               if(!dataAntrianResponse.isError()){
                   if(dataAntrianResponse.getMessage().equals("Data Tersedia")){
                       List<AntrianListItem> antrianListItems = response.body().getData();
                       mAntrianModel = new AntrianModel(Data_Pasien.this,antrianListItems);
                       RecyclerView.LayoutManager layoutManager = new LinearLayoutManager(Data_Pasien.this);
                       rv_data.setLayoutManager(layoutManager);
                       rv_data.setAdapter(mAntrianModel);
                   }else{
                       Toast.makeText(Data_Pasien.this, dataAntrianResponse.getMessage(), Toast.LENGTH_SHORT).show();
                   }
               }
           }

           @Override
           public void onFailure(Call<DataAntrianResponse> call, Throwable t) {

           }
       });

    }
}
